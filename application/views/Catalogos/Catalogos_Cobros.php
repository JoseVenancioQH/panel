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
        Cobros
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cobros</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Cobros</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-cobros" onclick="javascript:idCobrosEdit = 0;clearform();">Agregar Cobros</button>                      
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
                    <th>Costo por Mes</th>
                    <th>Porcentaje Recargo</th>
                    <th>Porcentaje Decimal Recargo</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Cobroses = $this->catalogos_cobros_module->get_catalogos_cobros(0);

                   if(!empty($Cobroses)){  

                      foreach($Cobroses as $rowCobroses){                                                         

                        echo "<tr>";
                        echo "<td>".$rowCobroses->cat_cobros_id_cobros."</td>";                     
                        echo "<td>".$rowCobroses->cat_cobros_nombre."</td>";
                        echo "<td>".$rowCobroses->cat_cobros_porcentaje."</td>";
                        echo "<td>".$rowCobroses->cat_cobros_porcentajedecimal."</td>";                          
                        echo "<td>".(($rowCobroses->cat_cobros_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowCobroses->cat_cobros_fecharegistro."</b><br>Actuali.:<br><b>".$rowCobroses->cat_cobros_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verCobros(\"".$rowCobroses->cat_cobros_id_cobros."\",\"".$rowCobroses->cat_cobros_nombre."\",\"".$rowCobroses->cat_cobros_porcentaje."\",\"".$rowCobroses->cat_cobros_porcentajedecimal."\",\"".$rowCobroses->cat_cobros_status."\",\"".$rowCobroses->cat_cobros_fecharegistro."\",\"".$rowCobroses->cat_cobros_fechaactualiza."\")' title='Editar Cobros' data-toggle='modal' data-target='#modal-agregar-cobros' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowCobroses->cat_cobros_status==0)?"Success":"Danger")." ".(($rowCobroses->cat_cobros_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarCobros(".$rowCobroses->cat_cobros_id_cobros.",".(($rowCobroses->cat_cobros_status==0)?1:0).")' title='Editar Cobros' type='button'><i class='fa fa-".(($rowCobroses->cat_cobros_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Costo por Mes</th>
                    <th>Porcentaje Recargo</th>
                    <th>Porcentaje Decimal Recargo</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-cobros">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Cobros</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formCobros" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarcobros">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="cobros_nombre" class="control-label">Costo por Mes</label>
                                  <input type="text" class="form-control" id="cobros_nombre" placeholder="Nombre del Cobro" data-error="Proporcione Nombre Cobro" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="cobros_porcentaje" class="control-label">Porcentaje Recargos</label>
                                  <input type="text" class="form-control" maxlength="4" onkeypress="javascript:isNumberKey(event);" onchange="$('#cobros_porcentajedecimal').val(this.value/100)" id="cobros_porcentaje" placeholder="Nombre porcentaje" data-error="Proporcione Porcentaje" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="cobros_porcentajedecimal" class="control-label">Porcentaje Decimal Recargos</label>
                                  <input type="text" class="form-control" id="cobros_porcentajedecimal" disabled="disabled" placeholder="Nombre Porcentaje Decimal" data-error="Proporcione Porcentaje Decimal" required>
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
    var idCobrosEdit = 0; 

    
    function clearform(){

        $('#formCobros')[0].reset();
        $('#grabarcobros').html('Grabar');
        $('#titleform').html('Nuevo Cobros');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verCobros(idCobros,cat_cobros_nombre,cat_cobros_porcentaje,cat_cobros_porcentajedecimal,cat_cobros_status,cat_cobros_fecharegistro,cat_cobros_fechaactualiza){

           clearform();
           $('#grabarcobros').html('Editar');
           $('#titleform').html('Editar Cobros');
           //$('#formUsuarios').validator('update');

           idCobrosEdit = idCobros;

           $('#cobros_nombre').val(cat_cobros_nombre);
           $('#cobros_porcentaje').val(cat_cobros_porcentaje);
           $('#cobros_porcentajedecimal').val(cat_cobros_porcentajedecimal);
    }

    function eliminarCobros(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Cobros/Cobros_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_Cobros/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Cobros/Cobros_Nuevo", 
                {            
                  idCobros: idCobrosEdit,
                  cobros_nombre: $('#cobros_nombre').val(),
                  cobros_porcentaje: $('#cobros_porcentaje').val(),
                  cobros_porcentajedecimal: $('#cobros_porcentajedecimal').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idCobrosEdit = 0;
                          $('#formCobros')[0].reset();
                          $('#titleform').html('Nueva Cobros');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Cobros/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Cobros, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>