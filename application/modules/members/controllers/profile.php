<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){

        $this->profile();
    }

    public function profile(){
        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');
            $this->load->model('mdl_members');

            $query = $this->mdl_members->get_profile($username);

            foreach($query->result() as $row){
                $data['username'] = $row->username;
                $data['email'] = $row->email;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
            }
            $this->load->view('member_profile', $data);
        }else{
            echo "Not Logged in";
        }
    }

    public function edit(){

        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');
            $this->load->model('mdl_members');

            $query = $this->mdl_members->get_profile($username);

            foreach($query->result() as $row){
                $data['username'] = $row->username;
                $data['email'] = $row->email;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
            }
            $this->load->view('member_profile_edit', $data);
        }else{
            echo "Not Logged in";
        }
    }

    public function updateProfile(){

        if($this->session->userdata('logged_in')){

            $username = $this->input->post('username');

            $this->load->library('form_validation');
            $this->load->model('mdl_members');

            $this->form_validation->set_rules('firstname','Firstname','required|min_length[3]|xss_clean|trim');
            $this->form_validation->set_rules('lastname','Lastname','required|min_length[3]|xss_clean|trim');

            if ($this->form_validation->run()){
                if($this->mdl_members->update_profile($username)){
                    $updateSuccess = "You successfully updated your profile!";
                    $this->session->set_flashdata('success', $updateSuccess);
                    redirect('members/profile');
                }else{
                    $this->edit();
                }
            }else{
                $this->edit();
            }
        }
    }

    public function change_password(){

        if($this->session->userdata('logged_in')){
           $data['username'] = $this->session->userdata('username');
            $this->load->view('change_pwd', $data);
        }
    }

    public function updatePassword(){

        if($this->session->userdata('logged_in')){

            $username = $this->input->post('username');

            $this->load->library('form_validation');
            $this->load->model('mdl_members');

            $this->form_validation->set_rules('password','Password','required|min_length[3]|xss_clean|trim');
            $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[3]|xss_clean|matches[password]');

            if ($this->form_validation->run()){
                if($this->mdl_members->update_password($username)){
                    $updateSuccess = "You successfully changed your password!";
                    $this->session->set_flashdata('success', $updateSuccess);
                    redirect('members/profile');
                }else{
                    $this->change_password();
                }
            }else{
                $this->change_password();
            }
        }
    }

}