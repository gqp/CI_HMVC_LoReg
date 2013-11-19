<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_login');
        $this->load->library('form_validation');
    }

    public function index(){

        $this->login();
    }

    public function login(){

        $this->load->view('login');
    }

    public function login_verify(){

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|callback_validate_login_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|sha1|xss_clean|trim');

        if($this->form_validation->run($this)){

            $username = $this->input->post('username');

            $query = $this->mdl_login->get_logged_in_user_data($username);
            foreach($query->result() as $row){
                $role = $row->role;
                $active = $row->active;
            }

            $data = array(
                'username' => $username,
                'logged_in' => 1,
                'role' => $role
            );

            if($active == 1 && $role > 0){
                $this->session->set_userdata($data);
                redirect('login/verified', $data);
            }else{
                $this->login();
            }
        }else{
            $this->login();
        }
    }

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

            $username = $this->session->userdata('username');
            $query = $this->mdl_login->get_logged_in_user_data($username);

            foreach($query->result() as $row){
                $id = $row->id;
                $username = $row->username;
                $firstname = $row->firstname;
                $lastname = $row->lastname;
                $email = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            if($active == 1){
                if($role > 0 && $role < 100){
                    redirect('members');
                }elseif($role == 100){
                    redirect('admin');
                }else{
                    $this->restricted();
                }
            }else{
                $this->restricted();
            }
        }
    }

    public function restricted(){
        $this->load->view('restricted');
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->login();
    }

}