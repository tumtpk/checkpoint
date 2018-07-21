<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class Users extends CI_Model{

	function insert($data){
		return $this->db->insert('users', $data);
    }

    function getUserByUsername($username){
        return $this->db->where("username", $username)->get("users")->row("id");
    }

}