<?php 

class Claves_model extends MY_Model{

public function __construct(){

parent::__construct();

$this->id='id_clave';
$this->table='mantto_claves';
}

public function getClaves(){
	 $q="SELECT claves.id_clave, clientes.cliente,claves.hostname,claves.ip_address, claves.usuario_host, claves.pass_host,claves.fecha_registro,claves.fecha_modif,claves.mantto_admins_id_admin FROM coex.mantto_claves as claves
	left join coex.mantto_clientes as clientes
	on claves.mantto_clientes_id_cliente=clientes.id_Cliente;";
$query=$this->db->query($q,FALSE);
return $query->result();
}


}