<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function index()
	{
		$this->load->view('AdminLogin');
    }
    
    public function LoginUser(){
        
        $return = array();
        $this->load->Model("AdminModel");

        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required'=>'Password can not be null'));
        $this->form_validation->set_rules('name', 'User Name', 'trim|required', array('required'=>'User Name can not be null'));
        if ($this->form_validation->run() == FALSE){
            $return['code'] = "0";
            $return['error'] = validation_errors();
            echo json_encode($return);
        }else{

            $where = array();
            $where['name'] = $this->input->post('name');
            $where['password'] = md5($this->input->post('password'));

            $return = $this->AdminModel->getWhereData("Admin",$where);
            
            if($return){
                $sess = array("name"=> $return['name']);
                $this->session->set_userdata($sess);
                
                $return['code'] = "1";
                echo json_encode($return);
            }else{
                $return['code'] = "0";
                $return['error'] = "Username OR Password is Wrong";
                echo json_encode($return);
            }
        }
    }
}
