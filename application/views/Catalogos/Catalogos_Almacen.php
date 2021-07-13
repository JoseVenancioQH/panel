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
        Almacen
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Almacen</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Almacen</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-almacen" onclick="javascript:idAlmacenEdit = 0;clearform();">Agregar Almacen</button>                      
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

                   $Almacenes = $this->catalogos_almacen_module->get_catalogos_almacen(0);

                   if(!empty($Almacenes)){  

                      foreach($Almacenes as $rowAlmacenes){                                                         

                        echo "<tr>";
                        echo "<td>".$rowAlmacenes->cat_almacen_id_almacen."</td>";                     
                        echo "<td>".$rowAlmacenes->cat_almacen_nombre."</td>";                          
                        echo "<td>".(($rowAlmacenes->cat_almacen_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowAlmacenes->cat_almacen_fecharegistro."</b><br>Actuali.:<br><b>".$rowAlmacenes->cat_almacen_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verAlmacen(\"".$rowAlmacenes->cat_almacen_id_almacen."\",\"".$rowAlmacenes->cat_almacen_nombre."\",\"".$rowAlmacenes->cat_almacen_status."\",\"".$rowAlmacenes->cat_almacen_fecharegistro."\",\"".$rowAlmacenes->cat_almacen_fechaactualiza."\")' title='Editar Almacen' data-toggle='modal' data-target='#modal-agregar-almacen' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowAlmacenes->cat_almacen_status==0)?"Success":"Danger")." ".(($rowAlmacenes->cat_almacen_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarAlmacen(".$rowAlmacenes->cat_almacen_id_almacen.",".(($rowAlmacenes->cat_almacen_status==0)?1:0).")' title='Editar Almacen' type='button'><i class='fa fa-".(($rowAlmacenes->cat_almacen_status==0)?"check":"close")."'></i></button></td>";                        
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

          <div class="modal fade" id="modal-agregar-almacen">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Almacen</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formAlmacen" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabaralmacen">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Almacen</label>
                                  <input type="text" class="form-control" id="almacen" placeholder="Servicio de la Unidad" data-error="Proporcione Almacen" required>
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
     
    var idAlmacenEdit = 0;    

    function clearform(){

        $('#formAlmacen')[0].reset();
        $('#grabaralmacen').html('Grabar');
        $('#titleform').html('Nuevo Almacen');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verAlmacen(idAlmacen,cat_almacen_nombre,cat_almacen_status,cat_almacen_fecharegistro,cat_almacen_fechaactualiza){

           clearform();
           $('#grabaralmacen').html('Editar');
           $('#titleform').html('Editar Almacen');
           //$('#formUsuarios').validator('update');

           idAlmacenEdit = idAlmacen;

           $('#almacen').val(cat_almacen_nombre);
    }

    function eliminarAlmacen(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Almacen/Almacen_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false); 

                        window.location=$("#baseUrl").val()+"Catalogos_Almacen/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Almacen/Almacen_Nuevo", 
                {            
                  idAlmacen: idAlmacenEdit,
                  almacen: $('#almacen').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);

                    if(messageError.status!='fail'){
                          idAlmacenEdit = 0;
                          $('#formAlmacen')[0].reset();
                          $('#titleform').html('Nueva Almacen');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Almacen/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{


                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Almacen, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>