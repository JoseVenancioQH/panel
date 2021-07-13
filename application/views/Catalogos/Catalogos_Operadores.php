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
        Operadores
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Operadores</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Operadores</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-operadores" onclick="javascript:idOperadoresEdit = 0;clearform();">Agregar Operadores</button>                      
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
                    <th>Zona</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Operadores = $this->catalogos_operadores_module->get_catalogos_operadores(0);

                   if(!empty($Operadores)){  

                      foreach($Operadores as $rowOperadores){                                                         

                        echo "<tr>";
                        echo "<td>".$rowOperadores->cat_operadores_id_operadores."</td>";                     
                        echo "<td>".$rowOperadores->cat_operadores_nombre."</td>";
                        echo "<td>".$rowOperadores->cat_operadores_telefono."</td>";
                        echo "<td>".$rowOperadores->cat_operadores_direccion."</td>";
                        echo "<td>".$rowOperadores->cat_zonas_unidades_nombre."</td>";                          
                        echo "<td>".(($rowOperadores->cat_operadores_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowOperadores->cat_operadores_fecharegistro."</b><br>Actuali.:<br><b>".$rowOperadores->cat_operadores_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verOperadores(\"".$rowOperadores->cat_operadores_id_operadores."\",\"".$rowOperadores->cat_operadores_nombre."\",\"".$rowOperadores->cat_operadores_telefono."\",\"".$rowOperadores->cat_operadores_direccion."\",\"".$rowOperadores->cat_operadores_id_zona."\",\"".$rowOperadores->cat_operadores_status."\",\"".$rowOperadores->cat_operadores_fecharegistro."\",\"".$rowOperadores->cat_operadores_fechaactualiza."\")' title='Editar Operadores' data-toggle='modal' data-target='#modal-agregar-operadores' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowOperadores->cat_operadores_status==0)?"Success":"Danger")." ".(($rowOperadores->cat_operadores_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarOperadores(".$rowOperadores->cat_operadores_id_operadores.",".(($rowOperadores->cat_operadores_status==0)?1:0).")' title='Editar Operadores' type='button'><i class='fa fa-".(($rowOperadores->cat_operadores_status==0)?"check":"close")."'></i></button></td>";                        
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
                    <th>Zona</th>
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

          <div class="modal fade" id="modal-agregar-operadores">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Operador</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formOperadores" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabaroperadores">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="nombre_operadores" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_operadores" placeholder="Nombre Operadores" data-error="Proporcione Nombre Operador" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="telefono_operadores" class="control-label">Telefono</label>                                  
                                  <input type="text" class="form-control" id="telefono_operadores" placeholder="Telefono Operadores" data-error="Proporcione Telefono Operadores" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="direccion_operadores" class="control-label">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_operadores" placeholder="Direccion Operadores" data-error="Proporcione Direccion Operadores" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="Zona Unidad" class="control-label">Zona</label>
                                  <select id="listzona" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Zona" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Zona...</option>";

                                    <?php
                                      foreach($this->catalogos_operadores_module->get_cat_catalogos('cat_zonas_unidades') as $rowZonas){
                                         echo "<option value=\"".$rowZonas->cat_zonas_unidades_id_zona."\">".$rowZonas->cat_zonas_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Zona</div>                          
                              
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
     
    var idOperadoresEdit = 0;    

    function clearform(){

        $('#formOperadores')[0].reset();
        $('#grabaroperadores').html('Grabar');
        $('#titleform').html('Nuevo Operadores');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verOperadores(idOperadores,cat_operadores_nombre,cat_operadores_telefono,cat_operadores_direccion,cat_operadores_id_zona,cat_operadores_status,cat_operadores_fecharegistro,cat_operadores_fechaactualiza){

           clearform();
           $('#grabaroperadores').html('Editar');
           $('#titleform').html('Editar Operadores');
           //$('#formUsuarios').validator('update');

           idOperadoresEdit = idOperadores;

           $('#nombre_operadores').val(cat_operadores_nombre);
           $('#telefono_operadores').val(cat_operadores_telefono);
           $('#direccion_operadores').val(cat_operadores_direccion);
           $('#listzona').val(cat_operadores_id_zona).trigger('change');
           
    }

    function eliminarOperadores(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Operadores/Operadores_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_Operadores/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Operadores/Operadores_Nuevo", 
                {            
                  idOperadores: idOperadoresEdit,
                  operadores: $('#operadores').val(),
                  nombre_operadores: $('#nombre_operadores').val(),
                  telefono_operadores: $('#telefono_operadores').val(),
                  direccion_operadores: $('#direccion_operadores').val(),
                  zona_operadores: $('#listzona').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idOperadoresEdit = 0;
                          $('#formOperadores')[0].reset();
                          $('#titleform').html('Nueva Operadores');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Operadores/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar Operador, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>