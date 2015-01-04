<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "users";
        return $table;
    }

    function get_all_users(){
        $table = $this->get_table();
        $query = $this->db->get($table);
        return $query;
    }

    public function get_user($id){
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }
    public function get_profile($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get($table);
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function add_user(){
        $table = $this->get_table();
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5(sha1($this->input->post('password'))),
            'role' => 100,
            'active' => 1
        );
        $query = $this->db->insert($table, $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function update_user($id){
        $table = $this->get_table();
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'active' => $this->input->post('active')
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return true;
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

    public function count_all(){
        $table = $this->get_table();
        $query = $this->db->count_all($table);
        return $query;

    }

    function delete_user($id){
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->delete($table);
        if($query){
            return true;
        }else{
            return false;
        }
    }

}