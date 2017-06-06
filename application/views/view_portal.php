<!DOCTYPE html>
<html>
<head>

<?php 
 $this->load->view('template/css');
 ?>
	<title>Portal de Claves</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 
<center><h2>Bienvenido Portal de Claves</h2></center>
<p>
<center>

<div id="crearCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
        <div class="container">
  <div class="starter-template" >
  <div class="test row col-sx-4 col-md-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px; ">
<!--Formulario para la creacion de Clientes-->

    <form id="frmClientei" name="frmClientei" action="" method="post">
    <p>Nombre Empresa: <input class="form-control" type="text" pattern=".{10,}" name="nomCliente" required="" data-parsley-required-message="Empresa esta Vacia" placeholder="Nombre Empresa" /></p>
    <p>Contacto: <input type="text" pattern=".{10,}" class="form-control" name="contacto" required="" data-parsley-required-message="Contacto esta Vacio" placeholder="Contacto" /></p>
    <p>Skype: <input type="text" pattern=".{6,}"  class="form-control" name="skypeEmp" required="" data-parsley-required-message="Skype esta Vacio" placeholder="Usuario Skype" /></p>
    <p>Telefono Empresa: <input id="telEmp" type="tel" class="form-control" name="telefonoEmp" required="" data-parsley-required-message="Telefono esta Vacio" placeholder="Telefono Empresa" />
    </p>
   <p>Correo Electronico: <input type="email" class="form-control" name="correoEmp" placeholder="Correo Electronico" required="" data-parsley-required-message="Correo esta Vacio" /></p>

    <p>Telefono Movil: <input type="text" class="form-control" name="movilEmp" required="" data-parsley-required-message="Movil esta Vacio" placeholder="Telefono Movil"></p>

    <button id="btnadd" type="button" class="btn btn-primary" name="guardar">Guardar</button>
    
   <a href="<?php echo base_url('welcome/index')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
  </form>
  </div>
 </div>
    </div><!-- /.container -->
    </div><!-- /.modal-body -->
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-fade-->

<!--Boton para Crear Cliente-->
<div class="col-md-12"> 
<button class="btn btn-success" data-toggle="modal" data-target="#crearCliente"  type="button">Nuevo Cliente</button>

<button class="btn btn-primary" data-toggle="modal" data-target="#crearUsuario"  type="button">Nuevo Usuario</button>

<button class="btn btn-danger" data-toggle="modal" data-target="#crearClave"  type="button">Nueva Clave</button>

<button class="btn btn-info" data-toggle="modal" data-target="#crearVPN"  type="button">Nuevo VPN</button>

</div>

<!-- Liberias Jquery-->
  <?php
 $this->load->view('template/jquery');
 ?>
 
<!--Funcion de Guardar Cliente-->
<script type="text/javascript">
    $(function(){
    var frmClientei=$('#frmClientei');
    var btnadd=$('#btnadd');
    btnadd.click(function(e){
    e.preventDefault(); 
if (frmClientei.parsley().validate()) {
      jQuery.ajax({
        url: '<?php echo base_url('clienteController/insertar_cliente'); ?>',
        type: 'POST',
        dataType: 'json',
        data: frmClientei.serialize(),
        complete: function(xhr, textStatus) {
          location= ('<?php echo base_url('clienteController/lista_clientes'); ?>');      
                  },
        success: function(data, textStatus, xhr) {
          if (data.status) {
          windows.location=('<?php echo base_url();?>');
         }else{
         alert(data.msg='Cliente ha sido Registrado'); 
         }
        },
        error: function(xhr, textStatus, errorThrown) {
          
        }
           });
      console.log("aca esta validando");
    }else{
       console.log("no funciona");
       }
        return false;
      });
    $('#telEmp').mask('(000) 0000-0000'),
    $('#celEmp').mask('0000-0000');
  });

</script>
</body>
</html>