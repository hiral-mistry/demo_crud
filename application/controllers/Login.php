<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('Login');
    }
    
    public function LoginUser(){
        
        $return = array();
        $this->load->Model("DemoModel");

        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required'=>'Password can not be null'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required'=>'Enter Proper Email Address'));
        if ($this->form_validation->run() == FALSE){
            $return['code'] = "0";
            $return['error'] = validation_errors();
            echo json_encode($return);
        }else{

            $where = array();
            $where['email'] = $this->input->post('email');
            $where['password'] = md5($this->input->post('password'));

            $return = $this->DemoModel->getWhereData("User",$where);
            
            if($return){
                $sess = array("email"=> $return['email'], "name"=> $return['first_name']." ". $return['last_name']);
                $this->session->set_userdata($sess);
                
                $return['code'] = "1";
                echo json_encode($return);
            }else{
                $return['code'] = "0";
                $return['error'] = "Email OR Password is Wrong";
                echo json_encode($return);
            }
        }
    }
}
