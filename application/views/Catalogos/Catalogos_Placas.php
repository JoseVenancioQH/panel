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
        Placas
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Placas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Placas</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-placas" onclick="javascript:idPlacasEdit = 0;clearform();">Agregar Placas</button>                      
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
                    <th>Numero</th>
                    <!--<th>Periodo Pago</th>-->
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Placases = $this->catalogos_placas_module->get_catalogos_placas(0);

                   if(!empty($Placases)){  

                      foreach($Placases as $rowPlacases){                                                         

                        echo "<tr>";
                        echo "<td>".$rowPlacases->cat_placas_id_placas."</td>";                     
                        echo "<td>".$rowPlacases->cat_placas_numero."</td>";
                        //echo "<td>".$rowPlacases->cat_periodopago_nombre."</td>";                          
                        echo "<td>".(($rowPlacases->cat_placas_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowPlacases->cat_placas_fecharegistro."</b><br>Actuali.:<br><b>".$rowPlacases->cat_placas_fechaactualiza."</b></td>";               
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verPlacas(\"".$rowPlacases->cat_placas_id_placas."\",\"".$rowPlacases->cat_placas_numero."\",\""./*$rowPlacases->cat_periodopago_id_periodopago."\",\"".*/$rowPlacases->cat_placas_status."\",\"".$rowPlacases->cat_placas_fecharegistro."\",\"".$rowPlacases->cat_placas_fechaactualiza."\")' title='Editar Placas' data-toggle='modal' data-target='#modal-agregar-placas' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowPlacases->cat_placas_status==0)?"Success":"Danger")." ".(($rowPlacases->cat_placas_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPlacas(".$rowPlacases->cat_placas_id_placas.",".(($rowPlacases->cat_placas_status==0)?1:0).")' title='Editar Placas' type='button'><i class='fa fa-".(($rowPlacases->cat_placas_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Numero</th>
                    <!--<th>Periodo Pago</th>-->
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

          <div class="modal fade" id="modal-agregar-placas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Placas</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formPlacas" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarplacas">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Placas</label>
                                  <input type="text" class="form-control" id="placas" placeholder="Servicio de la Unidad" data-error="Proporcione Placas" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <!--<div class="form-group col-xs-6 has-feedback">

                                  <label for="Periodo Pago" class="control-label">Periodo Pago</label>
                                  <select id="listperiodopago" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Periodo Pago" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Periodo Pago...</option>";

                                    <?php
                                      /*foreach($this->catalogos_placas_module->get_cat_catalogos('cat_periodopago') as $rowPeriodoPago){

                                         echo "<option value=\"".$rowPeriodoPago->cat_periodopago_id_periodopago."\">".$rowPeriodoPago->cat_periodopago_nombre."</option>";    
                                      }*/                                     
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Periodo Pago</div>                            
                              
                              </div>-->

                              
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
     
    var idPlacasEdit = 0;    

    function clearform(){

        $('#formPlacas')[0].reset();
        $('#grabarplacas').html('Grabar');
        $('#titleform').html('Nuevo Placas');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verPlacas(idPlacas,cat_placas_nombre,cat_placas_status,cat_placas_fecharegistro,cat_placas_fechaactualiza){

           clearform();
           $('#grabarplacas').html('Editar');
           $('#titleform').html('Editar Placas');
           //$('#formUsuarios').validator('update');

           idPlacasEdit = idPlacas;

           $('#placas').val(cat_placas_nombre);
           //$('#listperiodopago').val(cat_periodopago_id_periodopago).trigger('change');
    }

    function eliminarPlacas(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Placas/Placas_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_Placas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Placas/Placas_Nuevo", 
                {            
                  idPlacas: idPlacasEdit,
                  placas: $('#placas').val(),
                  periodopago_placas: $('#listperiodopago').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idPlacasEdit = 0;
                          $('#formPlacas')[0].reset();
                          $('#titleform').html('Nueva Placas');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Placas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Placas, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>