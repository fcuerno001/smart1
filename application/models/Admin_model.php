<?php 

class Admin_model extends MY_Model{

public function __construct(){

parent::__construct();

$this->id='id_admin';
$this->table='mantto_admins';

}

//valida que exista un usuario desde login antes de llegar al controlador.
public function login($user){
$this->db->where('admin_user',$user);
$result=$this->db->get($this->table);
return $result->row();
}




}




