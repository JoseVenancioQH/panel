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
        Zona Unidades
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Zona Unidades</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Zona Unidades</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-zonaunidad" onclick="javascript:clearform();">Agregar Zona Unidades</button>                      
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

                   $ZonaUnidades = $this->catalogos_zonaunidad_module->get_catalogos_zonaunidad(0);

                   if(!empty($ZonaUnidades)){  

                      foreach($ZonaUnidades as $rowZonaUnidades){                                                         

                        echo "<tr>";
                        echo "<td>".$rowZonaUnidades->cat_zonas_unidades_id_zona."</td>";                     
                        echo "<td>".$rowZonaUnidades->cat_zonas_unidades_nombre."</td>";                          
                        echo "<td>".(($rowZonaUnidades->cat_zonas_unidades_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowZonaUnidades->cat_zonas_unidades_fecharegistro."</b><br>Actuali.:<br><b>".$rowZonaUnidades->cat_zonas_unidades_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verZonaUnidad(\"".$rowZonaUnidades->cat_zonas_unidades_id_zona."\",\"".$rowZonaUnidades->cat_zonas_unidades_nombre."\",\"".$rowZonaUnidades->cat_zonas_unidades_status."\",\"".$rowZonaUnidades->cat_zonas_unidades_fecharegistro."\",\"".$rowZonaUnidades->cat_zonas_unidades_fechaactualiza."\")' title='Editar Zona Unidad' data-toggle='modal' data-target='#modal-agregar-zonaunidad' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowZonaUnidades->cat_zonas_unidades_status==0)?"Success":"Danger")." ".(($rowZonaUnidades->cat_zonas_unidades_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarZonaUnidad(".$rowZonaUnidades->cat_zonas_unidades_id_zona.",".(($rowZonaUnidades->cat_zonas_unidades_status==0)?1:0).")' title='Editar Zona Unidad' type='button'><i class='fa fa-".(($rowZonaUnidades->cat_zonas_unidades_status==0)?"check":"close")."'></i></button></td>";                        
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

          <div class="modal fade" id="modal-agregar-zonaunidad">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Zona Unidad</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formZonaUnidad" class="submitForm" data-toggle="validator" zonae="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarzonaunidad">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="zona_unidad" class="contzona-label">Zona de la Unidad</label>
                                  <input type="text" class="form-control" id="zonaunidad" placeholder="Zona de la Unidad" data-error="Proporcione Zona de la Unidad" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-contzona-feedback" aria-hidden="true"></span>                          
                              
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
     
    var idZonaUnidadEdit = 0;    

    function clearform(){

        $('#formZonaUnidad')[0].reset();
        $('#grabarzonaunidad').html('Grabar');
        $('#titleform').html('Nuevo Zona Unidad');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verZonaUnidad(idZonaUnidad,cat_zonas_unidades_nombre,cat_zonas_unidades_status,cat_zonas_unidades_fecharegistro,cat_zonas_unidades_fechaactualiza){

           clearform();
           $('#grabarzonaunidad').html('Editar');
           $('#titleform').html('Editar Zona Unidad');
           //$('#formUsuarios').validator('update');

           idZonaUnidadEdit = idZonaUnidad;

           $('#zonaunidad').val(cat_zonas_unidades_nombre);
    }

    function eliminarZonaUnidad(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_ZonaUnidad/ZonaUnidad_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_ZonaUnidad/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_ZonaUnidad/ZonaUnidad_Nuevo", 
                {            
                  idZonaUnidad: idZonaUnidadEdit,
                  zonaunidad: $('#zonaunidad').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idZonaUnidadEdit = 0;
                          $('#formZonaUnidad')[0].reset();
                          $('#titleform').html('Nueva Zona Unidad');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_ZonaUnidad/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Zona Unidad, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>