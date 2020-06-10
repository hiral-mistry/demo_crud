<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoard extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('name')){
            $info['name'] = $this->session->userdata('name');

            $this->load->view('DashBoard', $info);
        }else{
            $this->load->view("login");
        }
    }

    public function logout(){

        $data = array("email"=>'', "name" => '');
        $this->session->sess_destroy();
        $this->load->view("login");
    }
    
   
}
