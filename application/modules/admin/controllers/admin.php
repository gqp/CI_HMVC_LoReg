<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller{

    public function __construct() {
        parent::__construct();

        // Load models for all functions in this class to use
        $this->load->model('mdl_admin');
        $this->load->model('users/mdl_users');
    }

    public function index(){

        // Check to see if user is logged in
        if($this->session->userdata('logged_in')){

            //Grab Session Data
            $username = $this->session->userdata('username');
            // Get Logged in user's info
            $query = $this->mdl_admin->get_logged_in_user_data($username);

            // Count Users
            $data['users_count'] = $this->mdl_users->count_all();


            foreach($query->result() as $row){
                // loop through logged in user's data
                $data['id'] = $row->username;
                $data['username'] = $row->username;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
                $data['email'] = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            // If logged in user is a Member role redirect to member's area
            if($active == 1 && $role == 1){
                redirect('members');
                // If logged in user is an Admin redirect to admin area
            }elseif($active == 1 && $role == 100){
                $this->admin();
            }else{
                // Redirect to login page
                redirect('login');
            }
        }else{
            // Redirect to login page
            redirect('login');
        }
    }

    public function admin(){
        echo Modules::run('templates/admin_area');
    }

}