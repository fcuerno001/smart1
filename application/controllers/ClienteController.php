<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteController extends MY_Controller {

   public function __construct(){
   		parent::__construct();
		$this->load->model('cliente_model','mcliente');
	}

	public function index()
	{
		$cliente=$this->mcliente->selectAll();
		print_r($cliente);
	}

	public function insertar_cliente(){

		$cliente=array(
			'cliente'=>$this->input->post('nomCliente'),
			'contacto'=>$this->input->post('contacto'),
			'skype'=>$this->input->post('skypeEmp'),
			'tel_cliente'=>$this->input->post('telefonoEmp'),
			'correo_cliente'=>$this->input->post('correoEmp'),
			'movil'=>$this->input->post('movilEmp'),
			'fecha_registro'=>date('Y-m-d'),
			'fecha_modif'=>date('Y-m-d')
		);

		$id=$this->mcliente->create($cliente);
		echo $id;
		
	}

public function editar_cliente($id=''){

$output=array();

		$cliente=array(
			'cliente'=>$this->input->post('nomCliente'),
			'contacto'=>$this->input->post('contacto'),
			'skype'=>$this->input->post('skypeEmp'),
			'tel_cliente'=>$this->input->post('telefonoEmp'),
			'correo_cliente'=>$this->input->post('correoEmp'),
			'movil'=>$this->input->post('movilEmp'),
			'fecha_modif'=>date('Y-m-d')
		);
		
         $isUpdate=$this->mcliente->update($id,$cliente);
        if ($isUpdate) {
        	//array asociativo
        $output['status']=TRUE;
        
        }else{
		$output['status']=FALSE;
        }
		echo json_encode($output);

	}

	public function view_editar_clientes($id=''){
	if (is_numeric($id)) {
		$data['cliente']=$this->mcliente->select($id);
		$this->load->view('editar_clientes',$data);
		}else{
		show_404();
		}

	}

	public function eliminar_clientes($id=''){
	if (is_numeric($id)) {
		$this->mcliente->delete($id);
		}else{
	
		}
		redirect('clienteController/lista_clientes');
	}
	
	public function lista_clientes(){
		$data['clientes']=$this->mcliente->selectAll();
		$this->load->view('listar_clientes',$data);
	}

	public function view_cliente(){
	$this->load->view('view_cliente');
	}

	public function getCliente ($id=''){
	 $output=array(
	 	'data'=>null
	 );
	 $cliente=$this->mcliente->select($id);
	 if (is_object($cliente) && !empty($cliente)) {
	 	$output['msg']='usuario existen';
	 	$output['status']=true;
	 	$output['data']=$cliente;
	 }else{
	 	$output['msg']='Usuario no existe';
	 	$output['status']=false;
	 }
	 echo json_encode($output);
	}
}
