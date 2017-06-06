<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
	<title>Mantenimiento Claves</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
<div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
	<form id="frmclaves" action="" method="post">
    <p>Empresa Cliente: <select class="form-control" name="cliente" >
    	<option>
    		Seleccione Empresa
    	</option>
    	<?php
       if (isset ($clientes)) {
       	foreach ($clientes as $cliente) {
       		       	?>
       	<option value="<?php echo $cliente->id_cliente; ?>">
       		<?php 
       		echo $cliente->cliente;
       		 ?>
       	</option>
       	<?php
       	}
       }
    	 ?>
    </select></p>
    <p>Nombre Servidor: <input class="form-control" type="text" name="hostname"></p>
    <p>Direccion IP: <input class="form-control" type="text" name="ipAddress"></p>
    <p>Usuario Servidor: <input class="form-control" type="text" name="usuarioServer"></p>
    <p>Password Servidor: <input class="form-control" type="password" name="passwordServer"></p>
    <p>Soporte Coex: <select class="form-control" name="soporte">
    <option>
    		Seleccione Soporte
    	</option>
    	<?php
       if (isset ($soporte)) {
       	foreach ($soporte as $soporte) {
       		       	?>
       	<option value="<?php echo $soporte->id_admin; ?>">
       		<?php 
       		echo $soporte->admin_user;

       		 ?>
       	</option>
       	<?php
       	}
       }
    	 ?>
    </select></p>
    <button id="btnadd" type="button" name="guardar" class="btn btn-primary value="guardar">Guardar</button>

    <a href="<?php echo base_url('clavesController/lista_claves')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
	</form>
</div>
</div>
    </div><!-- /.container -->
<?php 
$this->load->view('template/jquery');
 ?>
<script type="text/javascript">
	$(function(){
		var form=$('#frmclaves');
		var btnadd=$('#btnadd');
		btnadd.click(function(){
			jQuery.ajax({
			  url: '<?php echo base_url('clavesController/insertar_claves'); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('clavesController/lista_claves'); ?>'); 
			  },
			  success: function(data, textStatus, xhr) {
			    alert("Clave ha sido registrado");
			  },
			  error: function(xhr, textStatus, errorThrown) {
			    //called when there is an error
			  }
			});
			
		});
	});
</script>
</body>
</html>