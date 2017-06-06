<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
	<title>Crear VPN</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>

<div class="container">
<div class="starter-template">
<div class="test row col-sm-4  " style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;"">
	<form id="frmVPN" action="" method="post">
    <p>Nombre Empresa: <select class="form-control" name="cliente">
    <option>
    		Seleccione Empresa
    	</option>
    	<?php
       if (isset ($cliente)) {
       	foreach ($cliente as $cliente) {
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
    <div class="form-group" >
    <p>Usuario VPN: <input class="form-control" type="text" name="UserVPN"></p>
    </div>
    <p>Password VPN: <input class="form-control" type="password" name="passVPN"></p>
    <p>Fecha Caducidad: <input class="form-control" type="date" data-mask="00/00/0000" maxlength="10" autocomplete="off" name="fechaVPN"></p>
    <p>Archivo VPN: <input class="form-control" type="text" name="archivoVPN"></p>
    <p>Comentarios: <textarea class="form-control" type="text" name="comentariosVPN"></textarea></p>
    <p>Soporte COEX: <select class="form-control" name="soporteCoex">
    <option>
    		Seleccione Soporte
    	</option>
    	<?php
       if (isset ($soporteCoex)) {
       	foreach ($soporteCoex as $soporte_admin) {
       		       	?>
       	<option value="<?php echo $soporte_admin->id_admin; ?>">
       		<?php 
       		echo $soporte_admin->admin_user;

       		 ?>
       	</option>
       	<?php
       	}
       }
    	 ?>
    </select></p>
    <button id="btnadd" type="button" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
    <a href="<?php echo base_url('vpnController/lista_vpn')?>" id="btnadd" type="button" name="cancelar" class="btn btn-default" value="cancelar">Cancelar</a></p>
	</form>
</div>
 </div>
    </div><!-- /.container -->
<?php
 $this->load->view('template/jquery');
 ?>

<script type="text/javascript">
	$(function(){
		var form=$('#frmVPN');
		var btnadd=$('#btnadd');
		btnadd.click(function(){
			jQuery.ajax({
			  url: '<?php echo base_url('vpnController/insertar_vpn'); ?>',
			  type: 'POST',
			  dataType: 'json',
			  data: form.serialize(),
			  complete: function(xhr, textStatus) {
			    location= ('<?php echo base_url('vpnController/lista_vpn'); ?>');
			  },
			  success: function(data, textStatus, xhr) {
			    alert("VPN ha sido registrado");
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