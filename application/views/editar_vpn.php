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
    <p>Usuario VPN: <input class="form-control" type="text" name="UserVPN" value="<?php echo $vpn->mantto_VPN_usuario; ?>"></p>
    <p>Password VPN: <input class="form-control" type="text" name="passVPN" value=" <?php echo $vpn->mantto_VPN_password; ?>"></p>
    <p>Ruta Archivo: <input class="form-control" type="text" name="usuarioServer" value="<?php echo $vpn->ruta_archivo ?>"></p>
    <p>Soporte Coex: <input class="form-control" type="text" name="soporte" value="<?php echo $vpn->mantto_admins_id_admin ?>"></p>
    <button id="btnadd" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('vpnController/lista_vpn')?>" id="btnadd" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
			  url: '<?php echo base_url('vpnController/editar_vpn/'.$claves->id_clave); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('vpnController/lista_vpn'); ?>');
			  },
			  success: function(data, textStatus, xhr) {
			    alert("VPN ha sido Actualizado");
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