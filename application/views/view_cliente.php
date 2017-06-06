<!DOCTYPE html>
<html>
<head>

<?php 
 $this->load->view('template/css');
 ?>
	<title>Crear Clientes</title>
</head>
<body>



<?php 
$this->load->view('template/header');
 ?>
	<div class="container">
    <div class="starter-template" >
  	<div class="test row col-sx-4 col-md-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px; ">
	<form name="frmCliente" id="frmCliente" action="" method="post">
    <p>Nombre Empresa: <input type="text" class="form-control" name="nomCliente" required/></p>
    <p>Contacto: <input type="text" class="form-control" name="contacto" required/></p>
    <p>Skype: <input type="text" class="form-control" name="skypeEmp" required/></p>
    <p>Telefono Empresa: <input type="tel" class="form-control" name="telefonoEmp" required>
    </p>
    <p>Correo Electronico: <input type="email" class="form-control" name="correoEmp" placeholder="Correo" required></p>
    <p>Telefono Movil: <input type="text" class="form-control" name="movilEmp" required></p>
    <button id="btnadd" type="button" class="btn btn-primary name="guardar" value="guardar" required>Guardar</button>
    
   <a href="<?php echo base_url('clienteController/lista_clientes')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
	</form>
</div>
 </div>
    </div><!-- /.container -->
<?php
 $this->load->view('template/jquery');
 ?>

 <script type="text/javascript">
	
	$(function(){
		var form=$('#frmCliente');
		var btnadd=$('#btnadd');
		btnadd.click(function(){
			jQuery.ajax({
			  url: '<?php echo base_url('clienteController/insertar_cliente'); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			  	location= ('<?php echo base_url('clienteController/lista_clientes'); ?>');	    
			  				  },
			  success: function(data, textStatus, xhr) {
			    alert("Cliente ha sido registrado");
			  },
			  error: function(xhr, textStatus, errorThrown) {
			   alert("Cliente no Registrado"); 
			  }
			});
			
		});
	});
</script>
</body>
</html>