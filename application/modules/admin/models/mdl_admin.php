<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "users";
        return $table;
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


    function get_all_users(){
        $table = $this->get_table();
        $query = $this->db->get($table);
        return $query;
    }

}