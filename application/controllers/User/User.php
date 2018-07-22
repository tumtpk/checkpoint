<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
	
	public function index()
	{
		$userId = $this->session->userdata['logged_in']['id'];
		$this->load->model("UserCourse");
		$data["allCourse"] = $this->UserCourse->getCourseByUserId($userId);
		$this->load->view("user/course", $data);
	}

	function checkpoint($course_id){
		$data["course_id"] = $course_id;
		$this->load->model("Courses");
		$this->load->model("CheckTimes");

		$data["course"] = $this->Courses->getCourseByCourseId($course_id);
		$data["checktime"] = $this->CheckTimes->getTimeByCourseId($course_id);
		$this->load->view("user/checkpoint", $data);
	}

}
