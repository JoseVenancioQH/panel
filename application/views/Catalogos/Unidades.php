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
        Unidades
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Unidades</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Unidades</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-unidades" onclick="javascript:id_placa = 0;idUnidadesEdit = 0;clearform();">Agregar Unidades</button>                      
                   </td>                   
               </tr>
             </table>                  
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th># Economico</th>
                    <th>Año</th>
                    <!--<th># Placas</th>-->
                    <th>Fecha</th>
                    <th>Status</th>
                    <th>Marca Unidad</th>
                    <th>Modelo Unidad</th>
                    <th># Servicio Unidad</th>
                    <th>Rol</th>
                    <th>Empresa</th>
                    <th>Almacen</th>
                    <th>Zona</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Unidades = $this->catalogos_unidades_module->get_catalogos_unidades(0);

                   if(!empty($Unidades)){  

                      foreach($Unidades as $rowUnidades){

                        /*$arrayPermiso = json_decode($rowUsuario->usuarios_permisos);                                              

                        $stringTable = "<tr>";
                        $i=0;
                        foreach($arrayPermiso as $element){
                            
                              $arrayElement = explode("_",$element);
                              $stringTable .= "<td>";
                              foreach($arrayElement as $title){

                                  $arrayTitle = explode("-",$title); 
                                  if(count($arrayTitle)>1){

                                      $stringTable .= "->".$arrayTitle[1]."->".$arrayElement[count($arrayElement)-1];
                                  
                                  }                                                                   

                              }                      
                              $stringTable .= "</td>";
                              $i++;   
                              if($i<=3){$stringTable .= "</tr><tr>";$i=0;}  

                        }
                        $stringTable .= "</tr>";*/                                 

                        echo "<tr>";
                        echo "<td>".$rowUnidades->cat_unidades_numeconomico."</td>";                     
                        echo "<td>".$rowUnidades->cat_unidades_ano."</td>";                     
                        /*echo "<td>".$rowUnidades->cat_unidades_placas."</td>";*/                     
                        echo "<td> Registro:<br><b>".$rowUnidades->cat_unidades_fecharegistro."</b><br>Actuali.:<br><b>".$rowUnidades->cat_unidades_fechaactualizada."</b></td>";                    
                        echo "<td>".(($rowUnidades->cat_unidades_status==1)?'Activo':'Inactivo')."</td>";             
                        echo "<td>".$rowUnidades->cat_marcas_unidades_nombre."</td>";                     
                        echo "<td>".$rowUnidades->cat_modelos_unidades_nombre."</td>";                     
                        echo "<td>".$rowUnidades->cat_servicio_unidades_nombre."</td>";                        
                        echo "<td>".$rowUnidades->cat_rol_unidades_nombre."</td>";
                        echo "<td>".$rowUnidades->cat_empresa_nombre."</td>";
                        echo "<td>".$rowUnidades->cat_almacen_nombre."</td>";
                        echo "<td>".$rowUnidades->cat_zonas_unidades_nombre."</td>";                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verUnidad(\"".$rowUnidades->cat_unidades_id_unidad."\",\"".$rowUnidades->cat_unidades_numeconomico."\",\"".$rowUnidades->cat_unidades_ano./*"\",\"".$rowUnidades->cat_placas_id_placas."\",\"".$rowUnidades->cat_unidades_placas.*/"\",\"".$rowUnidades->cat_unidades_id_marca."\",\"".$rowUnidades->cat_unidades_id_modelo."\",\"".$rowUnidades->cat_unidades_id_servicio."\",\"".$rowUnidades->cat_unidades_id_rol."\",\"".$rowUnidades->cat_unidades_id_empresa."\",\"".$rowUnidades->cat_unidades_id_zona."\",\"".$rowUnidades->cat_unidades_id_almacen."\",\"".$rowUnidades->cat_unidades_status."\")' title='Editar Unidad' data-toggle='modal' data-target='#modal-agregar-unidades' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowUnidades->cat_unidades_status==0)?"Success":"Danger")." ".(($rowUnidades->cat_unidades_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarUnidad(".$rowUnidades->cat_unidades_id_unidad.",".(($rowUnidades->cat_unidades_status==0)?1:0).")' title='Editar Unidad' type='button'><i class='fa fa-".(($rowUnidades->cat_unidades_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th># Economico</th>
                    <th>Año</th>
                    <!--<th># Placas</th>-->
                    <th>Fecha</th>
                    <th>Status</th>
                    <th>Marca Unidad</th>
                    <th>Modelo Unidad</th>
                    <th># Servicio Unidad</th>
                    <th>Rol</th>
                    <th>Empresa</th>
                    <th>Almacen</th>
                    <th>Zona</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-unidades">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Unidad</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formUnidades" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right class-guardar" id="grabarusuario">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="numero_economico_unidad" class="control-label"># Econo. Unidad</label>
                                  <input type="text" class="form-control" id="numeconomico" placeholder="Numero Econo. Unid." data-error="Proporcione # Eco." required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="ano_unidad" class="control-label">Año Unidad</label>
                                  <input type="text" class="form-control" id="anounidad" placeholder="Año Unidad" data-error="Proporcione Año Unidad" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                              </div>

                            </div>                          
                          
                          </div>    

                          <div class="form-group has-feedback">
                            
                            <div class="row">

                                <!--<div class="form-group col-xs-6 has-feedback">
                                  
                                  <label for="numero_placa" class="control-label"># Placa</label>
                                  <input type="text" class="form-control" id="numplaca" placeholder="Numero de Placa" data-error="Proporcione Numero de Placa" autocomplete="off" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                
                                </div>-->

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Marca Unidad" class="control-label">Marca Unidad</label>
                                  <select id="listmarcaunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Marca Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Marca Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_marcas_unidades') as $rowMarca){
                                         echo "<option value=\"".$rowMarca->cat_marcas_unidades_id_marca."\">".$rowMarca->cat_marcas_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Marca de Unidad</div>

                                </div>

                            </div>

                          </div>
                          
                          <div class="form-group has-feedback">
                            
                            <div class="row">

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Modelo Unidad" class="control-label">Modelo Unidad</label>
                                  <select id="listmodelounidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Modelo Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Modelo Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_modelos_unidades') as $rowModelo){
                                         echo "<option value=\"".$rowModelo->cat_modelos_unidades_id_modelo."\">".$rowModelo->cat_modelos_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Modelo de Unidad</div>

                                </div>

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Servicios Unidad" class="control-label">Servicios Unidad</label>
                                  <select id="listserviciosunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Servicios Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Servicios Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_servicio_unidades') as $rowServicio){
                                         echo "<option value=\"".$rowServicio->cat_servicio_unidades_id_servicio."\">".$rowServicio->cat_servicio_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Servicio de Unidad</div>

                                </div>

                            </div>

                          </div>

                          <div class="form-group has-feedback">
                            
                            <div class="row">

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Rol Unidad" class="control-label">Rol Unidad</label>
                                  <select id="listrolunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Rol Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Rol Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_rol_unidades') as $rowModelo){
                                         echo "<option value=\"".$rowModelo->cat_rol_unidades_id_rol."\">".$rowModelo->cat_rol_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Rol de Unidad</div>

                                </div>

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Empresa Unidad" class="control-label">Empresa Unidad</label>
                                  <select id="listempresaunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Empresa Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Empresa Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_empresa') as $rowEmpresa){
                                         echo "<option value=\"".$rowEmpresa->cat_empresa_id_empresa."\">".$rowEmpresa->cat_empresa_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Servicio de Unidad</div>

                                </div>

                            </div>

                          </div>

                          <div class="form-group has-feedback">
                            
                            <div class="row">

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Rol Unidad" class="control-label">Almacen Unidad</label>
                                  <select id="listalmacenunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Almacen Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Almacen Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_almacen') as $rowAlmacen){
                                         echo "<option value=\"".$rowAlmacen->cat_almacen_id_almacen."\">".$rowAlmacen->cat_almacen_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Almacen de Unidad</div>

                                </div>

                                <div class="form-group col-sm-6 has-feedback">

                                  <label for="Zona Unidad" class="control-label">Zona Unidad</label>
                                  <select id="listzonaunidad" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Zona Unidad" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Zona Unidad...</option>";

                                    <?php
                                      foreach($this->catalogos_unidades_module->get_cat_catalogos('cat_zonas_unidades') as $rowZona){
                                         echo "<option value=\"".$rowZona->cat_zonas_unidades_id_zona."\">".$rowZona->cat_zonas_unidades_nombre."</option>";                     
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Zona de Unidad</div>

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
     
    var idUnidadesEdit = 0;   
    var id_placa = 0; 

    function clearform(){

        $('#formUnidades')[0].reset();
        $('.select2').val(null).trigger('change');
        $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
        $('#grabarunidada').html('Grabar');
        $('#titleform').html('Grabar Unidad');         

    }
    
    function verUnidad(idUnidad,cat_unidades_numeconomico,cat_unidades_ano,cat_unidades_id_marca,cat_unidades_id_modelo,cat_unidades_id_servicio,cat_unidades_id_rol,cat_unidades_id_empresa,cat_unidades_id_zona,cat_unidades_id_almacen,cat_unidades_status){

           clearform();
           $('#grabarunidada').html('Editar');
           $('#titleform').html('Editar Unidad');
           //$('#formUsuarios').validator('update');

           idUnidadesEdit = idUnidad;
           //id_placa = cat_placas_id_placas;
            
           $('#numeconomico').val(cat_unidades_numeconomico);
           $('#anounidad').val(cat_unidades_ano);
           //$('#numplaca').val(cat_unidades_placas);

           $('#listmarcaunidad').val(cat_unidades_id_marca).trigger('change');
           $('#listmodelounidad').val(cat_unidades_id_modelo).trigger('change');
           $('#listserviciosunidad').val(cat_unidades_id_servicio).trigger('change');
           $('#listrolunidad').val(cat_unidades_id_rol).trigger('change');
           $('#listempresaunidad').val(cat_unidades_id_empresa).trigger('change');
           $('#listalmacenunidad').val(cat_unidades_id_almacen).trigger('change');
           $('#listzonaunidad').val(cat_unidades_id_zona).trigger('change');
    }

    function eliminarUnidad(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Unidades/Unidades_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_Unidades/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Unidades/Unidades_Nuevo", 
                {            
                  idUnidades: idUnidadesEdit,
                  numeconomico: $('#numeconomico').val(),
                  anounidad: $('#anounidad').val(),
                  //numplaca: id_placa,//$('#numplaca').val(),
                  listmarcaunidad : $("#listmarcaunidad").val(),
                  listmodelounidad : $("#listmodelounidad").val(),                  
                  listserviciosunidad: $("#listserviciosunidad").val(), 
                  listrolunidad: $("#listrolunidad").val(),
                  listempresaunidad: $("#listempresaunidad").val(),
                  listalmacenunidad: $("#listalmacenunidad").val(),
                  listzonaunidad: $("#listzonaunidad").val()
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idUnidadesEdit = 0;
                          //id_placa = 0; 
                          $('#formUnidades')[0].reset();
                          $('#titleform').html('Nueva Unidad');
                          $('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Unidades/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Unidad, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>