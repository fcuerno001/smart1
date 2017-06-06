<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VpnController extends MY_Controller {

   public function __construct(){
   		parent::__construct();
		$this->load->model('vpn_model','mvpn');
	}

	public function index()
	{
		$vpn=$this->mvpn->selectAll();
		print_r($vpn);
	}

	public function insertar_vpn(){

		$vpn=array(
			
			'mantto_VPN_usuario'=>$this->input->post('UserVPN'),
			'mantto_VPN_password'=>$this->input->post('passVPN'),
			'vpn_ip_address'=>$this->input->post('ipAddressVPN'),
			'fecha_caducidad'=>$this->input->post('fechaVPN'),
			'nombre_archivo'=>$this->input->post('archivoVPN'),
			'mantto_vpn_comments'=>$this->input->post('comentariosVPN'),
			'mantto_admins_id_admin'=>$this->input->post('soporteCoex'),
			'mantto_clientes_id_cliente'=>$this->input->post('cliente')
			
		);

		$id=$this->mvpn->create($vpn);
		echo $id;

	}


public function editar_vpn($id=''){

$output=array();

		$vpn=array(
			'mantto_VPN_usuario'=>$this->input->post('UserVPN'),
			'mantto_VPN_password'=>$this->input->post('passVPN'),
			'vpn_ip_address'=>$this->input->post('ipAddressVPN'),
			'nombre_archivo'=>$this->input->post('archivoVPN'),
			'mantto_vpn_comments'=>$this->input->post('comentariosVPN'),
			'fecha_caducidad'=>$this->input->post('fechaVPN')
		);
		
         $isUpdate=$this->mvpn->update($id,$vpn);
        if ($isUpdate) {
        	//array asociativo
        $output['status']=TRUE;

        }else{
		$output['status']=FALSE;
        }
		echo json_encode($output);

	}

	public function view_editar_vpn($id=''){
	
	if (is_numeric($id)) {
		$data['vpn']=$this->mvpn->select($id);
		$this->load->view('editar_vpn',$data);
		}else{
		show_404();
		}
		
	}

	public function eliminar_vpn($id=''){
	if (is_numeric($id)) {
		$this->mvpn->delete($id);
		$output['msg']='Registro Eliminado';
		}else{
	    
		}
		redirect('vpnController/lista_vpn');
	}



	public function lista_vpn(){
		$this->load->model('cliente_model','mcliente');
		$this->load->model('admin_model','madmin');
		$data['cliente'] = $this->mcliente->selectAll();
		$data['soporteCoex'] = $this->madmin->selectAll();
		$data['vpn']=$this->mvpn->selectAll();
		$this->load->view('listar_vpn',$data);
	}


	public function view_vpn(){
	$this->load->model('cliente_model','mcliente');
	$this->load->model('admin_model','madmin');
	$data['cliente'] = $this->mcliente->selectAll();
	$data['soporteCoex'] = $this->madmin->selectAll();
	$this->load->view('view_vpn',$data);
	}

	public function getVPN ($id=''){
	 $output=array(
	 	'data'=>null
	 );
	 $vpn=$this->mvpn->select($id);
	 if (is_object($vpn) && !empty($vpn)) {
	 	$output['msg']='VPN ha sido Actualizado';
	 	$output['status']=true;
	 	$output['data']=$vpn;
	 }else{
	 	$output['msg']='Registro Sin Cambios';
	 	$output['status']=false;
	 }
	 echo json_encode($output);
	}



}
