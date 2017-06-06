<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MY_Controller {

   public function __construct(){
   		parent::__construct();
		$this->load->model('admin_model','madmin');
	}

	public function index()
	{
		$admin=$this->madmin->selectAll();
		print_r($admin);
	}

	public function insertar_admin(){

		$usuario=array(
			'admin_user'=>$this->input->post('UserAdmin'),
			'pass_admin'=>$this->input->post('password'),
			'nombre_admin'=>$this->input->post('nombre_admin'),
			'plataforma'=>$this->input->post('plataforma'),
			'fecha_creacion'=>date('Y-m-d')
		);

		$id=$this->madmin->create($usuario);
		
		echo $id;

	}

	public function editar_admins($id=''){
		
		$output=array();

		$usuario=array(
			'admin_user'=>$this->input->post('UserAdmin'),
			'pass_admin'=>$this->input->post('password'),
			'nombre_admin'=>$this->input->post('nombre_admin'),
			'plataforma'=>$this->input->post('plataforma')
		);
         $isUpdate=$this->madmin->update($id,$usuario);
        if ($isUpdate) {
        	//array asociativo
        $output['status']=TRUE;	
        }else{
		$output['status']=FALSE;
        }
		echo json_encode($output);
	}

    //$admin enviado a la vista para extraer los datos de la tabla mantto_admins.
	public function view_editar_admins($id=''){
		if (is_numeric($id)) {
		$data['admins']=$this->madmin->select($id);
		$this->load->view('editar_admins',$data);
		}else{
		show_404();
		}
		

	}

	public function eliminar_admins($id=''){
	if (is_numeric($id)) {
		$this->madmin->delete($id);
		}else{
	
		}

redirect('adminController/lista_admins');

	}
	public function lista_admins(){
		$data['admins']=$this->madmin->selectAll();
		$this->load->view('listar_admins',$data);
	}

	public function view_admins(){
	$this->load->view('view_admins');
	}

	public function getAdmins ($id=''){
	 $output=array(
	 	'data'=>null
	 );
	 $usuario=$this->madmin->select($id);
	 if (is_object($usuario) && !empty($usuario)) {
	 	$output['msg']='Admin existen';
	 	$output['status']=true;
	 	$output['data']=$usuario;
	 }else{
	 	$output['msg']='Admin no existe';
	 	$output['status']=false;
	 }
	 echo json_encode($output);
	}


}

