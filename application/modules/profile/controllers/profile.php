<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_profile');
        $this->load->model('mdl_profile');
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');

            $query = $this->mdl_profile->get_profile($username);

            foreach($query->result() as $row){
                $data['id'] = $row->id;
                $data['username'] = $row->username;
                $data['email'] = $row->email;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
            }
            echo Modules::run('templates/user_profile', $data);
        }else{
            redirect('login');
        }
    }

    public function edit($id){

        if($this->session->userdata('logged_in')){
            $query = $this->mdl_profile->get_my_profile($id);

            foreach($query->result() as $row){
                $data['id'] = $row->id;
                $data['username'] = $row->username;
                $data['email'] = $row->email;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
                $data['active'] = $row->active;
            }
            echo Modules::run('templates/profile_edit', $data);
        }else{
            redirect('login');
        }
    }

    function update($id){

        if($this->session->userdata('logged_in')){

            $this->form_validation->set_rules('firstname','Firstname','required|min_length[3]|trim');
            $this->form_validation->set_rules('lastname','Lastname','required|min_length[3]|xss_clean|trim');
            $this->form_validation->set_rules('active','Active','trim');

            if ($this->form_validation->run()){
                if($this->mdl_profile->update_profile($id)){
                    $updateSuccess = "You successfully updated the users information!";
                    $this->session->set_flashdata('success', $updateSuccess);
                    redirect('profile');
                }else{
                    $this->edit($id);
                }
            }else{
                $this->edit($id);
            }
        }else{
            redirect('login');
        }
    }

    public function change_password(){

        if($this->session->userdata('logged_in')){
            $data['username'] = $this->session->userdata('username');
            echo Modules::run('templates/change_pwd', $data);
        }
    }

    public function updatePassword(){

        if($this->session->userdata('logged_in')){

            $username = $this->input->post('username');

            $this->form_validation->set_rules('password','Password','required|min_length[3]|xss_clean|trim');
            $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[3]|xss_clean|matches[password]');

            if ($this->form_validation->run()){
                if($this->mdl_profile->update_password($username)){
                    $updateSuccess = "You successfully changed your password!";
                    $this->session->set_flashdata('success', $updateSuccess);
                    redirect('users/profile');
                }else{
                    $this->change_password();
                }
            }else{
                $this->change_password();
            }
        }
    }

}