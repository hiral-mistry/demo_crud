<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashBoard extends CI_Controller {

	public function index()
	{
        $this->load->model('AdminModel');
        if($this->session->userdata('name')){ // session check
            $info['name'] = $this->session->userdata('name');
            $info['userdata'] = $this->AdminModel->GetData("User");
		    		
            $this->load->view('AdminDashBoard', $info);
        }else{
            $this->load->view("Adminlogin");
        }
    }

    public function logout(){

        $data = array("email"=>'', "name" => '');
        $this->session->sess_destroy();
        $this->load->view("Adminlogin");
    }

    public function EditData()
	{
        $this->load->model('AdminModel');
        if($this->session->userdata('name')){ //session check
            
            $id = $this->uri->segment(3);

            $info['userdata'] = $this->AdminModel->getWhereData("User", array("id"=>$id));
                        
            $this->load->view('EditUserData', $info);
        }else{
            $this->load->view("Adminlogin");
        }
    }


    public function EditSubmitData(){
        
        $return = array();
        $this->load->Model("AdminModel");
        $edit_id = $this->uri->segment(3); // get data from uri 
        // validation check
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]', array('required'=>'First name is Required & min length is 3'));
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]', array('required'=>'Last name is Required & min length is 3'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required'=>'Enter Proper Email Address'));
        if ($this->form_validation->run() == FALSE){
            $return['code'] = "0";
            $return['error'] = validation_errors();
            echo json_encode($return);
        }else{
            // if validarion true then run Edit code 
            $data = array();
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            
            $where = array("id"=>$edit_id);
            $res = $this->AdminModel->edit_data("User",$data, $where);
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
    
    public function DeleteData()
	{
        $this->load->model('AdminModel');
        $id = $this->input->post("data-id");
       
        $res = $this->AdminModel->deleteWhereData("User", array("id"=>$id));
		if($res){
            $result['code'] = "1";
        }else{
            $result['code'] = "0";
        }
        echo json_encode($result);
        
    }
   
}
