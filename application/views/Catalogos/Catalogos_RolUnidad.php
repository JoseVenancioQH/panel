<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="0">

<div class="box box-solid bg-teal-gradient">
</div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rol Unidades
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Rol Unidades</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Rol Unidades</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-rolunidad" onclick="javascript:idRolUnidadEdit = 0;clearform();">Agregar Rol Unidades</button>                      
                   </td>                   
               </tr>
             </table>                  
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $RolUnidades = $this->catalogos_rolunidad_module->get_catalogos_rolunidad(0);

                   if(!empty($RolUnidades)){  

                      foreach($RolUnidades as $rowRolUnidades){                                                         

                        echo "<tr>";
                        echo "<td>".$rowRolUnidades->cat_rol_unidades_id_rol."</td>";                     
                        echo "<td>".$rowRolUnidades->cat_rol_unidades_nombre."</td>";                          
                        echo "<td>".(($rowRolUnidades->cat_rol_unidades_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowRolUnidades->cat_rol_unidades_fecharegistro."</b><br>Actuali.:<br><b>".$rowRolUnidades->cat_rol_unidades_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verRolUnidad(\"".$rowRolUnidades->cat_rol_unidades_id_rol."\",\"".$rowRolUnidades->cat_rol_unidades_nombre."\",\"".$rowRolUnidades->cat_rol_unidades_status."\",\"".$rowRolUnidades->cat_rol_unidades_fecharegistro."\",\"".$rowRolUnidades->cat_rol_unidades_fechaactualiza."\")' title='Editar Rol Unidad' data-toggle='modal' data-target='#modal-agregar-rolunidad' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowRolUnidades->cat_rol_unidades_status==0)?"Success":"Danger")." ".(($rowRolUnidades->cat_rol_unidades_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarRolUnidad(".$rowRolUnidades->cat_rol_unidades_id_rol.",".(($rowRolUnidades->cat_rol_unidades_status==0)?1:0).")' title='Editar Rol Unidad' type='button'><i class='fa fa-".(($rowRolUnidades->cat_rol_unidades_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Fechas</th>                    
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-rolunidad">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Rol Unidad</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formRolUnidad" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarrolunidad">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="rol_unidad" class="control-label">Rol de la Unidad</label>
                                  <input type="text" class="form-control" id="rolunidad" placeholder="Rol de la Unidad" data-error="Proporcione Rol de la Unidad" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>                          
                          
                          </div>                                      

                      </div>

                  </form>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->      
    </section>

    <!-- /.content -->
  </div> 
  
</div>
<!-- ./wrapper -->

<script>    
     
    var idRolUnidadEdit = 0;    

    function clearform(){

        $('#formRolUnidad')[0].reset();
        $('#grabarrolunidad').html('Grabar');
        $('#titleform').html('Nuevo Rol Unidad');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verRolUnidad(idRolUnidad,cat_rol_unidades_nombre,cat_rol_unidades_status,cat_rol_unidades_fecharegistro,cat_rol_unidades_fechaactualiza){

           clearform();
           $('#grabarrolunidad').html('Editar');
           $('#titleform').html('Editar Rol Unidad');
           //$('#formUsuarios').validator('update');

           idRolUnidadEdit = idRolUnidad;

           $('#rolunidad').val(cat_rol_unidades_nombre);
    }

    function eliminarRolUnidad(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_RolUnidad/RolUnidad_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_RolUnidad/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

                    })
                    .done(function() {
                        //alert( "second success" );
                    })
                    .fail(function() {
                        //Message('messageAlertTable','Error!','Al actualizar datos...','7000','danger');
                    })
                    .always(function() {
                        //alert( "finished" );
                    }
              );

    }    

    function guardarDatos(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_RolUnidad/RolUnidad_Nuevo", 
                {            
                  idRolUnidad: idRolUnidadEdit,
                  rolunidad: $('#rolunidad').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idRolUnidadEdit = 0;
                          $('#formRolUnidad')[0].reset();
                          $('#titleform').html('Nueva Rol Unidad');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_RolUnidad/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Rol Unidad, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>