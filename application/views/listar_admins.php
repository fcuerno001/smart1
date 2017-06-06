<!DOCTYPE html>
<html>
<head>
 <?php 
 $this->load->view('template/css');
 ?>
	<title>Mantenimiento Admins</title>
</head>
<body>
<?php 
$this->load->view('template/header');
 ?>
<div id="newAdmin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
         <div class="container">
<div class="starter-template">
<div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmAdmins" action="" method="post">
    <p>Usuario Admin: <input class="form-control" type="text" pattern=".{6,}" name="UserAdmin" required="algo" data-parsley-required-message="Usuario esta Vacio" placeholder="Usuario"></p>
    <p>Password Admin: <input class="form-control" type="password" pattern=".{6,}" name="password" required="" data-parsley-required-message="Password esta Vacio" placeholder="Password"></p>
    <p>Nombre Admin: <input class="form-control" type="text" pattern=".{10,}" name="nombre_admin" required="" data-parsley-required-message="Nombre esta Vacio" placeholder="Nombre Usuario"></p>
    <p>Plataforma: <input class="form-control" type="text" pattern=".{5,}" name="plataforma" required="" data-parsley-required-message="Plataforma Vacio" placeholder="Plataforma"></p>
    <!--Nuevo usuario-->
    <button id="btnadd" type="button" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('adminController/lista_admins')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
 <a type="button" class="btn btn-success" data-toggle="modal" data-target="#newAdmin">Nuevo Usuario</a></p>
</div>
	<div class="col-md-12">
		<table id="lstAdmins" class="display table table-bordered" >
			<thead>
				<tr>
					<th>Usuario</th>
					<!--<th>Password</th>-->
					<th>Nombre</th>
					<th>Plataforma</th>
          <th>Fecha Creacion</th>
          <th>Rol Acceso</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//valor del array asociativo del controller de listar_admins 'admins'
       if (isset ($admins)) {
       	foreach ($admins as $admin) {
       		       	?>
       	<tr>
       		<td>
       			<?php
       			echo $admin->admin_user; 
       			 ?>
       		</td>
       		<!-- <td>
       			<?php 
       			echo $admin->pass_admin;
       			 ?>
       		</td> -->
       		<td>
       			<?php 
       			echo $admin->nombre_admin;
       			 ?>
       		</td>
       		<td>
       			<?php 
       			echo $admin->plataforma;
       			 ?>
       		</td>
                  <td>
                        <?php 
                        echo $admin->fecha_creacion;
                         ?>
                  </td>
                   <td>
                        <?php 
                        echo $admin->rol_admin;
                         ?>
                  </td>
       		<td>
          <!--Boton Editar-->
            <button class="btn btnview btn-sm btn-primary glyphicon glyphicon-eye-open" data-id="<?php echo $admin->id_admin  ?>" data-nombre=""></button>

            <button class="btn btnedt btn-sm btn-info glyphicon glyphicon-pencil" data-id="<?php echo $admin->id_admin  ?>" data-nombre=""></button>
             <!--Boton Eeliminar-->
       			<a href="<?php
       			echo base_url('adminController/eliminar_admins/'.$admin->id_admin); ?>" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
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
<div id="EdtAdmin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-body">
<div class="container">
      <div class="starter-template">
 <div class="test row col-xs-3 text-center col-md-4 col-md-offset-4" style="border-radius: 5px; background-color:#f2f2f2; padding: 30px;">
  <form id="frmAdminsE" action="" method="post">
    <p>Usuario Admin: <input id="userAdmin" class="form-control" type="text" name="UserAdmin" value="<?php echo $admin->admin_user; ?>"></p>
    <p>Password Admin: <input id="passAdmin" class="form-control" type="password" name="password" value="<?php echo $admin->pass_admin; ?>"></p>
    <p>Nombre Admin: <input id="nomAdmin" class="form-control" type="text" name="nombre_admin" value=" <?php echo $admin->nombre_admin; ?>"></p>
    <p>Plataforma: <input id="plataforma" class="form-control" type="text" name="plataforma" value="<?php echo $admin->plataforma ?>"></p>
    <!--Guardar dentro del modal-->
    <button id="btnedt" class="btn btn-primary" type="button" name="guardar" value="guardar">Guardar</button>
    
    <a href="<?php echo base_url('adminController/lista_admins')?>" id="btnrmv" type="button" class="btn btn-default" name="cancelar" value="cancelar">Cancelar</a></p>
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
 <!--Jquery DataTable-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#lstAdmins').DataTable();
} );
  </script>
<!--Jquery Guardar Claves-->
  <script type="text/javascript">
  $(function(){
    var frmAdmins=$('#frmAdmins');
    var btnadd=$('#btnadd');
   btnadd.click(function(e){
    e.preventDefault();
if(frmAdmins.parsley().validate()){
      jQuery.ajax({
        url: '<?php echo base_url('adminController/insertar_admin'); ?>',
        type: 'POST',
        dataType: 'json',
        data: frmAdmins.serialize(),
        complete: function(xhr, textStatus) {
      location=('<?php echo base_url('adminController/lista_admins') ?>')
        },
        success: function(data, textStatus, xhr) {
          if (data.status) {
          windows.location=('<?php echo base_url();?>');
         }else{
         alert(data.msg='Usuario ha sido Creado'); 
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
<!-- Jquery Editar Admins-->
<script type="text/javascript">
  $(function(){
    var form=$('#frmAdminsE');
    var btnadd=$('#btnedt');
    var btnedt=$('.btnedt');
    var modalEdit=$('#EdtAdmin');
    btnadd.click(function(){
    // variable para buscar id especifico. 
      //var id = $(this).data('id');
    var id = parseInt($(this).data('id'));  
      jQuery.ajax({
        url: '<?php echo base_url('adminController/editar_admins'); ?>/'+id,
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
          
        }
      });
      
    });

btnedt.click(function(e){
  e.preventDefault();
  var id=$(this).data('id');
  
  btnadd.attr('data-id', id);
  jQuery.ajax({
        url: '<?php echo base_url('adminController/getAdmins'); ?>/'+id,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        complete: function(xhr, textStatus) {
          //location= ('<?php echo base_url('adminController/lista_admins'); ?>');
        },
        success: function(response, textStatus, xhr) {
          if(response.status){
            //location= ('<?php echo base_url('adminController/lista_admins'); ?>');
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

var userAdmin=$('#userAdmin');
var passAdmin=$('#passAdmin');
var nomAdmin=$('#nomAdmin');
var plataforma=$('#plataforma');

function setInto(data){
userAdmin.val(data.admin_user);
passAdmin.val(data.pass_admin);
nomAdmin.val(data.nombre_admin);
plataforma.val(data.plataforma);

}
  });
</script>

</body>
</html>