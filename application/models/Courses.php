<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class Courses extends CI_Model{

    function getCourseByCourseId($course_id){
        return $this->db->where("course_id", $course_id)->get("course")->row();
    }

}