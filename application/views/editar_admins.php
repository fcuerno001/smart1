<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
	<title>Editar Admins</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 <div class="container">

      <div class="starter-template">
 <div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
 	<form id="add" action="" method="post">
    <p>Usuario Admin: <input class="form-control" type="text" name="UserAdmin" value="<?php echo $admin->admin_user; ?>"></p>
    <p>Password Admin: <input class="form-control" type="password" name="password" value="<?php echo $admin->pass_admin; ?>"></p>
    <p>Nombre Admin: <input class="form-control" type="text" name="nombre_admin" value=" <?php echo $admin->nombre_admin; ?>"></p>
    <p>Plataforma: <input class="form-control" type="text" name="plataforma" value="<?php echo $admin->plataforma ?>"></p>
    <button id="btnadd" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('adminController/lista_admins')?>" id="btnadd" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
			  url: '<?php echo base_url('adminController/editar_admins/'.$admin->id_admin); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('adminController/lista_admins'); ?>');	
			  },
			  success: function(data, textStatus, xhr) {
			    alert("Usuario ha sido Actualizado");
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