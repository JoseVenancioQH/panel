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
        Permisionarios
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Permisionarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Permisionarios</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-permisionario" onclick="javascript:idPermisionarioEdit = 0;clearform();">Agregar Permisionario</button>                      
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
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Permisionarioes = $this->catalogos_permisionario_module->get_catalogos_permisionario(0);

                   if(!empty($Permisionarioes)){  

                      foreach($Permisionarioes as $rowPermisionarioes){                                                         

                        echo "<tr>";
                        echo "<td>".$rowPermisionarioes->cat_permisionario_id_permisionario."</td>";                     
                        echo "<td>".$rowPermisionarioes->cat_permisionario_nombre."</td>";
                        echo "<td>".$rowPermisionarioes->cat_permisionario_telefono."</td>";
                        echo "<td>".$rowPermisionarioes->cat_permisionario_direccion."</td>";                          
                        echo "<td>".(($rowPermisionarioes->cat_permisionario_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowPermisionarioes->cat_permisionario_fecharegistro."</b><br>Actuali.:<br><b>".$rowPermisionarioes->cat_permisionario_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verPermisionario(\"".$rowPermisionarioes->cat_permisionario_id_permisionario."\",\"".$rowPermisionarioes->cat_permisionario_nombre."\",\"".$rowPermisionarioes->cat_permisionario_telefono."\",\"".$rowPermisionarioes->cat_permisionario_direccion."\",\"".$rowPermisionarioes->cat_permisionario_status."\",\"".$rowPermisionarioes->cat_permisionario_fecharegistro."\",\"".$rowPermisionarioes->cat_permisionario_fechaactualiza."\")' title='Editar Permisionario' data-toggle='modal' data-target='#modal-agregar-permisionario' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowPermisionarioes->cat_permisionario_status==0)?"Success":"Danger")." ".(($rowPermisionarioes->cat_permisionario_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPermisionario(".$rowPermisionarioes->cat_permisionario_id_permisionario.",".(($rowPermisionarioes->cat_permisionario_status==0)?1:0).")' title='Editar Permisionario' type='button'><i class='fa fa-".(($rowPermisionarioes->cat_permisionario_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>                    
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
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

          <div class="modal fade" id="modal-agregar-permisionario">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Permisionario</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formPermisionario" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarpermisionario">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_permisionario" placeholder="Nombre Permisionario" data-error="Proporcione Nombre Permisionario" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Telefono</label>                                  
                                  <input type="text" class="form-control" id="telefono_permisionario" placeholder="Telefono Permisionario" data-error="Proporcione Telefono Permisionario" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_permisionario" placeholder="Direccion Permisionario" data-error="Proporcione Direccion Permisionario" required>
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
     
    var idPermisionarioEdit = 0;    

    function clearform(){

        $('#formPermisionario')[0].reset();
        $('#grabarpermisionario').html('Grabar');
        $('#titleform').html('Nuevo Permisionario');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verPermisionario(idPermisionario,cat_permisionario_nombre,cat_permisionario_telefono,cat_permisionario_direccion,cat_permisionario_status,cat_permisionario_fecharegistro,cat_permisionario_fechaactualiza){

           clearform();
           $('#grabarpermisionario').html('Editar');
           $('#titleform').html('Editar Permisionario');
           //$('#formUsuarios').validator('update');

           idPermisionarioEdit = idPermisionario;

           $('#nombre_permisionario').val(cat_permisionario_nombre);
           $('#telefono_permisionario').val(cat_permisionario_telefono);
           $('#direccion_permisionario').val(cat_permisionario_direccion);
    }

    function eliminarPermisionario(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Permisionario/Permisionario_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_Permisionario/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Permisionario/Permisionario_Nuevo", 
                {            
                  idPermisionario: idPermisionarioEdit,
                  permisionario: $('#permisionario').val(),
                  nombre_permisionario: $('#nombre_permisionario').val(),
                  telefono_permisionario: $('#telefono_permisionario').val(),
                  direccion_permisionario: $('#direccion_permisionario').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idPermisionarioEdit = 0;
                          $('#formPermisionario')[0].reset();
                          $('#titleform').html('Nueva Permisionario');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Permisionario/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Permisionario, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>