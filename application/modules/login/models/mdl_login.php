<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_login extends CI_Model {

    public function get_table() {
        $table = "users";
        return $table;
    }

    public function validate(){
        $table = $this->get_table();
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5(sha1($this->input->post('password'))));
        $query = $this->db->get($table);
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_logged_in_user_data($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

}