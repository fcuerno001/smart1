<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClavesController extends MY_Controller {

   public function __construct(){
   		parent::__construct();
		$this->load->model('claves_model','mclaves');
	}

	public function index()
	{
		$claves=$this->mclaves->selectAll();
		print_r($claves);
	}

	public function insertar_claves(){

		$claves=array(
			'mantto_clientes_id_cliente'=>$this->input->post('cliente'),
			'hostname'=>$this->input->post('hostname'),
			'ip_address'=>$this->input->post('ipAddress'),
			'usuario_host'=>$this->input->post('usuarioServer'),
			'pass_host'=>$this->input->post('passwordServer'),
			'fecha_registro'=>date('Y-m-d'),
			'fecha_modif'=>date('Y-m-d'),
			'mantto_admins_id_admin'=>$this->input->post('soporte')
		);

		$id=$this->mclaves->create($claves);
		echo $id;
		
		}

public function editar_claves($id=''){

        $output=array();

		$claves=array(
		    'hostname'=>$this->input->post('hostname'),
			'ip_address'=>$this->input->post('ipAddress'),
			'usuario_host'=>$this->input->post('usuarioServer'),
			'pass_host'=>$this->input->post('passwordServer'),
			'fecha_modif'=>date('Y-m-d'),
			'mantto_admins_id_admin'=>$this->input->post('soporte')
		);
		
         $isUpdate=$this->mclaves->update($id,$claves);
        if ($isUpdate) {
        	//array asociativo
        $output['status']=TRUE;
        }else{
		$output['status']=FALSE;
        }

		echo json_encode($output);

	}

	public function view_editar_claves($id=''){
	
	if (is_numeric($id)) {
		$data['claves']=$this->mclaves->select($id);
		$this->load->view('editar_claves',$data);
		}else{
		show_404();
		}
	}

	public function eliminar_claves($id=''){
	if (is_numeric($id)) {
		$this->mclaves->delete($id);
		}else{
	
		}
		redirect('clavesController/lista_claves');
	}
	
	public function lista_claves(){
		$this->load->model('cliente_model','mcliente');
    	$this->load->model('admin_model','madmin');
    	$data['clientes'] = $this->mcliente->selectAll();
    	$data['soportes'] = $this->madmin->selectAll();
		$data['claves']=$this->mclaves->getClaves();
		//exit();
		//print_r($data['claves']);
		$this->load->view('listar_claves',$data);

	}


	public function view_claves(){
    $this->load->model('cliente_model','mcliente');
    $this->load->model('admin_model','madmin');
    $data['clientes'] = $this->mcliente->selectAll();
    $data['soporte'] = $this->madmin->selectAll();
	$this->load->view('view_claves',$data);
	}

	public function getClaves ($id=''){
	 $output=array(
	 	'data'=>null
	 );
	 $claves=$this->mclaves->select($id);
	 if (is_object($claves) && !empty($claves)) {
	 	$output['msg']='Clave existen';
	 	$output['status']=true;
	 	$output['data']=$claves;
	 }else{
	 	$output['msg']='Clave no existe';
	 	$output['status']=false;
	 }
	 echo json_encode($output);
	}


}
