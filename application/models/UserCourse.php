<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class UserCourse extends CI_Model{

	function insert($userId, $course1, $course2){
        if($course1 != null){
            $data1 = array(
                "users_id" => $userId,
                "course_id" => $course1
            );
            $this->db->insert('users_course', $data1);
        }

        if($course2 != null){
            $data2 = array(
                "users_id" => $userId,
                "course_id" => $course2
            );
            $this->db->insert('users_course', $data2);
        }
    }

    function getCourseByUserId($userId){
        $this->db->from("users_course");
        $this->db->join("course", "users_course.course_id = course.course_id");
        return $this->db->where("users_course.users_id", $userId)->get();
    }

}