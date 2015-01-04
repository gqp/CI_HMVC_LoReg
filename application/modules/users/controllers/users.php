<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_users');
        $this->load->library('form_validation');
    }

    public function index(){

		$data['query'] = $this->mdl_users->get_all_users();
        echo Modules::run('templates/users', $data);
    }

    public function add(){
    	if($this->session->userdata('logged_in')){
            echo Modules::run('templates/users_add');
    	}else{
    		redirect('login');
    	}
    }

    public function create(){

        $this->form_validation->set_rules('firstname','Firstname','required|min_length[3]|trim');
        $this->form_validation->set_rules('lastname','Lastname','required|min_length[3]|xss_clean|trim');
        $this->form_validation->set_rules('email','Email','required|xss_clean|valid_email|trim|is_unique[users.email]');
        $this->form_validation->set_rules('username','Username','required|min_length[3]|xss_clean|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required|min_length[3]|xss_clean|trim');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[3]|xss_clean|matches[password]');

        $this->form_validation->set_message('is_unique', '%s is already registered, please try again.');

        if ($this->form_validation->run($this)){
            $this->mdl_users->add_user();
            redirect('users');
        }else{
        	$this->add();
        }
    }

    function edit($id){
        if($this->session->userdata('logged_in')){

            $query = $this->mdl_users->get_user($id);

            foreach($query->result() as $row){
                $data['id'] = $row->id;
                $data['username'] = $row->username;
                $data['email'] = $row->email;
                $data['firstname'] = $row->firstname;
                $data['lastname'] = $row->lastname;
                $data['role'] = $row->role;
                $data['active'] = $row->active;
            }
            echo Modules::run('templates/user_edit', $data);
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
                if($this->mdl_users->update_user($id)){
                    $updateSuccess = "You successfully updated the users information!";
                    $this->session->set_flashdata('success', $updateSuccess);
                    redirect('users');
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

    function delete($id){
        if ($this->session->userdata('logged_in')) {
            if($this->mdl_users->delete_user($id)) {
                redirect('users');
            }
        }
    }

}