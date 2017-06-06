<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/login');
 ?>
    <meta charset="utf-8">
    <title>Inicio Portal de Claves</title>
</head>
<body>

<div class="wrapper">
<center>
	<form id="loginForm" class="form-signin form-horizontal" method='POST' action="" data-parsley-validate="">
		<h2 class="textlogin form-signin-heading">IT Operations</h2>
 
 <div class="form-group">
 <label class="col-xs-3 control-label">Username</label>
		<div class="col-xs-7">
		<input id="adminUser" class="form-control" type="text" name="adminUser" placeholder="Usuario" autofocus="" required="" data-parsley-required-message="Usuario requerido"/>
		</div>
    </div>

    <div class="form-group">
		<label class="col-xs-3 control-label">Password</label>
		<div class="col-xs-7">
		<input class="form-control" type="password" name="passUser" placeholder="Contraseña" required="" data-parsley-required-message="Hace falta la contraseña" />
		</div>
    </div>

<div class="form-group">
        <div class="col-xs-9 col-xs-offset-2">
		<button class="btn btn-primary btn-block" type="button" id="btnlogin">Iniciar Session</button>
		  </div>
    </div>
	</form>

	<?php
 	$this->load->view('template/jquery');
	?>

<script>
$(document).ready(function() {
	var btnlogin = $("#btnlogin");
	var formLogin = $("#loginForm");

	btnlogin.click(function(e){
		e.preventDefault();

   if(formLogin.parsley().validate()){
      jQuery.ajax({
        url: '<?php echo base_url('Welcome/login_user'); ?>',
        type: 'POST',
        dataType: 'json',
        data: formLogin.serialize(),
        complete: function(xhr, textStatus) {
            
        },
        success: function(data, textStatus, xhr) {
         if (data.status) {
         	window.location=('<?php echo base_url();?>');
         }else{
         alert(data.msg);

         }
         
        },
        error: function(xhr, textStatus, errorThrown) {
          
        }
      });
			console.log("aca esta validando");
		} else{
			console.log("no funciona");
		}
		return false;
	});

});

</script>

<script type="text/javascript">
$(function () {
  $('#loginForm').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>

</center>
</div>
</body>
</html>





























