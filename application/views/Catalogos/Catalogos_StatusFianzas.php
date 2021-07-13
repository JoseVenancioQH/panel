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
        Status Fianzas
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Status Fianzas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Status Fianzas</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-statusfianzas" onclick="javascript:idStatusFianzasEdit = 0;clearform();">Agregar StatusFianzas</button>                      
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

                   $StatusFianzases = $this->catalogos_statusfianzas_module->get_catalogos_statusfianzas(0);

                   if(!empty($StatusFianzases)){  

                      foreach($StatusFianzases as $rowStatusFianzases){                                                         

                        echo "<tr>";
                        echo "<td>".$rowStatusFianzases->cat_statusfianzas_id_statusfianzas."</td>";                     
                        echo "<td>".$rowStatusFianzases->cat_statusfianzas_nombre."</td>";                          
                        echo "<td>".(($rowStatusFianzases->cat_statusfianzas_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowStatusFianzases->cat_statusfianzas_fecharegistro."</b><br>Actuali.:<br><b>".$rowStatusFianzases->cat_statusfianzas_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verStatusFianzas(\"".$rowStatusFianzases->cat_statusfianzas_id_statusfianzas."\",\"".$rowStatusFianzases->cat_statusfianzas_nombre."\",\"".$rowStatusFianzases->cat_statusfianzas_status."\",\"".$rowStatusFianzases->cat_statusfianzas_fecharegistro."\",\"".$rowStatusFianzases->cat_statusfianzas_fechaactualiza."\")' title='Editar StatusFianzas' data-toggle='modal' data-target='#modal-agregar-statusfianzas' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowStatusFianzases->cat_statusfianzas_status==0)?"Success":"Danger")." ".(($rowStatusFianzases->cat_statusfianzas_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarStatusFianzas(".$rowStatusFianzases->cat_statusfianzas_id_statusfianzas.",".(($rowStatusFianzases->cat_statusfianzas_status==0)?1:0).")' title='Editar StatusFianzas' type='button'><i class='fa fa-".(($rowStatusFianzases->cat_statusfianzas_status==0)?"check":"close")."'></i></button>";
                        echo "<button class='btn-".(($rowStatusFianzases->cat_statusfianzas_llave==1)?"Success":"Danger")." ".(($rowStatusFianzases->cat_statusfianzas_llave==1)?"class-activar":"class-desactivar")."' onclick='asignarLlave(".$rowStatusFianzases->cat_statusfianzas_id_statusfianzas.",".(($rowStatusFianzases->cat_statusfianzas_llave==0)?1:0).")' title='Asignar Llave' type='button'><i class='fa fa-".(($rowStatusFianzases->cat_statusfianzas_status==0)?"close":"key")."'></i></button></td>";                        
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

          <div class="modal fade" id="modal-agregar-statusfianzas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva StatusFianzas</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formStatusFianzas" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarstatusfianzas">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="statusfianzas_nombre" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="statusfianzas_nombre" placeholder="Status Fianza" data-error="Proporcione Nombre Status Fianzas" required>
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
     
    var idStatusFianzasEdit = 0;    

    function clearform(){

        $('#formStatusFianzas')[0].reset();
        $('#grabarstatusfianzas').html('Grabar');
        $('#titleform').html('Nuevo StatusFianzas');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verStatusFianzas(idStatusFianzas,cat_statusfianzas_nombre,cat_statusfianzas_status,cat_statusfianzas_fecharegistro,cat_statusfianzas_fechaactualiza){

           clearform();
           $('#grabarstatusfianzas').html('Editar');
           $('#titleform').html('Editar StatusFianzas');
           //$('#formUsuarios').validator('update');

           idStatusFianzasEdit = idStatusFianzas;

           $('#statusfianzas_nombre').val(cat_statusfianzas_nombre);
    }

    function eliminarStatusFianzas(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_StatusFianzas/StatusFianzas_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_StatusFianzas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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

    function asignarLlave(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_StatusFianzas/StatusFianzas_AsignarLlave", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_StatusFianzas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_StatusFianzas/StatusFianzas_Nuevo", 
                {            
                  idStatusFianzas: idStatusFianzasEdit,
                  statusfianzas_nombre: $('#statusfianzas_nombre').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idStatusFianzasEdit = 0;
                          $('#formStatusFianzas')[0].reset();
                          $('#titleform').html('Nueva StatusFianzas');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_StatusFianzas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La StatusFianzas, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>