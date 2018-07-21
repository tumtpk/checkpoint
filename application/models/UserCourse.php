<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class UserCourse extends CI_Model{

	function insert($userId, $course1, $course2){
        if($course1 != null){
            $data1 = array(
                "users-id" => $userId,
                "course-id" => $course1
            );
            $this->db->insert('users_course', $data1);
        }

        if($course2 != null){
            $data2 = array(
                "users-id" => $userId,
                "course-id" => $course2
            );
            $this->db->insert('users_course', $data2);
        }
    }

}