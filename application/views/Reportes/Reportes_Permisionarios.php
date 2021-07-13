<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="0">

<script>
    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {return window.btoa(unescape(encodeURIComponent(s)))}
            , format = function (s, c) {return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; })}
            return function (table, name, filename) {

                if (!table.nodeType) table = document.getElementById(table);
                    var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                document.getElementById("dlink").href = uri + base64(format(template, ctx));
                document.getElementById("dlink").download = filename;
                document.getElementById("dlink").click();
        }
    })()
</script>

<div class="box box-solid bg-teal-gradient">
</div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte Pagos Permisionarios
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reporte Pagos Permisionarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Reportes Lista de Pagos Permisionarios</h3>
            </div>            

            <div class="box-header">

               <table class="pull-left">
               <tr>
                   <td>                                   
                      <select id="permisionario_tabulador" name="permisionario_tabulador" aria-controls="permisionario_tabulador" class="form-control input-sm">
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

               <table class="pull-right">
                   <tr>                       
                       <td>
                          <a id="dlink"  style="display:none;"></a> <!--NECESARIO PARA EXPORTAR A .xls -->
                          <button type="button" class="btn btn-primary class-otros" style="margin-bottom:10px" onclick="$('.reportes_permisionarios_pagos').show();
    tableToExcel('tablaReporteTable','tablaReporteTable','tablaReporteTable');$('.reportes_permisionarios_pagos').hide();
    ">Exportar a Excel</button>
                          <button type="button" class="btn btn-primary class-otros" style="margin-bottom:10px" onclick="imprimirPDF();">Imprimir PDF</button>                      
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
                   </tr>
                   <tr>                                           
                      <td>
                          <div class="input-group margin">
                              <div class="form-group">
                                <label class="">                                  
                                  <input name="reporte_fecha" class="flat-red" checked="" style="position: absolute; opacity: 0;" value="vp.cat_vincularpermisionario_fechainicio" type="radio">
                                  Fecha Inicio
                                  <input name="reporte_fecha" class="flat-red" style="position: absolute; opacity: 0;" value="reg_pagospermisionarios_fechahora" type="radio">
                                  Pagos
                                </label>                                
                              </div>
                          </div>
                      </td>
                      <td>
                          <div class="input-group margin">                                  
                                  <input type="text" class="form-control" id="permisionario_fecha" placeholder="Fecha Inicio, Periodo Pago">                       
                          </div>
                      </td>
                      <td>
                          <div class="input-group margin">
                            <input type="text" name="vincular_permisionario" id="vincular_permisionario" class="form-control" placeholder="Permisionario" data-provide="typeahead" autocomplete="off">                                
                          </div>  
                       </td>
                       <td>
                          <div class="input-group margin">
                              <input type="text" name="vincular_unidad" id="vincular_unidad" class="form-control" placeholder="Unidad" data-provide="typeahead" autocomplete="off">
                        </div>  
                       </td>   
                       <td>
                         <div class="input-group margin">
                          <input type="text" name="vincular_operador" id="vincular_operador" class="form-control" placeholder="Operador" data-provide="typeahead" autocomplete="off">   </div> 
                       </td>
                       <td>
                          <div class="input-group margin">
                            <input type="text" name="vincular_placa" id="vincular_placa" class="form-control" placeholder="Placa" data-provide="typeahead" autocomplete="off">
                          </div>
                       </td>
                       <td>
                           <div class="input-group margin">
                             <button type="button" class="btn btn-block btn-primary" id="accionvincular" onclick="limpiarVincular()">Limpiar</button>              
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
            <div class="box-body table-responsive">
            
              <table class="table table-bordered table-striped" id="tablaReporteTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Permisionarios</th>
                    <th>Unidad</th>
                    <th>Operador</th>
                    <th>Placa</th>
                    <th>Periodo Pago</th>
                    <th>Fechas Inicio</th>           
                    <th>Cobro</th>
                    <th>Pagado</th>
                    <th>Acumulado</th>
                    <th>Deuda</th>
                    <th>Recargos</th>
                    <th>Ver</th> 
                </tr>
                </thead>
                <tbody id="tableReporte" style="font-size: 15px;">
                  <?php 

                   $PagosPermisionarios = $this->reportes_permisionarios_module->get_registros_pagospermisionarios('cat_vincularpermisionario',50);

                   if(!empty($PagosPermisionarios)){  

                      date_default_timezone_set('America/Tijuana');
                      $datetime2 = new DateTime(); 

                      $diasMes = 30;//date('t');//dias del Mes           

                      foreach($PagosPermisionarios as $rowReportesPermisionarios){

                        $banfiltro = true;

                        $datetime1 = new DateTime($rowReportesPermisionarios->cat_vincularpermisionario_fechainicio);                
                        $interval = $datetime1->diff($datetime2);

                        //validar los dias de condono /////////////////////////////////////////////
                        $intervalFecha = explode('-',$interval->format('%m-%d'));

                        $intervalMes = $intervalFecha[0];
                        $intervalDias = $intervalFecha[1];                            

                        if($intervalMes>0){///meses completos
                            $intervaloReal = 0;
                            $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;

                            if($rowReportesPermisionarios->cat_periodopago_periodo<1){//si es menor a un mes
                                $intervaloReal = (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));                                    
                            }

                            $intervaloReal += ((int)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));
                        }else{//dias, antes de un mes completo                                
                            $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;
                            $intervaloReal = ((float)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));                                

                            $intervaloReal  += (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));
                        }

                        //obtengo la parte fraccionaria del coeficiente//////////////
                        $fracc=explode('.',(string)$coeficiente); 
                        $numFracc = "0.".(isset($fracc[1])?$fracc[1]:"0");
                        /////////////////////////////////////////////////////////////

                        $diasSobrantes = (int)($numFracc*($diasMes*(float)$rowReportesPermisionarios->cat_periodopago_periodo));
                        
                        if(($diasSobrantes<=$rowReportesPermisionarios->cat_periodopago_diascondonados)){
                            $intervaloReal = $intervaloReal - 1;
                        }
                        ///////////////////////////////////////////////////////////////////////////

                        $pagoPrint = $pagoReal*(((int)$intervaloReal==0)?(((float)$rowReportesPermisionarios->cat_periodopago_periodo<=0.03)?1:$intervaloReal):$intervaloReal);
                        $deuda = (float)$pagoPrint - (float)$rowReportesPermisionarios->reg_pagospermisionarios_monto_cobro;
                        $recargos = $deuda * (float)$rowReportesPermisionarios->cat_cobros_porcentajedecimal;
                        $deudaPeriodo = $intervaloReal-$rowReportesPermisionarios->numreg;

                        echo "<tr>";
                        echo "<td>".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
                        echo "<td>".$rowReportesPermisionarios->cat_permisionario_nombre."</td>";
                        echo "<td>".$rowReportesPermisionarios->cat_unidades_numeconomico."</td>";
                        echo "<td>".$rowReportesPermisionarios->cat_operadores_nombre."</td>";
                        echo "<td>".$rowReportesPermisionarios->cat_placas_numero."</td>";
                        echo "<td>".$rowReportesPermisionarios->cat_periodopago_nombre."<br>Dias Condonados: ".$rowReportesPermisionarios->cat_periodopago_diascondonados."</td>";
                        echo "<td>Inicio: ".$rowReportesPermisionarios->cat_vincularpermisionario_fechainicio."<br>Transcurrido:<br> Meses: ".$intervalMes.", Dias:".$intervalDias."<br><br>Actual:".date("Y-m-d H:i:s", time())."</td>";                        
                        echo "<td>$".number_format($rowReportesPermisionarios->cat_cobros_nombre,2)."</td>";
                        echo "<td>$".number_format($rowReportesPermisionarios->pagorenta,2)." (".$rowReportesPermisionarios->numreg." Pagos) "."</td>";
                        echo "<td>$".number_format($pagoPrint,2)." (".$intervaloReal." ".$rowReportesPermisionarios->cat_periodopago_nombre.")</td>";
                        echo "<td>$".number_format($deuda,2)."</td>";
                        echo "<td>$".number_format($recargos,2)."</td>";
                        echo "<td><button class='btn-Primary' onclick='javascript:verPagosPermisionarios(\"".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\")' title='Ver Pagos Permisionario' type='button'><i class='fa fa-edit'></i></button></td></tr>";     

                        foreach(json_decode("[".$rowReportesPermisionarios->pagos."]",true) as $key=>$pago){
                              echo "<tr class=\"reportes_permisionarios_pagos pagos_permisionarios_".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\">";
                              echo "<td>".(isset($pago['consecutivo'])?$pago['consecutivo']:"")."</td>";                     
                              echo "<td>$".(is_numeric($pago['monto'])?number_format($pago['monto'],2):"")."</td>";
                              echo "<td>".(isset($pago['fecha'])?$pago['fecha']:"")."</td>";
                              echo "<td>".(isset($pago['tipo'])?$pago['tipo']:"")."</td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td>";
                              echo "<td></td></tr>";
                        }

                      }
                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Permisionarios</th>
                    <th>Unidad</th>
                    <th>Operador</th>
                    <th>Placa</th>
                    <th>Periodo Pago</th>
                    <th>Fechas</th>           
                    <th>Cobro</th>
                    <th>Pagado</th>
                    <th>Acumulado</th>
                    <th>Deuda</th>
                    <th>Recargos</th>
                    <th>Ver</th>  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-ver-pagospermisionarios">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="titleform">Lista de Pagos Permisionarios</h4>
                </div>

                <div id="messageAlertModal" class="" style="">

                </div>

                <form id="formPagosPermisionarios" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>               
                      </div>

                      <div class="box-body">

                          <div class="box-body table-responsive">
            
                            <table id="tablaModulo" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>Consecutivo</th>
                                  <th>Tipo Pago</th>
                                  <th>Monto Pago</th>
                                  <th>Fecha y Hora Pago</th>
                              </tr>
                              </thead>
                              <tbody style="font-size: 15px;" id="verPagosPermisionarios">

                                  

                              </tbody>
                              <tfoot>
                              <tr>
                                  <th>Consecutivo</th>
                                  <th>Tipo Pago</th>
                                  <th>Monto Pago</th>
                                  <th>Fecha y Hora Pago</th>  
                              </tr>
                              </tfoot>
                            </table> 
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
     
    var idPagosPermisionariosEdit = 0; 
    var idVincularPermisionarioEdit=0;
    var id_permisionario=0;
    var id_unidad=0;
    var id_operador=0;
    var id_placa=0;  

    function limpiarVincular(){

         idVincularPermisionarioEdit=0;
         id_permisionario=0;
         id_unidad=0;
         id_operador=0;
         id_placa=0;         

         $('#vincular_permisionario,#vincular_unidad,#vincular_operador,#vincular_placa,#vincular_fechainicio').val('');        
         $('#permisionario_fecha').val('');
         buscar();
         //$('.select2').val(null).trigger('change');
         //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }  

    function generarExcel(){

          //window.location=$("#baseUrl").val()+"Reportes_Permisionarios/Generar_Excel";
          window.open($("#baseUrl").val()+"Reportes_Permisionarios/Generar_Excel",'_blank');

    }

    function imprimirPDF(){

          window.open($("#baseUrl").val()+"Reportes_Permisionarios/ReportesPermisionarios_ImprimirPdf?id_permisionario="+id_permisionario+"&"+
                                                                                                     "id_unidad="+id_unidad+"&"+
                                                                                                     "id_operador="+id_operador+"&"+
                                                                                                     "id_placa="+id_placa+"&"+
                                                                                                     "permisionario_tabulador="+$('#permisionario_tabulador').val()+"&"+
                                                                                                     "reportes_permisionarioStatus="+reportes_permisionarioStatus+"&"+
                                                                                                     "reportes_permisionarioFechas="+reportes_permisionarioFechas+"&"+
                                                                                                     "permisionario_fecha="+$('#permisionario_fecha').val(),'_blank');
          
          //blockUI(true);
          /*var jqxhr = $.post
              (
                  $("#baseUrl").val()+"Reportes_Permisionarios/ReportesPermisionarios_ImprimirPdf", 
                  {            
                    idPermisionario: idPermisionario,
                  },                
                  function(html) {
                      //blockUI(false);
                      $("#verPagosPermisionarios").html(html);   

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
              );*/

    }

    function verPagosPermisionarios(idPermisionario){

          if($('.pagos_permisionarios_'+idPermisionario).is(':visible')){
                 $('.pagos_permisionarios_'+idPermisionario).hide();
          }else{
                 $('.pagos_permisionarios_'+idPermisionario).show();
          }    

          /*blockUI(true);
          var jqxhr = $.post
          (
              $("#baseUrl").val()+"Registros_PagosPermisionarios/PagosPermisionarios_VerPagos", 
              {            
                idPermisionario: idPermisionario,
              },                
              function(html) {
                  blockUI(false);
                  $("#verPagosPermisionarios").html(html);   

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
          );*/
    }    
    
    function buscar(){        
          blockUI(true);
          var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Reportes_Permisionarios/ReportesPermisionarios_Buscar", 
                    {           
                        id_permisionario: id_permisionario,
                        id_unidad: id_unidad,
                        id_operador: id_operador,
                        id_placa: id_placa,
                        reportes_permisionarioStatus: reportes_permisionarioStatus,
                        reportes_permisionarioFechas: reportes_permisionarioFechas,
                        permisionario_tabulador: $('#permisionario_tabulador').val(),                                    
                        permisionario_fecha: $('#permisionario_fecha').val()
                    },                
                    function(html) {
                        blockUI(false);
                        $('#tableReporte').html(html);
                        $('.reportes_permisionarios_pagos').hide();
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
           
</script>