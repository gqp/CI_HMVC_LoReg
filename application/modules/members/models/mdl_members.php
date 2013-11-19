<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_members extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "users";
        return $table;
    }
    public function get_profile($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function update_profile($username){
        $table = $this->get_table();
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        );
        $this->db->where('username', $username);
        $this->db->update($table, $data);
        return true;
    }

    public function update_password($username){
        $table = $this->get_table();
        $data = array(
            'password' => md5(sha1($this->input->post('password')))
        );
        $this->db->where('username', $username);
        $this->db->update($table, $data);
        return true;
    }
}