<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="0">

<style>
    .loading {    
        background-color: #ffffff;        
        background-image: url("../img/loading.gif");
        background-size: 20px 20px;
        background-position:right center;
        background-repeat: no-repeat;
    }
</style>

<div class="box box-solid bg-teal-gradient">
</div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vincular Fianza
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Vincular Fianzas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Vincular Fianzas</h3>
            </div>

            <div class="box-header">

              <table class="pull-left">
               <tr>
                   <td>                                   
                      <select id="vincularfianza_tabulador" name="vincularfianza_tabulador" aria-controls="vincularfianza_tabulador" class="form-control input-sm">
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

            <div class="box-body">

            <table class="table table-bordered table-striped">
                <thead>                
                  <tr>
                      <th>
                      </th>                    
                      <th>                      
                          <div class="input-group margin">
                            <input type="text" name="vincular_convenio" id="vincular_convenio" class="form-control" placeholder="Convenio">                                
                          </div>                           
                      </th>
                      <th>                          
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
                      </th>
                      <th>
                          <div class="input-group margin">
                            <input type="text" name="vincular_monto" id="vincular_monto" class="form-control" placeholder="Monto Fianza">
                                
                          </div>                                          
                      </th>
                      <th>
                          <div class="input-group margin">
                            <input type="text" class="form-control" id="vincular_fechafianza" placeholder="Fecha Fianza">
                          </div>                                      
                      </th>           
                      <th>
                          <div class="input-group margin">
                            <input type="text" name="vincular_operador" id="vincular_operador" class="form-control" placeholder="Operador" data-provide="typeahead" autocomplete="off">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-operadores' onclick="javascript:formGlobal='operador'">+</button>
                                </span>
                          </div>                                          
                      </th>
                      <th>
                          <div class="input-group margin">
                            <input type="text" name="vincular_nomafectado" id="vincular_nomafectado" class="form-control" placeholder="Afectado">                    
                          </div>                                          
                      </th>
                      <th>
                                                                    
                      </th>
                      <th>
                                                                    
                      </th>         
                      <th>
                        <div class="input-group margin">
                          <button type="button" class="btn btn-block btn-success class-guardar" id="accionguardar" onclick="guardarVincular()">Guardar</button>              
                        </div>
                      </th>
                      <th>
                        <div class="input-group margin">
                          <button type="button" class="btn btn-block btn-primary" id="accionlimpiar" onclick="javascript:idVincularFianzaEdit = 0;limpiarVincular()">Limpiar</button>              
                        </div>
                      </th>
                      <th>
                        <div class="input-group margin">
                          <button type="button" class="btn btn-block btn-primary" id="accionbuscar" onclick="buscar()">Buscar</button>              
                        </div>
                      </th>
                  </tr>
                  <tr>                      
                  </tr>
                </thead>
                <tbody style="font-size: 15px;">
                                  
                </tbody>
                <tfoot>
                
                </tfoot>
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
                    <th>(Persona) Descuento Fianza</th>
                    <th>Nombre Afectado (s)</th>
                    <th>Evidencia</th>           
                    <th>Status</th>                    
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;" id="vincularfianza_tabla">
                  <?php 

                     $VincularFianzaes = $this->catalogos_vincularfianza_module->get_catalogos_vincularfianza('cat_vincularfianza',50);

                     if(!empty($VincularFianzaes)){  

                        foreach($VincularFianzaes as $rowVincularFianzaes){                                                         

                            echo "<tr>";
                            echo "<td>".$rowVincularFianzaes->cat_vincularfianza_id_vincularfianza."</td>";                     
                            echo "<td>".$rowVincularFianzaes->cat_vincularfianza_noconvenio."</td>";
                            echo "<td>".$rowVincularFianzaes->cat_statusfianzas_nombre."</td>";
                            echo "<td>$".number_format($rowVincularFianzaes->cat_vincularfianza_montopactado,2)."</td>";
                            echo "<td>".$rowVincularFianzaes->cat_vincularfianza_fecha."</td>";
                            echo "<td>".$rowVincularFianzaes->cat_operadores_nombre."</td>";
                            echo "<td>".$rowVincularFianzaes->cat_vincularfianza_nombreafectado."</td>";                                                        
                            echo "<td><button id='button_evidencia' data-toggle='modal' data-target='#modal-evidencias' onclick='javascript:setidevidencia(".$rowVincularFianzaes->cat_vincularfianza_id_vincularfianza.");' class='btn-Success' title='Subir Evidencias' type='button'><i class='fa fa-cloud-upload'></i></button></td></td>";                                                  
                            echo "<td>".(($rowVincularFianzaes->cat_vincularfianza_status==1)?'Activo':'Inactivo')."</td>";                
                            echo "<td> Registro:<br><b>".$rowVincularFianzaes->cat_vincularfianza_fecharegistro."</b><br>Actuali.:<br><b>".$rowVincularFianzaes->cat_vincularfianza_fechaactualiza."</b></td>";                    
                            echo "<td><button class='btn-Primary class-editar' onclick='javascript:limpiarVincular();verVincularFianza(\"".$rowVincularFianzaes->cat_vincularfianza_id_vincularfianza."\",\"".$rowVincularFianzaes->cat_vincularfianza_noconvenio."\",\"".$rowVincularFianzaes->cat_statusfianzas_id_statusfianzas."\",\"".$rowVincularFianzaes->cat_vincularfianza_montopactado."\",\"".$rowVincularFianzaes->cat_vincularfianza_fecha."\",\"".$rowVincularFianzaes->cat_operadores_id_operadores."\",\"".$rowVincularFianzaes->cat_operadores_nombre."\",\"".$rowVincularFianzaes->cat_vincularfianza_nombreafectado."\",\"".$rowVincularFianzaes->cat_vincularfianza_evidencia."\")' title='Editar VincularFianza' type='button'><i class='fa fa-edit'></i></button>";
                            echo "<button class='btn-".(($rowVincularFianzaes->cat_vincularfianza_status==0)?"Success":"Danger")." ".(($rowVincularFianzaes->cat_vincularfianza_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarVincularFianza(".$rowVincularFianzaes->cat_vincularfianza_id_vincularfianza.",".(($rowVincularFianzaes->cat_vincularfianza_status==0)?1:0).")' title='Editar VincularFianza' type='button'><i class='fa fa-".(($rowVincularFianzaes->cat_vincularfianza_status==0)?"check":"close")."'></i></button></td>";                        
                            echo "</tr>";

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
                    <th>(Persona) Descuento Fianza</th>
                    <th>Nombre Afectado (s)</th>
                    <th>Evidencia</th>           
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

         

          <!-- /.operadores -->

          <div class="modal fade" id="modal-agregar-operadores">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Operador</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formOperadores" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabaroperadores">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="nombre_operadores" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_operadores" placeholder="Nombre Operador" data-error="Proporcione Nombre Operador" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="telefono_operadores" class="control-label">Telefono</label>                                  
                                  <input type="text" class="form-control" id="telefono_operadores" placeholder="Telefono Operador" data-error="Proporcione Telefono Operador" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                                <div class="form-group col-xs-6 has-feedback">

                                      <label for="direccion_operadores" class="control-label">Dirección</label>
                                      <input type="text" class="form-control" id="direccion_operadores" placeholder="Direccion Operador" data-error="Proporcione Direccion Operador" required>
                                      <div class="help-block with-errors"></div>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                                
                                </div>

                                <div class="form-group col-xs-6 has-feedback">

                                      <label for="Zona Unidad" class="control-label">Zona</label>
                                      <select id="listzona" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Zona" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Seleccione Zona...</option>";

                                        <?php
                                            foreach($this->catalogos_operadores_module->get_cat_catalogos('cat_zonas_unidades') as $rowZonas){
                                               echo "<option value=\"".$rowZonas->cat_zonas_unidades_id_zona."\">".$rowZonas->cat_zonas_unidades_nombre."</option>";                     
                                            }                                      
                                        ?>

                                      </select>                              
                                      <div class="help-block">Seleccione Zona</div>                          
                                
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



          <!-- /.modal -->    
          <div class="modal fade " id="modal-evidencias">
            <div class="modal-dialog" style="width:95%;">
              <div class="modal-content ">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Evidencias - Fianzas</h4>
                </div>

                <div class="container" style="overflow-y: scroll; width:100%; height:70%;">
                    
                    <!--<form enctype="multipart/form-data">
                        <div class="form-group col-xs-6">
                            <input id="file-3" type="file" class="file" multiple=true data-preview-file-type="any">
                        </div>                        
                        <div class="form-group col-xs-12">
                            <button class="btn btn-primary">Cargar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </form>-->

                    <div class="file-loading col-xs-6" >
                        <input id="file-31" name="input-pd[]" type="file" multiple>
                    </div>

                </div>


                
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->    

          <!-- /.fin operadores -->

         
          <!-- /.box -->
          <!-- /.box -->
            
    </section>

    <!-- /.content -->
  </div> 
  
</div>
<!-- ./wrapper -->

<script>    
     
    var idVincularFianzaEdit = 0;   
    var id_operador=0;    

    function setidevidencia(idevidencia){  

      blockUI(true);
      var jqxhr = $.post
            (
                  $("#baseUrl").val()+"Catalogos_VincularFianza/Get_File", 
                  { 
                      idevidencia: idevidencia
                  },
                  function(json) {

                        //alert(json);

                        blockUI(false);
                        var arrayParse = JSON.parse(json);

                        //alert(JSON.stringify(arrayParse[0].Url));
                        //alert(JSON.stringify(arrayParse[1].ConfigUrl));
                        //alert($("#baseUrl").val()+'{filename}');

                        $("#file-31").fileinput({        
                              uploadUrl:  $("#baseUrl").val()+"Catalogos_VincularFianza/File_Upload",
                              uploadAsync: false,
                              minFileCount: 1,
                              maxFileCount: 5,
                              overwriteInitial: true,
                              showUpload:true, 
                              previewFileType:'any',
                              allowedFileExtensions: ["jpg","JPG","png","PNG","bmp","BMP","JPEG","jpeg","pdf","txt"],
                              initialPreview: arrayParse[0].Url,
                              initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                              initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                              initialPreviewDownloadUrl: $("#baseUrl").val()+'file-upload-evidencia/'+idevidencia+'/'+'{filename}', // includes the dynamic `filename` tag to be replaced for each config
                              initialPreviewConfig: arrayParse[1].ConfigUrl,
                              purifyHtml: true, // this by default purifies HTML data for preview
                              uploadExtraData: {
                                  img_key: "1000",
                                  img_keywords: "happy, places",
                                  id: idevidencia
                              }
                        }).on('filebatchpreupload', function(event, data, id, index) {
                            $('#kv-success-1').html('<h4>Upload Status</h4><ul></ul>').hide();
                        }).on('fileuploaded', function(event, data, id, index) {
                            var fname = data.files[index].name,
                                out = '<li>' + 'Uploaded file # ' + (index + 1) + ' - '  +  fname + ' successfully.' + '</li>';
                            $('#kv-success-1 ul').append(out);
                            $('#kv-success-1').fadeIn('slow');
                        });

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

    function limpiarVincular(){       

        $('#vincular_convenio,#vincular_monto,#vincular_operador,#liststatusfianza,#vincular_fechafianza,#vincular_nomafectado').val('');
        $('#accionvincular').html('Guardar');
        $('.select2').val(null).trigger('change');
        id_operador=0;   
        buscar();
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verVincularFianza(idVincularFianza,cat_vincularfianza_noconvenio,cat_statusfianzas_id_statusfianzas,cat_vincularfianza_montopactado,cat_vincularfianza_fecha,cat_operadores_id_operadores,cat_operadores_nombre,cat_vincularfianza_nombreafectado,cat_vincularfianza_evidencia){

           limpiarVincular ();
           $('#accionvincular').html('Editar');
           //$('#titleform').html('Editar VincularFianza');
           //$('#formUsuarios').validator('update');

           idVincularFianzaEdit = idVincularFianza;          
           
           id_operador=cat_operadores_id_operadores;

           $('#vincular_convenio').val(cat_vincularfianza_noconvenio);
           $('#liststatusfianza').val(cat_statusfianzas_id_statusfianzas).trigger('change');           
           $('#vincular_monto').val(cat_vincularfianza_montopactado);
           $('#vincular_fechafianza').val(cat_vincularfianza_fecha);
           $('#vincular_operador').val(cat_operadores_nombre);
           $('#vincular_nomafectado').val(cat_vincularfianza_nombreafectado);

    }

    function eliminarVincularFianza(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_VincularFianza/VincularFianza_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_VincularFianza/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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

      switch(formGlobal) {
          
          case "operador":
              guardarDatosOperador();
              break;
          default:              
      } 

      formGlobal = "";

    }    

    function buscar(){        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_VincularFianza/VincularFianza_Buscar", 
                {           
                    liststatusfianza: $('#liststatusfianza').val(),
                    vincularfianza_tabulador: $('#vincularfianza_tabulador').val(),
                    vincular_convenio: $('#vincular_convenio').val(),                                    
                    vincular_fechafianza: $('#vincular_fechafianza').val(),
                    id_operador: id_operador,
                    vincular_nomafectado: $('#vincular_nomafectado').val()
                },                
                function(html) {
                    blockUI(false);
                    $('#contenderTable').html('<table id="tablaModulo" class="table table-bordered table-striped"><thead><tr><th>Id</th><th>Convenio</th><th>Status Fianza</th><th>Monto Fianza</th><th>Fecha de Fianza</th><th>(Persona) Descuento Fianza</th><th>Nombre Afectado (s)</th><th>Evidencia</th><th>Status</th><th>Fecha</th><th>Acciones</th></tr></thead><tbody style="font-size: 15px;" id="tableReporte">'+html+'</tbody><tfoot><tr><th>Id</th><th>Convenio</th><th>Status Fianza</th><th>Monto Fianza</th><th>Fecha de Fianza</th><th>(Persona) Descuento Fianza</th><th>Nombre Afectado (s)</th><th>Evidencia</th><th>Status</th><th>Fecha</th><th>Acciones</th></tr></tfoot></table>');
                    dataTableRefresh();
                    idVincularFianzaEdit = 0; 
                    //$('#vincularfianza_tabla').html(html);
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

    function guardarVincular(){
         
        if($('#vincular_convenio').val()==""){
            Message('messageAlertTable','Alerta!','Proporcione un numero de convenio, verifique...','7000','danger');              
            ValidateControl("vincular_convenio","7000");
            return false;
        }

        if($('#liststatusfianza').val()==""){
            Message('messageAlertTable','Alerta!','Proporcione un estado de la fianza, verifique...','7000','danger'); 
            ValidateControl("liststatusfianza","7000");      
            return false;
        }

        if($('#vincular_monto').val()==0){
            Message('messageAlertTable','Alerta!','Proporcione monto de la fianza, verifique...','7000','danger'); 
            ValidateControl("vincular_monto","7000");      
            return false;
        }

        if($('#vincular_fechafianza').val()==""){
            Message('messageAlertTable','Alerta!','Proporcione fecha de la fianza, verifique...','7000','danger'); 
            ValidateControl("vincular_fechafianza","7000");       
            return false;
        }

        if(id_operador==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista un Operador, verifique...','7000','danger'); 
            ValidateControl("vincular_operador","7000");       
            return false;
        }       

        if($('#vincular_nomafectado').val()==0){
            Message('messageAlertTable','Alerta!','Proporcione un nombre de afectado, verifique...','7000','danger');  
            ValidateControl("vincular_nomafectado","7000");      
            return false;
        }
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_VincularFianza/VincularFianza_Nuevo", 
                {            
                  idVincularFianza: idVincularFianzaEdit,
                  vincular_convenio: $('#vincular_convenio').val(),
                  vincular_monto: $('#vincular_monto').val(),
                  liststatusfianza: $('#liststatusfianza').val(),
                  id_operador: id_operador,
                  vincular_fechafianza: $('#vincular_fechafianza').val(),
                  vincular_nomafectado: $('#vincular_nomafectado').val()
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          
                          limpiarVincular();
                          //$('#formVincularFianza')[0].reset();
                          //$('#titleform').html('Nueva VincularFianza');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          
                          //window.location=$("#baseUrl").val()+"Catalogos_VincularFianza/index";                          
                          //$('#vincular_fianza,#vincular_unidad,#vincular_operador,#vincular_placa,#vincular_periodopago,#vincular_cobro').val('');

                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La VincularFianza, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }    

    function guardarDatosOperador(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_Operadores/Operadores_Nuevo", 
                {                  
                   idOperadores: 0,
                   operadores: $('#operadores').val(),
                   nombre_operadores: $('#nombre_operadores').val(),
                   telefono_operadores: $('#telefono_operadores').val(),
                   direccion_operadores: $('#direccion_operadores').val(),
                   zona_operadores: $('#listzona').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idOperadorEdit = 0;
                          $('#formOperador')[0].reset();
                          $('#titleform').html('Nueva Operador');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          //window.location=$("#baseUrl").val()+"Catalogos_Operador/index";
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Operador, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }    
           
</script>