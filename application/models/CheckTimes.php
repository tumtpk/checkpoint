<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class CheckTimes extends CI_Model{

    function getTimeByCourseId($course_id){
        $date = date('Y-m-d',time());
        return $this->db->where("course_id", $course_id)
            ->where("checkdate", $date)->get("checktime")->row();
    }

}