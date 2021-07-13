<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="0">

<div class="box box-solid bg-teal-gradient">
</div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="login-box-body" style="cursor:pointer; cursor: hand;">
      <a class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modal-ver-ayuda"><b >Ayuda</a>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pagos Permisionarios
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pagos Permisionarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Pagos Permisionarios</h3>
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
                             <button type="button" class="btn btn-block btn-primary" id="accionvincular" onclick="limpiarPagosPermisionarios()">Limpiar</button>              
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
            <div id="contenderTable"class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Permisionarios</th>
                    <th>Unidad/Oper.</th>
                    <!--<th>Operador</th>-->
                    <th>Placa</th>
                    <th>Periodo Pago</th>
                    <th>Fechas</th>           
                    <th>Cobro</th>
                    <th>Pagado</th>
                    <th>Acumulado</th>
                    <th>Deuda</th>
                    <th>Recargos</th>
                    <th>Ver</th>
                    <th>Pagar</th> 
                </tr>
                </thead>
                <tbody style="font-size: 15px;" id="tableReporte">
                  <?php 
                 
                     $PagosPermisionarios = $this->registros_pagospermisionarios_module->get_registros_pagospermisionarios('cat_vincularpermisionario',50);

                     if(!empty($PagosPermisionarios)){
                        date_default_timezone_set('America/Tijuana');
                        $datetime2 = new DateTime(); 

                        $diasMes = 30;//date('t');//dias del Mes

                        foreach($PagosPermisionarios as $rowPagosPermisionarios){
                          //var_dump($rowPagosPermisionarios->cat_vincularpermisionario_status);
                          //if($rowPagosPermisionarios->cat_vincularpermisionario_status){
                                    $banfiltro = true;

                                    $datetime1 = new DateTime($rowPagosPermisionarios->cat_vincularpermisionario_fechainicio);                
                                    $interval = $datetime1->diff($datetime2);

                                    //validar los dias de condono /////////////////////////////////////////////
                                    $intervalFecha = explode('-',$interval->format('%m-%d'));

                                    $intervalMes = $intervalFecha[0];
                                    $intervalDias = $intervalFecha[1];  

                                    //var_dump($intervalMes);

                                    if($intervalMes>0){///meses completos
                                        $intervaloReal = $coeficiente = 0;
                                        $pagoReal = (float)$rowPagosPermisionarios->cat_cobros_nombre*(float)$rowPagosPermisionarios->cat_periodopago_periodo;

                                        if($rowPagosPermisionarios->cat_periodopago_periodo<1){//si es menor a un mes
                                            $intervaloReal = (int)$coeficiente = ($intervalDias/($diasMes*$rowPagosPermisionarios->cat_periodopago_periodo));                                    
                                        }

                                        $intervaloReal += ((int)($intervalMes / $rowPagosPermisionarios->cat_periodopago_periodo));
                                    }else{//dias, antes de un mes completo                                
                                        $pagoReal = (float)$rowPagosPermisionarios->cat_cobros_nombre*(float)$rowPagosPermisionarios->cat_periodopago_periodo;
                                        $intervaloReal = ((float)($intervalMes / $rowPagosPermisionarios->cat_periodopago_periodo));                                

                                        $intervaloReal  += (int)$coeficiente = ($intervalDias/($diasMes*$rowPagosPermisionarios->cat_periodopago_periodo));
                                    }

                                    //obtengo la parte fraccionaria del coeficiente//////////////
                                    $fracc=explode('.',(string)$coeficiente);                             
                                    $numFracc = "0.".(isset($fracc[1])?$fracc[1]:"0");
                                    /////////////////////////////////////////////////////////////

                                    $diasSobrantes = (int)($numFracc*($diasMes*(float)$rowPagosPermisionarios->cat_periodopago_periodo));
                                    
                                    if(($diasSobrantes<=$rowPagosPermisionarios->cat_periodopago_diascondonados)){
                                        $intervaloReal = ($intervaloReal!=0)?$intervaloReal - 1:0;
                                    }
                                    ///////////////////////////////////////////////////////////////////////////

                                    $pagoPrint = $pagoReal*(((int)$intervaloReal==0)?(((float)$rowPagosPermisionarios->cat_periodopago_periodo<=0.03)?1:$intervaloReal):$intervaloReal);
                                    $deuda = (float)$pagoPrint - (float)$rowPagosPermisionarios->reg_pagospermisionarios_monto_cobro;
                                    $recargos = $deuda * (float)$rowPagosPermisionarios->cat_cobros_porcentajedecimal;
                                    $deudaPeriodo = $intervaloReal-$rowPagosPermisionarios->numreg;
                                    
                                    echo "<tr>";
                                    echo "<td>".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
                                    echo "<td>".$rowPagosPermisionarios->cat_permisionario_nombre."</td>";
                                    echo "<td>".$rowPagosPermisionarios->cat_unidades_numeconomico."<br>".$rowPagosPermisionarios->cat_operadores_nombre."</td>";
                                    //echo "<td>".$rowPagosPermisionarios->cat_operadores_nombre."</td>";
                                    echo "<td>".$rowPagosPermisionarios->cat_placas_numero."</td>";
                                    echo "<td>".$rowPagosPermisionarios->cat_periodopago_nombre."<br>Dias Condonados: ".$rowPagosPermisionarios->cat_periodopago_diascondonados."</td>";
                                    echo "<td>Inicio: ".$rowPagosPermisionarios->cat_vincularpermisionario_fechainicio."<br>Transcurrido:<br> Meses: ".$intervalMes.", Dias:".$intervalDias."<br><br>Actual:".date("Y-m-d H:i:s", time())."</td>";
                                    echo "<td>$".number_format($rowPagosPermisionarios->cat_cobros_nombre,2)."</td>";
                                    echo "<td>$".number_format($rowPagosPermisionarios->reg_pagospermisionarios_monto_cobro,2)." (".$rowPagosPermisionarios->numreg." Pagos) "."</td>";
                                    echo "<td>$".number_format($pagoPrint,2)." (".$intervaloReal." ".$rowPagosPermisionarios->cat_periodopago_nombre.")</td>";
                                    echo "<td>$".number_format($deuda,2)."</td>";
                                    echo "<td>$".number_format($recargos,2)."</td>";
                                    echo "<td><button class='btn-Primary' onclick='javascript:clearform();verPagosPermisionarios(\"".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\")' title='Ver Pagos Permisionario' data-toggle='modal' data-target='#modal-ver-pagospermisionarios' type='button'><i class='fa fa-edit'></i></button></td>";                        
                                    echo "<td width=\"20%\">
                                            <div class=\"input-group margin\">
                                              <input type=\"text\" name=\"guardar_abono_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" id=\"guardar_abono_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" class=\"form-control\" placeholder=\"Renta\" data-provide=\"typeahead\" autocomplete=\"off\">
                                              <input type=\"text\" name=\"guardar_recargos_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" id=\"guardar_recargos_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" class=\"form-control\" placeholder=\"Recargos\" data-provide=\"typeahead\" autocomplete=\"off\">
                                              <span class=\"input-group-btn\">
                                                  <button type=\"button\" class=\"btn btn-info btn-flat class-guardar\" data-toggle=\"modal\" data-target=\"#modal-agregar-abono\" onclick=\"guardarAbono(".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario.",".$recargos.",".$deuda.")\">+</button>
                                              </span>
                                            </div>
                                          </td></tr>";
                            //}

                         }
                     }                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Permisionarios</th>
                    <th>Unidad/Ope.</th>
                    <!--<th>Operador</th>-->
                    <th>Placa</th>
                    <th>Periodo Pago</th>
                    <th>Fechas</th>           
                    <th>Cobro</th>
                    <th>Pagado</th>
                    <th>Acumulado</th>
                    <th>Deuda</th>
                    <th>Recargos</th>
                    <th>Ver</th>                    
                    <th>Pagar</th>  
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

           <!-- /.modal -->    
          <div class="modal fade" id="modal-ver-ayuda">
            <div class="modal-dialog" style="width:95%;">
              <div class="modal-content" style="height:85%;">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Ayuda - Pagos Permisionario</h4>
                </div>

                <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Pagos%20Permisionario%20-%20Control%20Placas/Control%20PLacas%20-%20Pagos%20Permisionario.html"></iframe>

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

    function limpiarPagosPermisionarios(){

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

    function clearform(){

        $('#formPagosPermisionarios')[0].reset();
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }

    function buscar(){  

        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Registros_PagosPermisionarios/RegistrosPagosPermisionarios_Buscar", 
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
                    $('#contenderTable').html('<table id="tablaModulo" class="table table-bordered table-striped"><thead><tr><th>Id</th><th>Permisionarios</th><th>Unidad/Oper.</th><th>Placa</th><th>Periodo Pago</th><th>Fechas</th><th>Cobro</th><th>Pagado</th><th>Acumulado</th><th>Deuda</th><th>Recargos</th><th>Ver</th><th>Pagar</th></tr></thead><tbody style="font-size: 15px;" id="tableReporte">'+html+'</tbody><tfoot><tr><th></th><th>Permisionarios</th><th>Unidad/Oper.</th><th>Placa</th><th>Periodo Pago</th><th>Fechas</th><th>Cobro</th><th>Pagado</th><th>Acumulado</th><th>Deuda</th><th>Recargos</th><th>Ver</th><th>Pagar</th></tr></tfoot></table>');
                    dataTableRefresh();
                    $('.reportes_permisionarios_pagos').hide();
 
                    //dataTableRefresh();
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

    function verPagosPermisionarios(idPermisionario){

      blockUI(true);
      var jqxhr = $.post
          (
              $("#baseUrl").val()+"Registros_PagosPermisionarios/PagosPermisionarios_VerPagos", 
              {            
                idPermisionario: idPermisionario,
              },                
              function(html) {
                  blockUI(false);
                  $("#verPagosPermisionarios").html(html);
                  $("#tablaVer").html('<table id="tablaVer'+idPermisionario+'" class="table table-bordered table-striped"><thead><tr><th>Consecutivo</th><th>Tipo Pago</th><th>Monto Pago</th><th>Fecha y Hora Pago</th></tr></thead><tbody style="font-size: 15px;">'+html+'</tbody><tfoot><tr><th>Consecutivo</th><th>Tipo Pago</th><th>Monto Pago</th><th>Fecha y Hora Pago</th></tr></tfoot></table>');

                  $("#tablaVer"+idPermisionario).DataTable({
                        'paging'      : true,
                        'lengthChange': true,
                        'searching'   : true,
                        'ordering'    : false,
                        'info'        : true,
                        'autoWidth'   : true,
                        'iDisplayLength': 5,
                        "lengthMenu": [[5, 10, 25, 50, -1], [5,10, 25, 50, "All"]]
                  });
                  
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

                    window.location=$("#baseUrl").val()+"Registros_PagosPermisionarios/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                  

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