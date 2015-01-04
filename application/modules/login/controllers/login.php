<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller{

    public function __construct() {
        parent::__construct();

        // Load models for all functions in this class to use
        $this->load->model('mdl_login');
        $this->load->library('form_validation');
    }

    public function index(){

        echo Modules::run('templates/login');
    }

    public function login(){

        echo Modules::run('templates/login');
    }

    // Verify login information
    public function login_verify(){

        // Set the form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|callback_validate_login_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|sha1|xss_clean|trim');

        // If no errors, login
        if($this->form_validation->run($this)){

            // Get username
            $username = $this->input->post('username');

            // Get the user's data that is attempting to login
            $query = $this->mdl_login->get_logged_in_user_data($username);
            foreach($query->result() as $row){
                $role = $row->role;
                $active = $row->active;
            }

            // Assign user's data to an array
            $data = array(
                'username' => $username,
                'logged_in' => 1,
                'role' => $role
            );

            // Pass the data array into the session and redirect to login/verified function
            if($active == 1 && $role >= 0){
                $this->session->set_userdata($data);
                redirect('login/verified', $data);
            }else{
                $this->login();
            }
        }else{
            $this->login();
        }
    }

    // Callback to validate credentials
    public function validate_login_credentials(){

        if ($this->mdl_login->validate()){
            return true;
        }else{
            $this->form_validation->set_message('validate_creds', 'The login credentials you entered are incorrect, please try again!');
            return false;
        }
    }

    public function verified(){

        if($this->session->userdata('logged_in')){

            // Set the username variable using session data
            $username = $this->session->userdata('username');
            // Get logged in user's data using session username
            $query = $this->mdl_login->get_logged_in_user_data($username);

            // Loop through the logged in user's data and pass to the data array
            foreach($query->result() as $row){
                $id = $row->id;
                $data['username'] = $row->username;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
                $data['email'] = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            // Check user's active status and role and redirect appropriately
            if($active == 1 && $role != 0){
                // If active and not an admin user, redirect to member's area
                if($role > 0 && $role < 100){
                    redirect('members');
                    // If active and an admin user, redirect to admin area
                }elseif($role == 100){
                    redirect('admin');
                }
            }else{
                // If not an active user, redirect to login page
                $this->login();
            }
        }else{
            $this->login();
        }
    }

    public function restricted(){
        echo Modules::run('templates/restricted');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}