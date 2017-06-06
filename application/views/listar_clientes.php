<!DOCTYPE html>
<html>
<head>
<?php 
 $this->load->view('template/css');
 ?>
<title>Mantenimiento Cliente</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
 <div id="newCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
        <div class="container">
  <div class="starter-template" >
  <div class="test row col-sx-4 col-md-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px; ">
  <form name="frmCliente" id="frmCliente" action="" method="post">
    <p>Nombre Empresa: <input class="form-control" type="text" pattern=".{10,}" name="nomCliente" required="" data-parsley-required-message="Empresa esta Vacia" placeholder="Nombre Empresa" /></p>
    <p>Contacto: <input type="text" pattern=".{10,}" class="form-control" name="contacto" required="" data-parsley-required-message="Contacto esta Vacio" placeholder="Contacto" /></p>
    <p>Skype: <input type="text" pattern=".{6,}"  class="form-control" name="skypeEmp" required="" data-parsley-required-message="Skype esta Vacio" placeholder="Usuario Skype" /></p>
    <p>Telefono Empresa: <input id="telEmp" type="tel" pattern=".{8,}" class="form-control" name="telefonoEmp" required="" data-parsley-required-message="Telefono esta Vacio" placeholder="Telefono Empresa" />
    </p>
   <p>Correo Electronico: <input type="email" class="form-control" name="correoEmp" placeholder="Correo Electronico" required="" data-parsley-required-message="Correo esta Vacio" /></p>

    <p>Telefono Movil: <input type="text" pattern=".{8,}" class="form-control" name="movilEmp" required="" data-parsley-required-message="Movil esta Vacio" placeholder="Telefono Movil"></p>

    <button id="btnadd" type="button" class="btn btn-primary" name="guardar">Guardar</button>
    
   <a href="<?php echo base_url('clienteController/lista_clientes')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
 <a class="btn btn-success" data-toggle="modal" data-target="#newCliente"  type="button">Nuevo Cliente</a></p>
 </div>
	<div class="col-md-13">
 		<table id="lstClientes" class="display table table-bordered nowrap" >
			<thead>
				<tr>
                                   <th>Cliente</th>
                                   <th>Contacto</th>
                                   <th>skype</th>
                                   <th>Telefono</th>
                                   <th>Correo</th>
                                   <th>Movil</th>
                                   <th>Registro</th>
                                   <th>Modificacion</th>
                                   <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
                     <?php
       if (isset ($clientes)) {
              foreach ($clientes as $cliente) {
                                   ?>
       	<tr>

                     <td>
                            <?php
                            echo $cliente->cliente; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->contacto; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->skype; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->tel_cliente; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->correo_cliente; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->movil; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->fecha_registro; 
                             ?>
                     </td>
                     <td>
                            <?php
                            echo $cliente->fecha_modif; 
                             ?>
                     </td>
         
       		<td>
            
                       
      			<button class="btn btnedt btn-sm btn-info glyphicon glyphicon-pencil" data-id="<?php echo $cliente->id_cliente ?>" data-nombre=""></button>
            <!-- -->
       			<a href="<?php
       			echo base_url('clienteController/eliminar_clientes/'.$cliente->id_cliente); ?>" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
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
<div id="EdtCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
<div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmClienteE" action="" method="post">
    <p>Nombre Empresa: <input id="nomEmp" pattern=".{6,}" class="form-control" type="text" name="nomCliente" value="<?php echo $cliente->cliente; ?>"></p>
    <p>Contacto: <input id="contacto" pattern=".{6,}" class="form-control" type="text" name="contacto" value="<?php echo $cliente->contacto; ?>"></p>
    <p>Skype: <input id="skype" type="text" pattern=".{6,}" class="form-control" name="skypeEmp" required/></p>
    <p>Telefono Empresa: <input id="telEmp" class="form-control" type="text" name="telefonoEmp" value=" <?php echo $cliente->tel_cliente; ?>"></p>
    <p>Correo Electronico: <input id="emEmp" class="form-control" type="text" name="correoEmp" value="<?php echo $cliente->correo_cliente; ?>"></p>
    <p>Telefono Movil: <input id="celEmp" class="form-control" type="text" name="movilEmp" value="<?php echo $cliente->movil; ?>"></p>
    
    <button id="btnedt" type="button" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>

    <a href="<?php echo base_url('clienteController/lista_clientes')?>" id="btnrmv" type="button" class="btn  btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
   $('#lstClientes').DataTable();
});
</script>
 <!--Jquery Guardar Clientes-->
  <script type="text/javascript">
    $(function(){
    var frmCliente=$('#frmCliente');
    var btnadd=$('#btnadd');
    btnadd.click(function(e){
    e.preventDefault(); 
if (frmCliente.parsley().validate()) {
      jQuery.ajax({
        url: '<?php echo base_url('clienteController/insertar_cliente'); ?>',
        type: 'POST',
        dataType: 'json',
        data: frmCliente.serialize(),
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
<!--Jquery Editar Clientes-->
<script type="text/javascript">
  $(function(){
    var form=$('#frmClienteE');
    var btnadd=$('#btnedt');
    var btnedt=$('.btnedt');
    var modalEdit=$('#EdtCliente');
    btnadd.click(function(){
      // variable para buscar id especifico.
      var id = parseInt($(this).data('id'));
      jQuery.ajax({
        url: '<?php echo base_url('clienteController/editar_cliente'); ?>/'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          location= ('<?php echo base_url('clienteController/lista_clientes'); ?>');
        },
        success: function(data, textStatus, xhr) {
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
        url: '<?php echo base_url('clienteController/getCliente'); ?>/'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          
        },
        success: function(response, textStatus, xhr) {
          if(response.status){
            //location= ('<?php echo base_url('clienteController/lista_clientes'); ?>');
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

var nomEmp=$('#nomEmp');
var contacto=$('#contacto');
var skype=$('#skype');
var telEmp=$('#telEmp');
var emEmp=$('#emEmp');
var celEmp=$('#celEmp');

function setInto(data){
nomEmp.val(data.cliente);
contacto.val(data.contacto);
skype.val(data.skype);
telEmp.val(data.tel_cliente);
emEmp.val(data.correo_cliente);
celEmp.val(data.movil);
}

  });
</script>

</body>
</html>