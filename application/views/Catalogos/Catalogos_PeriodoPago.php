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
        Periodo Pagos
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Periodo Pagos</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Periodo Pagos</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-periodopago" onclick="javascript:idPeriodoPagoEdit = 0;clearform();">Agregar Periodo Pagos</button>                      
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
                    <th>Periodo (Mes)</th>
                    <th>Dias Condonados / al Corte</th>
                    <th>Fecha Inicio</th>
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $PeriodoPagoes = $this->catalogos_periodopago_module->get_catalogos_periodopago(0);

                   if(!empty($PeriodoPagoes)){  

                      foreach($PeriodoPagoes as $rowPeriodoPagoes){                                                         

                        echo "<tr>";
                        echo "<td>".$rowPeriodoPagoes->cat_periodopago_id_periodopago."</td>";                     
                        echo "<td>".$rowPeriodoPagoes->cat_periodopago_nombre."</td>";
                        echo "<td>".$rowPeriodoPagoes->cat_periodopago_periodo."</td>";
                        echo "<td>".$rowPeriodoPagoes->cat_periodopago_diascondonados."</td>";
                        echo "<td>".$rowPeriodoPagoes->cat_periodopago_fechainicio."</td>";                          
                        echo "<td>".(($rowPeriodoPagoes->cat_periodopago_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowPeriodoPagoes->cat_periodopago_fecharegistro."</b><br>Actuali.:<br><b>".$rowPeriodoPagoes->cat_periodopago_fechaactualiza."</b></td>";
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verPeriodoPago(\"".$rowPeriodoPagoes->cat_periodopago_id_periodopago."\",\"".$rowPeriodoPagoes->cat_periodopago_nombre."\",\"".$rowPeriodoPagoes->cat_periodopago_periodo."\",\"".$rowPeriodoPagoes->cat_periodopago_diascondonados."\",\"".$rowPeriodoPagoes->cat_periodopago_fechainicio."\",\"".$rowPeriodoPagoes->cat_periodopago_status."\",\"".$rowPeriodoPagoes->cat_periodopago_fecharegistro."\",\"".$rowPeriodoPagoes->cat_periodopago_fechaactualiza."\")' title='Editar PeriodoPago' data-toggle='modal' data-target='#modal-agregar-periodopago' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowPeriodoPagoes->cat_periodopago_status==0)?"Success":"Danger")." ".(($rowPeriodoPagoes->cat_periodopago_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPeriodoPago(".$rowPeriodoPagoes->cat_periodopago_id_periodopago.",".(($rowPeriodoPagoes->cat_periodopago_status==0)?1:0).")' title='Editar PeriodoPago' type='button'><i class='fa fa-".(($rowPeriodoPagoes->cat_periodopago_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Periodo  (Mes)</th>
                    <th>Dias Condonados / al Corte</th>
                    <th>Fecha Inicio</th>
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

          <div class="modal fade" id="modal-agregar-periodopago">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva PeriodoPago</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formPeriodoPago" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right class-guardar" id="grabarperiodopago">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="periodo_pago_nombre" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="periodopago_nombre" placeholder="Periodo Pago" data-error="Proporcione PeriodoPago" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>                                               

                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="periodopago_fecha" class="control-label">Fecha Inicio</label>
                                  <input type="text" class="form-control" id="periodopago_fechainicio" placeholder="Fecha Inicio, Periodo Pago" data-error="Proporcione Fecha Inicio Periodo Pago" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                                                    
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="periodopago_dias" class="control-label">Periodos (Bimestral = 2, Quincenal = 0.5, Semanal = 0.25, Diario = 0.03333)</label>
                                  <input type="text" class="form-control" id="periodopago_dias" placeholder="Periodo Pago, Cobro al Mes" data-error="Proporcione Periodo de Cobro al Mes" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>                      

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="periodopago_diascondonados" class="control-label">Dias Condonados</label>
                                  <input type="text" class="form-control" id="periodopago_diascondonados" placeholder="Periodo pago, Dias Condonados" data-error="Proporcione Dias Condonados" required>
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
     
    var idPeriodoPagoEdit = 0;    

    function clearform(){
          $('#formPeriodoPago')[0].reset();
          $('#grabarperiodopago').html('Grabar');
          $('#titleform').html('Nuevo PeriodoPago');
          //$('.select2').val(null).trigger('change');
          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
    }
    
    function verPeriodoPago(idPeriodoPago,cat_periodopago_nombre,cat_periodopago_periodo,cat_periodopago_diascondonados,cat_periodopago_fechainicio,cat_periodopago_status,cat_periodopago_fecharegistro,cat_periodopago_fechaactualiza){

           clearform();
           $('#grabarperiodopago').html('Editar');
           $('#titleform').html('Editar PeriodoPago');
           //$('#formUsuarios').validator('update');

           idPeriodoPagoEdit = idPeriodoPago;

           $('#periodopago_nombre').val(cat_periodopago_nombre);
           $('#periodopago_dias').val(cat_periodopago_periodo);
           $('#periodopago_fechainicio').val(cat_periodopago_fechainicio);
           $('#periodopago_diascondonados').val(cat_periodopago_diascondonados);
    }

    function eliminarPeriodoPago(id,status){     
        blockUI(true);
        var jqxhr = $.post
            (
              $("#baseUrl").val()+"Catalogos_PeriodoPago/PeriodoPago_Eliminar", 
              { 
                  id: id,
                  status: status
              },
              function() {

                  blockUI(false);                      

                  window.location=$("#baseUrl").val()+"Catalogos_PeriodoPago/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
        //alert($('#periodopago_fechainicio').val());
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_PeriodoPago/PeriodoPago_Nuevo", 
                {  
                  idPeriodoPago: idPeriodoPagoEdit,
                  periodopago_nombre: $('#periodopago_nombre').val(),
                  periodopago_fechainicio: $('#periodopago_fechainicio').val(),
                  periodopago_periodo: $('#periodopago_dias').val(),
                  periodopago_diascondonados: $('#periodopago_diascondonados').val()
                },                
                function(html) {

                    blockUI(false);
                    var messageError = JSON.parse(html);
                    if(messageError.status!='fail'){

                          idPeriodoPagoEdit = 0;
                          $('#formPeriodoPago')[0].reset();
                          $('#titleform').html('Nueva PeriodoPago');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_PeriodoPago/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();

                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La PeriodoPago, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>