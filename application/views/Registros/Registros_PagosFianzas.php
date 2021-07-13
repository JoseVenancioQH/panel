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
        Pagos Fianzas
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pagos Fianzas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Pagos Fianzas</h3>
            </div>

            <div class="box-header">
             <table class="pull-left">
               <tr>
                   <td>                                   
                      <select id="fianza_tabulador" name="fianza_tabulador" aria-controls="fianza_tabulador" class="form-control input-sm">
                        <option value="">Todos</option>
                        <option value="2">2</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50"selected>50</option>
                        <option value="100">100</option>                          
                      </select>                            
                   </td>                     
                   <td>
                      de la Base de Datos
                   </td>                 
               </tr>
             </table>                             
            </div>

            <div class="box-header">
               <h3 class="box-title">Filtros de Busqueda</h3>                  
            </div>

            <div class="box-header">
               <table class="pull-right">
                   <tr>
                      <td>
                          <div class="input-group margin">
                              <div class="form-group">
                                <label class="">
                                  <input name="reporte_status" class="flat-red" checked="" style="position: absolute; opacity: 0;" value="" type="radio">
                                  Todos                                  
                                  <input name="reporte_status" class="flat-red" style="position: absolute; opacity: 0;" value="aldia" type="radio">
                                  Al dia
                                  <input name="reporte_status" class="flat-red" style="position: absolute; opacity: 0;" value="deudores" type="radio">
                                  Deudores
                                </label>                                
                              </div>
                          </div>
                      </td>                      
                      <td>
                          <div class="input-group margin">
                              <div class="form-group">
                                <label class="">                                  
                                  <input name="reporte_fecha" class="flat-red" checked="" style="position: absolute; opacity: 0;" value="vf.cat_vincularfianza_fecharegistro" type="radio">
                                  Fianza
                                  <input name="reporte_fecha" class="flat-red" style="position: absolute; opacity: 0;" value="pf.reg_pagosfianzas_fecharegistro" type="radio">
                                  Pagos
                                </label>                                
                              </div>
                          </div>
                      </td>
                      <td>                          
                          <div class="input-group margin">                              
                              <input type="text" class="form-control" id="fianza_fecha" placeholder="Rango Fecha - Fianza ó Pagos">
                          </div>
                      </td>
                      <td>
                          <div class="input-group margin">

                            <select id="liststatusfianza" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Status" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                          
                                <?php
                                  echo "<option value=\"0\">Seleccione Status Fianza...</option>";
                                  foreach($this->catalogos_vincularfianza_module->get_cat_catalogos('cat_statusfianzas') as $rowStatusFianza){
                                     echo "<option value=\"".$rowStatusFianza->cat_statusfianzas_id_statusfianzas."\">".$rowStatusFianza->cat_statusfianzas_nombre."</option>";  
                                  }                                      
                                ?>

                            </select>
                            
                          </div>  
                       </td>                          
                       <td>
                         <div class="input-group margin">
                          <input type="text" name="fianza_operador" id="fianza_operador" class="form-control" placeholder="Nombre Operador" data-provide="typeahead" autocomplete="off">   </div> 
                       </td>
                       <td>
                          <div class="input-group margin">
                            <input type="text" name="fianza_afectado" id="fianza_afectado" class="form-control" placeholder="Nombre Afectado" data-provide="typeahead" autocomplete="off">
                          </div>
                       </td>
                       <td>
                           <div class="input-group margin">
                             <button type="button" class="btn btn-block btn-primary" id="accionvincular" onclick="clearform()">Limpiar</button>              
                           </div>
                       </td>
                       <td>
                           <div class="input-group margin">
                             <button type="button" class="btn btn-block btn-primary" id="accionbuscar" onclick="buscar()">Buscar</button>              
                           </div>
                       </td>                                                              
                   </tr>
               </table>                  
            </div>

            <!-- /.box-header -->
            <div id="contenderTable" class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Convenio</th>
                    <th>Status Fianza</th>
                    <th>Monto Fianza</th>
                    <th>Fecha de Fianza</th>
                    <th>Operador Descuento</th>
                    <th>Nombre Afectado</th>
                    <th>Pagado</th>
                    <th>Deuda</th>
                    <th>Ver</th>
                    <th>Pagar</th> 
                </tr>
                </thead>
                <tbody style="font-size: 15px;" id="tableReporte">

                  <?php 

                   $PagosFianzas = $this->registros_pagosfianzas_module->get_registros_pagosfianzas('cat_vincularfianza');

                   if(!empty($PagosFianzas)){  

                      date_default_timezone_set('America/Tijuana');
                      $datetime2 = new DateTime();            

                      foreach($PagosFianzas as $rowPagosFianzas){                      

                          $deuda = (float)$rowPagosFianzas->cat_vincularfianza_montopactado - (float)$rowPagosFianzas->reg_pagosfianzas_monto_suma;                          
                          
                          echo "<tr>";
                          echo "<td>".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."</td>";                     
                          echo "<td>".$rowPagosFianzas->cat_vincularfianza_noconvenio."</td>";
                          echo "<td>".$rowPagosFianzas->cat_statusfianzas_nombre."</td>";
                          echo "<td>$".number_format($rowPagosFianzas->cat_vincularfianza_montopactado,2)."</td>";
                          echo "<td>".$rowPagosFianzas->cat_vincularfianza_fecha."</td>";
                          echo "<td>".$rowPagosFianzas->cat_operadores_nombre."</td>";
                          echo "<td>".$rowPagosFianzas->cat_vincularfianza_nombreafectado."</td>";                         
                          echo "<td>$".number_format($rowPagosFianzas->reg_pagosfianzas_monto_suma,2)." (".$rowPagosFianzas->numreg.") "."</td>";                          
                          echo "<td>$".number_format($deuda,2)."</td>";
                          echo "<td><button class='btn-Primary' onclick='javascript:clearform();verPagosFianzas(\"".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\")' title='Ver Pagos Fianza' data-toggle='modal' data-target='#modal-ver-pagosfianzas' type='button'><i class='fa fa-edit'></i></button></td>";                          
                          echo "<td>
                                  <div class=\"input-group margin\">
                                    <input type=\"text\" name=\"guardar_abono_".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\" id=\"guardar_abono_".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\" class=\"form-control\" placeholder=\"Monto\" data-provide=\"typeahead\" autocomplete=\"off\">
                                    <span class=\"input-group-btn\">
                                        <button type=\"button\" class=\"btn btn-info btn-flat class-guardar\" data-toggle=\"modal\" data-target=\"#modal-agregar-abono\" onclick=\"guardarAbono(".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza.",".$rowPagosFianzas->cat_vincularfianza_montopactado.",".$rowPagosFianzas->reg_pagosfianzas_monto_suma.",".$deuda.")\">+</button>
                                    </span>
                                  </div>
                                </td></tr>";                      

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Convenio</th>
                    <th>Status Fianza</th>
                    <th>Monto Fianza</th>
                    <th>Fecha de Fianza</th>
                    <th>Operador Descuento</th>
                    <th>Nombre Afectado</th>
                    <th>Pagado</th>
                    <th>Deuda</th>
                    <th>Ver</th>
                    <th>Pagar</th>  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-ver-pagosfianzas">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="titleform">Lista de Pagos Fianzas</h4>
                </div>

                <div id="messageAlertModal" class="" style="">

                </div>

                <form id="formPagosFianzas" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>               
                      </div>

                      <div class="box-body">

                          <div id="tablaVer" class="box-body table-responsive">
            
                             
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
      
    var id_operador = 0;

    function clearform(){            
       id_operador=0;

       $('#fianza_fecha,#liststatusfianza,#fianza_afectado,#fianza_operador').val('');
       $('#liststatusfianza').val('0')  
       buscar();
    }

    function verPagosFianzas(idFianza){

      blockUI(true);
      var jqxhr = $.post
          (
              $("#baseUrl").val()+"Registros_PagosFianzas/PagosFianzas_VerPagos", 
              {            
                idFianza: idFianza,
              },                
              function(html) {
                  blockUI(false);
                  //$("#verPagosFianzas").html(html);

                  $("#tablaVer").html('<table id="tablaVer'+idFianza+'" class="table table-bordered table-striped"><thead><tr><th>Consecutivo</th><th>Monto Pago</th><th>Fecha y Hora Pago</th></tr></thead><tbody style="font-size: 15px;">'+html+'</tbody><tfoot><tr><th>Consecutivo</th><th>Monto Pago</th><th>Fecha y Hora Pago</th></tr></tfoot></table>');

                  $("#tablaVer"+idFianza).DataTable({
                        'paging'      : true,
                        'lengthChange': true,
                        'searching'   : true,
                        'ordering'    : false,
                        'info'        : true,
                        'autoWidth'   : true,
                        'iDisplayLength': 5,
                        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
                  });
              })
              .done(function() {
                  //alert( "second success" );
              })
              .fail(function(html) {
                  Message('messageAlertModal','Alerta!','Imposible registrar La PagosFianzas, Existente, verifique...','7000','danger');        
                  //alert( "error" );
              })
              .always(function() {
                  //alert( "finished" );
              } 
          );

    }

    function buscar(){        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Registros_PagosFianzas/RegistrosPagosFianzas_Buscar", 
                {           
                    liststatusfianza: $('#liststatusfianza').val(),
                    id_operador: id_operador,
                    fianza_afectado: $('#fianza_afectado').val(),                                    
                    fianza_fecha: $('#fianza_fecha').val(),
                    fianza_tabulador: $('#fianza_tabulador').val(),
                    reportes_fianzasStatus: reportes_fianzasStatus,
                    reportes_fianzasFechas: reportes_fianzasFechas
                },                
                function(html) {
                    blockUI(false);
                    $('#tableReporte').html(html);   
                    $('#contenderTable').html('<table id="tablaModulo" class="table table-bordered table-striped"><thead><tr><th>Id</th><th>Convenio</th><th>Status Fianza</th><th>Monto Fianza</th><th>Fecha de Fianza</th><th>Operador Descuento</th><th>Nombre Afectado</th><th>Pagado</th><th>Deuda</th><th>Ver</th><th>Pagar</th></tr></thead><tbody style="font-size: 15px;" id="tableReporte">'+html+'</tbody><tfoot><tr><th>Id</th><th>Convenio</th><th>Status Fianza</th><th>Monto Fianza</th><th>Fecha de Fianza</th><th>Operador Descuento</th><th>Nombre Afectado</th><th>Pagado</th><th>Deuda</th><th>Ver</th><th>Pagar</th></tr></tfoot></table>');
                    dataTableRefresh(); 
                    
                    //$('.reportes_fianzas_pagos').hide();
                    //var messageError = JSON.parse(html);
                    //window.location=$("#baseUrl").val()+"Registros_Pagospermisionarios/index";
                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La PagosPermisionarios, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );
    }
    
    
    function guardarAbono(id,montopactado,montosuma,deuda){

        if($('#guardar_abono_'+id).val()=="" || parseInt($('#guardar_abono_'+id).val())==0){
            Message('messageAlertTable','Alerta!','Proporcione un monto de pago, verifique...','7000','danger');              
            ValidateControl('guardar_abono_'+id,"7000");
            return false;
        }

        if(parseFloat($('#guardar_abono_'+id).val())>parseFloat(deuda)){
            Message('messageAlertTable','Alerta!','Proporcione un monto de pago correcto, verifique...','7000','danger');              
            ValidateControl('guardar_abono_'+id,"7000");
            return false;
        }

        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Registros_PagosFianzas/PagosFianzas_Nuevo", 
                {            
                  idPagosFianzas: id,
                  monto: $('#guardar_abono_'+id).val()
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    window.location=$("#baseUrl").val()+"Registros_PagosFianzas/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                  

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La PagosFianzas, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>