<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_admin');
    }

    public function index(){

        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');
            $query = $this->mdl_admin->get_logged_in_user_data($username);

            foreach($query->result() as $row){
                $id = $row->id;
                $data['username'] = $row->username;
                $firstname = $row->firstname;
                $lastname = $row->lastname;
                $email = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            // If logged in user is a Member role
            if($active == 1 && $role == 1){
                redirect('members');
                // If logged in user is an Admin role
            }elseif($active == 1 && $role == 100){
                $this->admin();
            }else{
                redirect('login/restricted');
            }
        }else{
            redirect('login/restricted');
        }
    }

    public function admin(){

        $this->load->view('admin_area');
    }

    function users(){
        $data['query'] = $this->mdl_admin->get_all_users();
        $this->load->view('users', $data);
    }

}