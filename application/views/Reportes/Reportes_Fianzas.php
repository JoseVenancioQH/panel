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
        Reportes Pagos Fianzas
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reportes Pagos Fianzas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Reportes Pagos Fianzas</h3>
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
             <table class="pull-right">
               <tr>
                   <td>
                      <a id="dlink"  style="display:none;"></a> <!--NECESARIO PARA EXPORTAR A .xls -->
                      <button type="button" class="btn btn-primary class-otros" style="margin-bottom:10px" onclick="$('.reportes_fianzas_pagos').show();
tableToExcel('tablaReporteTable','tablaReporteTable','tablaReporteTable');$('.reportes_fianzas_pagos').hide();
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
                             <button type="button" class="btn btn-block btn-primary" id="accionvincular" onclick="limpiarFianza()">Limpiar</button>              
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
            
              <table id="tablaReporteTable" class="table table-bordered table-striped">
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
                </tr>
                </thead>
                <tbody style="font-size: 15px;" id="tableReporte">

                  <?php 

                     $PagosFianzas = $this->reportes_fianzas_module->get_registros_pagosfianzas('cat_vincularfianza',50);

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
                            echo "<td>".$rowPagosFianzas->cat_vincularfianza_fecharegistro."</td>";
                            echo "<td>".$rowPagosFianzas->cat_operadores_nombre."</td>";
                            echo "<td>".$rowPagosFianzas->cat_vincularfianza_nombreafectado."</td>";                         
                            echo "<td>$".number_format($rowPagosFianzas->reg_pagosfianzas_monto_suma,2)." (".$rowPagosFianzas->numreg.") "."</td>";                          
                            echo "<td>$".number_format($deuda,2)."</td>";
                            echo "<td><button class='btn-Primary' onclick='javascript:verPagosFianzas(\"".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."\")' title='Ver Pagos Fianza' type='button'><i class='fa fa-edit'></i></button></td></tr>";       

                            foreach(json_decode("[".$rowPagosFianzas->pagos."]",true) as $key=>$pago){

                                echo "<tr class=\"reportes_fianzas_pagos pagos_fianzas_".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."\">";
                                echo "<td>".(isset($pago['consecutivo'])?$pago['consecutivo']:"")."</td>";                     
                                echo "<td>$".(is_numeric($pago['monto'])?number_format($pago['monto'],2):"")."</td>";
                                echo "<td>".(isset($pago['fecha'])?$pago['fecha']:"")."</td>";
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
                    <th>Convenio</th>
                    <th>Status Fianza</th>
                    <th>Monto Fianza</th>
                    <th>Fecha de Fianza</th>
                    <th>Operador Descuento</th>
                    <th>Nombre Afectado</th>
                    <th>Pagado</th>
                    <th>Deuda</th>
                    <th>Ver</th>  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

                
    </section>

    <!-- /.content -->
  </div> 
  
</div>
<!-- ./wrapper -->

<script>    
     
    var idPagosPermisionariosEdit = 0;
    var id_operador=0;    

    function limpiarFianza(){

         id_cliente=0;
         $('#fianza_afectado, #fianza_fecha, #fianza_operador').val('');
         $('#liststatusfianza').val('0');
         
         buscar();
    }

    function generarExcel(){

        //window.location=$("#baseUrl").val()+"Reportes_Permisionarios/Generar_Excel";
        window.open($("#baseUrl").val()+"Reportes_Fianzas/Generar_Excel",'_blank');

    }

    function imprimirPDF(){

      window.open($("#baseUrl").val()+"Reportes_Fianzas/ReportesFianzas_ImprimirPdf?liststatusfianza="+$('#liststatusfianza').val()+"&"+
                                                                                   "id_operador="+id_operador+"&"+
                                                                                   "fianza_afectado="+$('#fianza_afectado').val()+"&"+
                                                                                   "fianza_fecha="+$('#fianza_fecha').val()+"&"+
                                                                                   "reportes_fianzasStatus="+reportes_fianzasStatus+"&"+
                                                                                   "reportes_fianzasFechas="+reportes_fianzasFechas+"&"+
                                                                                   "fianza_tabulador="+$('#fianza_tabulador').val(),'_blank');


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

    function verPagosFianzas(idFianzas){
      if($('.pagos_fianzas_'+idFianzas).is(':visible')){
             $('.pagos_fianzas_'+idFianzas).hide();
      }else{
             $('.pagos_fianzas_'+idFianzas).show();
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
                $("#baseUrl").val()+"Reportes_Fianzas/ReportesFianzas_Buscar", 
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
                    $('.reportes_fianzas_pagos').hide();
                    
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
    
    
    function guardarAbono(id,recargos,deuda){

        if($('#guardar_abono_'+id).val()==""){
            Message('messageAlertTable','Alerta!','Proporcione el monto de los recargos, verifique...','7000','danger');              
            ValidateControl("guardar_abono_"+id,"7000");
            return false;
        }

        if($('#guardar_recargos_'+id).val()==""){
            Message('messageAlertTable','Alerta!','Proporcione el monto de los recargos, verifique...','7000','danger');              
            ValidateControl("guardar_recargos_"+id,"7000");
            return false;
        }

        if(parseFloat(deuda)<parseFloat($('#guardar_abono_'+id).val())){
            Message('messageAlertTable','Alerta!','Proporcione el monto de los recargos, verifique...','7000','danger');              
            ValidateControl("guardar_recargos_"+id,"7000");
            return false;
        }

        if(parseFloat(recargos)<parseFloat($('#guardar_recargos_'+id).val())){
            Message('messageAlertTable','Alerta!','Proporcione el monto de los recargos, verifique...','7000','danger');              
            ValidateControl("guardar_recargos_"+id,"7000");
            return false;
        }

        
        if(parseFloat(recargos)==parseFloat(0)){
            Message('messageAlertTable','Alerta!','Proporcione el monto de los recargos, verifique...','7000','danger');              
            ValidateControl("guardar_recargos_"+id,"7000");
            return false;
        }       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Registros_PagosPermisionarios/PagosPermisionarios_Nuevo", 
                {            
                  idPagosPermisionarios: id,
                  monto: $('#guardar_abono_'+id).val(),
                  recargos: $('#guardar_recargos_'+id).val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    window.location=$("#baseUrl").val()+"Registros_Pagospermisionarios/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                  

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