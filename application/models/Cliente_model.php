<?php 

class Cliente_model extends MY_Model{

public function __construct(){

parent::__construct();

$this->id='id_cliente';
$this->table='mantto_clientes';

}


}