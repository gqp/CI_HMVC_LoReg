<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {

    //********** Begin Login Views **********//

    // Login View
    function login(){
        $this->load->view('login/index');
    }

    // Restricted View
    function restricted(){
        $this->load->view('login/restricted');
    }

    //********** Begin Admin Area Views **********//

    // Admin Area View
    function admin_area(){
        $this->load->view('admin/index');
    }

    // Admin Area Nav
    function admin_nav(){
        $this->load->view('navigation/admin');
    }

    //********** Begin Users Views **********//

    // Users View
    function users($data){
        $this->load->view('users/index', $data);
    }

    // Add Users View
    function users_add(){
        $this->load->view('users/add');
    }

    // Edit Users View
    function user_edit($data){
        $this->load->view('users/edit', $data);
    }

    // User Profile View
    function user_profile($data){
        $this->load->view('users/profile', $data);
    }

    // User Profile View
    function profile_edit($data){
        $this->load->view('users/profile_edit', $data);
    }

    // Change Password View
    function change_pwd($data){
        $this->load->view('users/change_pwd', $data);
    }

    //********** Begin Member's Area Views **********//

    // Members Area View
    function members_area(){
        $this->load->view('members/index');
    }

    // Members Area Nav
    function members_nav(){
        $this->load->view('navigation/members');
    }

    //********** Begin Register Views **********//

    // Register View
    function register(){
        $this->load->view('register/index');
    }

    // Thanks for Registering View
    function register_thanks(){
        $this->load->view('register/thanks');
    }

}