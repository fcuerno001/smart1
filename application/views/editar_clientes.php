<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
	<title>Editar Clientes</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 <div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
	<form id="add" action="" method="post">
    <p>Nombre Empresa: <input id="idemp" class="form-control" type="text" name="nomCliente" value="<?php echo $cliente->cliente; ?>"></p>
    <p>Contacto: <input class="form-control" type="text" name="contacto" value="<?php echo $cliente->contacto; ?>"></p>
    <p>Skype: <input type="text" class="form-control" name="skypeEmp" required/></p>
    <p>Telefono Empresa: <input class="form-control" type="text" name="telefonoEmp" value=" <?php echo $cliente->tel_cliente; ?>"></p>
    <p>Correo Electronico: <input class="form-control" type="text" name="correoEmp" value="<?php echo $cliente->correo_cliente; ?>"></p>
    <p>Telefono Movil: <input class="form-control" type="text" name="movilEmp" value="<?php echo $cliente->movil; ?>"></p>
    <button id="btnedt" type="button" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('clienteController/lista_clientes')?>" id="btnrmv" type="button" class="btn  btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
	</form>
</div>
</div>
    </div><!-- /.container -->
<?php 
$this->load->view('template/jquery');
 ?>
<script type="text/javascript">
	$(function(){
		var form=$('#add');
		var btnadd=$('#btnadd');
		console.log($('#idemp').value);
		btnadd.click(function(){
			jQuery.ajax({
			  url: '<?php echo base_url('clienteController/editar_cliente/'.$cliente->id_cliente); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('clienteController/lista_clientes'); ?>');
			  },
			  success: function(data, textStatus, xhr) {
			    alert("Usuario ha sido Actualizado");
			  },
			  error: function(xhr, textStatus, errorThrown) {
			    
			  }
			});
			
		});
	});
</script>
</body>
</html>