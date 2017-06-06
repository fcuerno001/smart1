<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

   public function __construct(){
   		parent::__construct();
		$this->load->model('admin_model','madmin');
	}

	public function index()
	{
		if ($this->session->valid) {
			$this->load->view('view_portal');
		}else{
		$this->load->view('login');	
		}
	}

 public function login_user(){
 
 $adminU=$this->input->post('adminUser');
 $passU=$this->input->post('passUser');
 $admin=$this->madmin->login($adminU);
 $output=array();

if (is_object($admin) && !empty($admin)){
   if ($admin->pass_admin==$passU) {
  		$this->create_session($admin);
      //$this->load->view('view_portal');
  		$output['status']=TRUE;
  	}else{
  	 $output['status']=FALSE;
  	 $output['msg']='Password Invalido';
  	} 
}else{
  $output['status']=FALSE;
  $output['msg']='Usuario No existe';
}

echo json_encode($output);

 }

 public function logout_user(){
 $this->session->sess_destroy();
 redirect();

 }

 private function create_session($admin){
    $this->session->valid=TRUE;
 
 }
	
}

