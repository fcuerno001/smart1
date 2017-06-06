<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>

	<title>Mantenimiento VPN</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 <div id="newVPN" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
      <div class="container">
<div class="starter-template">
<div class="test row col-sm-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;"">
  <form id="frmVPN" action="" method="post">
    <p>Nombre Empresa: <select class="form-control" name="cliente" required="" data-parsley-required-message="Empresa Vacia">
    <option value="">
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
    <p>Usuario VPN: <input class="form-control" type="text" pattern=".{6,}" name="UserVPN" required="" data-parsley-required-message="Usuario esta Vacio" placeholder="Usuario VPN" /></p>
    </div>
    <p>Password VPN: <input class="form-control" type="password" pattern=".{6,}" name="passVPN" required="" data-parsley-required-message="Password esta Vacio" placeholder="Password VPN" /></p>
    <p>Ip Conexion VPN: <input id="ipAddressVPN" class="form-control" type="text" name="ipAddressVPN" required="" data-parsley-required-message="Direccion esta Vacio" placeholder="0.0.0.0" /></p>
    <p>Fecha Caducidad: <input class="form-control" type="text" name="fechaVPN" required="" data-parsley-required-message="Fecha esta Vacio" placeholder="dd/mm/YYYY" /></p>
    <p>Archivo VPN: <input class="form-control" type="text" pattern=".{6,}" name="archivoVPN" required="" data-parsley-required-message="Archivo esta Vacio" placeholder="Nombre Archivo VPN" /></p>
    <p>Comentarios: <textarea class="form-control" type="text" pattern=".{10,}" name="comentariosVPN" required="" data-parsley-required-message="Comentario esta Vacio" placeholder="Digite Comentario" /></textarea></p>
    <p>Soporte COEX: <select class="form-control" name="soporteCoex" required="">
    <option value="">
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
      </div><!-- /.modal-body -->
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-fade-->

<div class="container">
<div class="starter-template">
<div class="row">
<div class="col-md-1">
  <a type="button" class="btn btn-success" data-toggle="modal" data-target="#newVPN">Nuevo VPN</a></p>
</div>
	<div class="col-md-12">
		<table id="lstVPN" class="display table table-bordered">
			<thead>
				<tr>
                                   <th>Cliente</th>
                                   <th>Usuario VPN</th>
                                   <th>Password Vpn</th>
                                   <th>IP Conexion</th>
                                   <th>Fecha Caducidad</th>
                                   <th>Archivo VPN</th>
                                   <th>Soporte</th>
                                   <th>Comentarios</th>
                                   <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
                     <?php
       //valor del array asociativo del controller de listar_admins 'admins'
       if (isset ($vpn)) {
              foreach ($vpn as $vpn) {
                                   ?>
       	<tr>
                     <td>
                            <?php
                            echo $vpn->mantto_clientes_id_cliente; 
                             ?>
                     </td> 
                     <td>
                            <?php
                            echo $vpn->mantto_VPN_usuario; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $vpn->mantto_VPN_password; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $vpn->vpn_ip_address; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $vpn->fecha_caducidad; 
                             ?>
                     </td>
                      <td>
                            <?php
                            echo $vpn->nombre_archivo; 
                             ?>
                     <td>
                     
                            <?php
                            echo $vpn->mantto_admins_id_admin; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $vpn->mantto_vpn_comments; 
                             ?>
                     </td>                  
       		<td>
          <!--Boton Editar-->
       			<button  class="btn btnedt btn-sm btn-info glyphicon glyphicon-pencil" data-id="<?php echo $vpn->idmantto_VPN ?>" data-nombre=""></button>
       		<!--Boton Eliminar-->
            <a href="<?php
       			echo base_url('vpnController/eliminar_vpn/'.$vpn->idmantto_VPN); ?>" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
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

<div id="EdtVPN" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
<div class="container">
<div class="starter-template">
 <div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmVPNE" action="" method="post">
    <p>Usuario VPN: <input id="UserVPN" class="form-control" type="text" name="UserVPN" value="<?php echo $vpn->mantto_VPN_usuario; ?>"></p>
    <p>Password VPN: <input id="passVPN" class="form-control" type="text" name="passVPN" value=" <?php echo $vpn->mantto_VPN_password; ?>"></p>
    <p>IP Conexion: <input id="ipAddressVPN" class="form-control" type="text" name="ipAddressVPN" value=" <?php echo $vpn->mantto_VPN_password; ?>"></p>
    <p>Caducidad VPN: <input id="fechaVPN" class="form-control" type="text" name="fechaVPN" value=" <?php echo $vpn->mantto_VPN_password; ?>"></p>
    <p>Archivo Archivo: <input id="archivoVPN" class="form-control" type="text" name="archivoVPN" value="<?php echo $vpn->nombre_archivo ?>"></p>
    <p>Comentarios: <input id="comentariosVPN" class="form-control" type="textarea" name="comentariosVPN" value="<?php echo $vpn->mantto_vpn_comments ?>"></p>
    <p>Soporte COEX: <select id="soporteCoex" class="form-control" name="soporteCoex">
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
<!--Guardar dentro del modal-->    
    <button id="btnedt" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('vpnController/lista_vpn')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
    $('#lstVPN').DataTable();
} );
  </script>
<!--Jquery Guardar Claves--> 
<script type="text/javascript">
  $(function(){
    var frmVPN=$('#frmVPN');
    var btnadd=$('#btnadd');
    btnadd.click(function(e){
    e.preventDefault();
    if(frmVPN.parsley().validate()){
      jQuery.ajax({
        url: '<?php echo base_url('vpnController/insertar_vpn'); ?>',
        type: 'POST',
        dataType: 'json',
        data: frmVPN.serialize(),
        complete: function(xhr, textStatus) {
          location= ('<?php echo base_url('vpnController/lista_vpn'); ?>');
        },
        success: function(data, textStatus, xhr) {
          if (data.status) {
          windows.location=('<?php echo base_url();?>');
        }else{
         alert(data.msg='VPN ha sido Registrado'); 
       }
        },
        error: function(xhr, textStatus, errorThrown) {
          //called when there is an error
        }
      });
      console.log("aca esta validando");
    }else{
       console.log("no funciona");
       }
        return false;
    });
  });
</script>

<script type="text/javascript">
  $(function(){
    var form=$('#frmVPNE');
    var btnadd=$('#btnedt');
    var btnedt=$('.btnedt');
    var modalEdit=$('#EdtVPN');
    btnadd.click(function(){
     // variable para buscar id especifico.
     var id = parseInt($(this).data('id'));
      jQuery.ajax({
        url: '<?php echo base_url('vpnController/editar_vpn/'); ?>'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          location= ('<?php echo base_url('vpnController/lista_vpn'); ?>');
        },
        success: function(response, textStatus, xhr) {
        alert("Cliente ha sido Actualizado");
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
        url: '<?php echo base_url('vpnController/getVPN'); ?>/'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          
        },
        success: function(response, textStatus, xhr) {
          if(response.status){
            //location= ('<?php echo base_url('vpnController/lista_VPN'); ?>');
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
  return false;
}); 

var UserVPN=$('#UserVPN');
var passVPN=$('#passVPN');
var ipAddressVPN=$('#ipAddressVPN');
var fechaVPN=$('#fechaVPN');
var archivoVPN=$('#archivoVPN');
var comentariosVPN=$('#comentariosVPN');
var soporteCoex=$('#soporteCoex');

function setInto(data){
UserVPN.val(data.mantto_VPN_usuario);
passVPN.val(data.mantto_VPN_password);
ipAddressVPN.val(data.vpn_ip_address);
fechaVPN.val(data.fecha_caducidad);
archivoVPN.val(data.nombre_archivo);
comentariosVPN.val(data.mantto_vpn_comments);
soporteCoex.val(data.mantto_admins_id_admin );
}

  });
</script>
  
</body>
</html>