<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->load->view("lib");
        $this->load->view("auth/login");
    }

    public function register()
    {
        $this->load->view("lib");
        $this->load->view("auth/register");
    }
    
    public function logout(){
        session_destroy();
        redirect("auth/login");
    }

}