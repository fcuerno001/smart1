<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
	<title>Editar Claves</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 <div class="container">

      <div class="starter-template">
 <div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
	<form id="add" action="" method="post">
    <p>Nombre Server: <input class="form-control" type="text" name="hostname" value="<?php echo $claves->hostname; ?>"></p>
    <p>Direccion Ip: <input class="form-control" type="text" name="ipAddress" value=" <?php echo $claves->ip_address; ?>"></p>
    <p>Usuario Servidor: <input class="form-control" type="text" name="usuarioServer" value="<?php echo $claves->usuario_host ?>"></p>
    <p>Password Servidor: <input class="form-control" type="ptext" name="passwordServer" value="<?php echo $claves->pass_host ?>"></p>
    <p>Soporte Coex: <input class="form-control" type="text" name="soporte" value="<?php echo $claves->mantto_admins_id_admin ?>"></p>
    <button id="btnadd" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
   
    <a href="<?php echo base_url('clavesController/lista_claves')?>" id="btnaddrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
		btnadd.click(function(){
			jQuery.ajax({
			  url: '<?php echo base_url('clavesController/editar_claves/'.$claves->id_clave); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('clavesController/lista_claves'); ?>');
			  },
			  success: function(data, textStatus, xhr) {
			    alert("Clave ha sido Actualizado");
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