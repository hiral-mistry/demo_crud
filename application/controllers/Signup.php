<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		$this->load->view('Signup');
    }
    
    public function SignupUser(){
        
        $return = array();
        $this->load->Model("DemoModel");
        // validation check
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]', array('required'=>'First name is Required & min length is 3'));
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]', array('required'=>'Last name is Required & min length is 3'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array('required'=>'Password length must be 8 character'));
        $this->form_validation->set_rules('SCpswd', 'Confirm Password', 'trim|required|matches[password]', array('required'=>'Confirm Password must be same as password'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', array('required'=>'Enter Proper Email Address'));
        if ($this->form_validation->run() == FALSE){
            $return['code'] = "0";
            $return['error'] = validation_errors();
            echo json_encode($return);
        }else{
            // if validation is right
            $data = array();
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            // insert data
            $res = $this->DemoModel->insert_data("User",$data);
            if($res){
                $return['code'] = "1";
                echo json_encode($return);
            }else{
                $return['code'] = "0";
                $return['error'] = "Fail To Sign Up Try Again";
                echo json_encode($return);
            }
        }
    }
}
