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
<div id="newClave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
      <div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmClaves" action="" method="post">
    <p>Empresa Cliente: <select class="form-control" name="cliente" required="">
      <option value="">
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
    <!--<div class="form-group">-->
    <p>Nombre Servidor: <input class="form-control" type="text" name="hostname" required="" pattern=".{6,}" data-parsley-required-message="Servidor esta Vacio" placeholder="Nombre Servidor" /></p>
    <p>Direccion IP: <input class="form-control" type="text" name="ipAddress" required="" data-parsley-required-message="Direccion Ip esta Vacio" placeholder="0.0.0.0" /></p>
    <p>Usuario Servidor: <input class="form-control" type="text" pattern=".{6,}" name="usuarioServer" required="" data-parsley-required-message="Usuario esta Vacio" placeholder="Usuario de Servidor" /></p>
    <p>Password Servidor: <input class="form-control" type="password" name="passwordServer" pattern=".{6,}" required="" data-parsley-required-message="Password esta Vacio" placeholder="Password" /></p>
    <p>Soporte Coex: <select class="form-control" name="soporte" required="">
    <option value="">
        Seleccione Soporte
      </option>
      <?php
       if (isset ($soportes)) {
        foreach ($soportes as $soporte) {
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
    <!--Nueva Clave-->
    <button id="btnadd" type="button" name="guardar" class="btn btn-primary" value="guardar">Guardar</button>

    <a href="<?php echo base_url('clavesController/lista_claves')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
  </form>
</div>
</div>
    </div><!-- /.container -->
     </div><!-- /.modal-body -->
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-fade-->

<div class="container">
<div class="starter-template">
<div class="row">
<div class="col-md-1">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newClave">Nueva Clave</button></p>
</div>
	<div class="col-md-12">
		<table id="lstClaves" class="display table table-bordered">
			<thead>
				<tr>
                                   <th>Cliente</th>
                                   <th>Servidor</th>
                                   <th>Direccion IP</th>
                                   <th>Usuario</th>
                                   <th>Password</th>
                                   <th>Registro</th>
                                   <th>Modificacion</th>
                                   <th>Soporte</th>
                                   <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
    <?php
       if (isset($claves)) {
              foreach ($claves as $claves) {
                                   ?>
       	<tr>
                      <td>
                            <?php
                            echo $claves->cliente; 
                             ?>
                     </td>
                     
                     <td>
                            <?php
                            echo $claves->hostname; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $claves->ip_address; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $claves->usuario_host; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $claves->pass_host; 
                             ?>
                     </td>
                      <td>
                            <?php
                            echo $claves->fecha_registro; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $claves->fecha_modif; 
                             ?>
                     </td>   
                     <td>
                            <?php
                            echo $claves->mantto_admins_id_admin; 
                             ?>
                     </td>                                  
                     
       		<td>
          <!--Boton Editar-->
       			<button class="btn btnedt btn-sm btn-info glyphicon glyphicon-pencil" data-id="<?php echo $claves->id_clave ?>" data-nombre=""></button>
          <!--Boton Eliminar-->
       			<a href="<?php
       			echo base_url('clavesController/eliminar_claves/'.$claves->id_clave); ?>" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
       	</td>
       </tr>
       <?php
         }
       }
    	?>
			</tbody>
		</table>
  </div>
</div>
	</div>
  </div>

<div id="EdtClave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
<div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmClavesE" action="" method="post">
    <p>Nombre Server: <input id="nomServer" class="form-control" type="text" name="hostname" value="<?php echo $claves->hostname; ?>"></p>
    <p>Direccion Ip: <input id="ipAddress" class="form-control" type="text" name="ipAddress" value=" <?php echo $claves->ip_address; ?>"></p>
    <p>Usuario Servidor: <input id="usuarioServer" class="form-control" type="text" name="usuarioServer" value="<?php echo $claves->usuario_host ?>"></p>
    <p>Password Servidor: <input id="passwordServer"class="form-control" type="ptext" name="passwordServer" value="<?php echo $claves->pass_host ?>"></p>
    <p>Soporte Coex: <select id="soporte" class="form-control" name="soporte" required="">
    <option value="">
        Seleccione Soporte
      </option>
      <?php
       if (isset ($soportes)) {
        foreach ($soportes as $soporte) {
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
    <!--Guardar dentro del modal-->
    <button id="btnedt" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
   
    <a href="<?php echo base_url('clavesController/lista_claves')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
  </form>
 </div>      
</div>
      </div><!-- /.container -->
      </div><!-- /.modal-body -->
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-fade-->
<!-- Liberias Jquery-->
  <?php
 $this->load->view('template/jquery');
 ?>
<!-- Data Table-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#lstClaves').DataTable();
} );
  </script>
<!--Jquery Guardar Claves-->
  <script type="text/javascript">
  $(function(){
    var frmClaves=$('#frmClaves');
    var btnadd=$('#btnadd');
    btnadd.click(function(e){
    e.preventDefault();
  if(frmClaves.parsley().validate()){
  jQuery.ajax({
        url: '<?php echo base_url('clavesController/insertar_claves'); ?>',
        type: 'POST',
        dataType: 'json',
        data: frmClaves.serialize(),
        complete: function(xhr, textStatus) {
          location= ('<?php echo base_url('clavesController/lista_claves'); ?>');
        },
        success: function(data, textStatus, xhr) {
          if (data.status) {
          window.location=('<?php echo base_url();?>');
         }else{
         alert(data.msg='Clave ha sido registrada');
         }
        },
        error: function(xhr, textStatus, errorThrown) 
        {
          //called when there is an error
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
<!--Jquery Editar Claves-->
<script type="text/javascript">
  $(function(){
    var form=$('#frmClavesE');
    var btnadd=$('#btnedt');
    var btnedt=$('.btnedt');
    var modalEdit=$('#EdtClave');
    btnadd.click(function(){
      // variable para buscar id especifico.
      var id = parseInt($(this).data('id'));
      jQuery.ajax({
        url: '<?php echo base_url('clavesController/editar_claves/'); ?>/'+id,
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
          
        }
      });
      
    });

btnedt.click(function(e){
  e.preventDefault();
  var id=$(this).data('id');
  //variable para buscar el atributo data-id de la accion de guardar
  btnadd.attr('data-id', id);
  jQuery.ajax({
        url: '<?php echo base_url('clavesController/getClaves'); ?>/'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          
        },
        success: function(response, textStatus, xhr) {
          if(response.status){
            //location= ('<?php echo base_url('clavesController/lista_claves'); ?>');
            console.log(response);
            setInto(response.data);
              modalEdit.modal();
          } else{
            alert(response.msg);
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          
        }
      });


  console.log(id);
  return false;
});

var nomServer=$('#nomServer');
var ipAddress=$('#ipAddress');
var usuarioServer=$('#usuarioServer');
var passwordServer=$('#passwordServer');
var soporte=$('#soporte');

function setInto(data){
nomServer.val(data.hostname);
ipAddress.val(data.ip_address);
usuarioServer.val(data.usuario_host);
passwordServer.val(data.pass_host);
soporte.val(data.mantto_admins_id_admin);
}

  });
</script>
</body>
</html>