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

}
