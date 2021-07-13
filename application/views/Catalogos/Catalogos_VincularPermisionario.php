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

    <div class="login-box-body" style="cursor:pointer; cursor: hand;">
      <a class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modal-ver-ayuda"><b >Ayuda</a>
    </div>
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vincular Permisionarios
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Vincular Permisionarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">            

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
              <h3 class="box-title">Lista de VincularPermisionario</h3>
            </div>

            <table class="table table-bordered table-striped">                
              <tr>
                  <td>
                  </td>                    
                  <td>                      
                      <div class="input-group margin">
                        <input type="text" name="vincular_permisionario" id="vincular_permisionario" class="form-control" placeholder="Permisionario" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-permisionario' onclick="javascript:formGlobal='permisionario'">+</button>
                            </span>
                      </div>                           
                  </td>
                  <td>
                      <div class="input-group margin">
                        <input type="text" name="vincular_unidad" id="vincular_unidad" class="form-control" placeholder="Unidad" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-unidades' onclick="javascript:formGlobal='unidad'">+</button>
                            </span>
                      </div>                                             
                  </td>
                  <td>
                      <div class="input-group margin">
                        <input type="text" name="vincular_operador" id="vincular_operador" class="form-control" placeholder="Operador" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-operadores' onclick="javascript:formGlobal='operador'">+</button>
                            </span>
                      </div>                                          
                  </td>
                  <td>
                      <div class="input-group margin">
                        <input type="text" name="vincular_placa" id="vincular_placa" class="form-control" placeholder="Placa" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-placas' onclick="javascript:formGlobal='placa'">+</button>
                            </span>
                      </div>                                      
                  </td>           
                  <td>
                      <div class="input-group margin">
                        <input type="text" name="vincular_periodopago" id="vincular_periodopago" class="form-control" placeholder="Peri. Pago" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-periodopago' onclick="javascript:formGlobal='periodopago'">+</button>
                            </span>
                      </div>                                           
                  </td>
                  <td>
                      <div class="input-group margin">
                        <input type="text" name="vincular_cobro" id="vincular_cobro" class="form-control" placeholder="Peri. Cobro" data-provide="typeahead" autocomplete="off">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat class-otros" data-toggle='modal' data-target='#modal-agregar-cobros' onclick="javascript:formGlobal='cobro'">+</button>
                            </span>
                      </div>                                           
                  </td>         
                  <td>                    
                      <div class="input-group margin">
                            <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="vincular_fechainicio" value="<?=date('Y-m-d');?>" placeholder="Fecha Inicio, Periodo Pago" data-error="Proporcione Fecha Inicio Pagos">                        
                      </div>                          
                  </td>
                  <td>
                     <div class="input-group margin">
                      <button type="button" class="btn btn-block btn-success class-guardar" id="accionguardar" onclick="guardarVincular()">Guardar</button>              
                    </div> 
                  </td>
                  <td>
                    <div class="input-group margin">
                      <button type="button" class="btn btn-block btn-primary" id="accionlimpiar" onclick="javascript:idVincularPermisionarioEdit = 0;limpiarVincular()">Limpiar</button>              
                    </div>
                  </dh>
                  <td>
                    <div class="input-group margin">
                      <button type="button" class="btn btn-block btn-primary" id="accionbuscar" onclick="buscar()">Buscar</button>              
                    </div>
                  </td>
              </tr>
               <tr>
                  <td>
                  </td>                    
                  <td style="text-align: center;" id="vincular_permisionario_text">                      
                                            
                  </td>
                  <td style="text-align: center;" id="vincular_unidad_text">
                                                             
                  </td>
                  <td style="text-align: center;" id="vincular_operador_text">
                                                           
                  </td>
                  <td style="text-align: center;" id="vincular_placa_text">
                                                          
                  </td>           
                  <td style="text-align: center;" id="vincular_periodopago_text">
                                                                
                  </td>
                  <td style="text-align: center;" id="vincular_cobro_text">
                                                          
                  </td>         
                  <td style="text-align: center;" id="vincular_fechainicio_text">                    
                                     
                  </td>
                  <td>
                     
                  </td>
                  <td>
                    
                  </dh>
                  <td>
                    
                  </td>
              </tr>
            </table>

            <!-- /.box-header -->
            <div id="contenderTable" class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Permisionarios</th>
                    <th>Unidad</th>
                    <th>Operador</th>
                    <th>Placa</th>
                    <th>Periodo Pago</th>           
                    <th>Cobro</th>
                    <th>Fecha Inicio</th>
                    <th>Status</th>
                    <th>Fecha Movimiento</th>         
                    <th>Acciones</th>
                </tr>
                
                </thead>
                <tbody style="font-size: 15px;" id="tableReporte">
                  <?php
                     $VincularPermisionarioes = $this->catalogos_vincularpermisionario_module->get_catalogos_vincularpermisionario('cat_vincularpermisionario');

                     if(!empty($VincularPermisionarioes)){  

                          foreach($VincularPermisionarioes as $rowVincularPermisionarioes){                    

                                echo "<tr>";
                                echo "<td>".$rowVincularPermisionarioes->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
                                echo "<td>".$rowVincularPermisionarioes->cat_permisionario_nombre."</td>";
                                echo "<td>".$rowVincularPermisionarioes->cat_unidades_numeconomico."</td>";
                                echo "<td>".$rowVincularPermisionarioes->cat_operadores_nombre."</td>";
                                echo "<td>".$rowVincularPermisionarioes->cat_placas_numero."</td>";
                                echo "<td>".$rowVincularPermisionarioes->cat_periodopago_nombre."</td>";
                                echo "<td>$".number_format($rowVincularPermisionarioes->cat_cobros_nombre,2)."</td>";
                                echo "<td>".$rowVincularPermisionarioes->cat_vincularpermisionario_fechainicio."</td>";                          
                                echo "<td>".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==1)?'Activo':'Inactivo')."</td>";                
                                echo "<td> Registro:<br><b>".$rowVincularPermisionarioes->cat_vincularpermisionario_fecharegistro."</b><br>Actuali.:<br><b>".$rowVincularPermisionarioes->cat_vincularpermisionario_fechaactualiza."</b></td>";                         
                                echo "<td>".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==1)?"<button class='btn-Primary class-editar' onclick='javascript:limpiarVincular();verVincularPermisionario(\"".$rowVincularPermisionarioes->cat_vincularpermisionario_id_vincularpermisionario."\",\"".$rowVincularPermisionarioes->cat_permisionario_id_permisionario."\",\"".$rowVincularPermisionarioes->cat_permisionario_nombre."\",\"".$rowVincularPermisionarioes->cat_unidades_id_unidad."\",\"".$rowVincularPermisionarioes->cat_unidades_numeconomico."\",\"".$rowVincularPermisionarioes->cat_operadores_id_operadores."\",\"".$rowVincularPermisionarioes->cat_operadores_nombre."\",\"".$rowVincularPermisionarioes->cat_placas_id_placas."\",\"".$rowVincularPermisionarioes->cat_placas_numero."\",\"".$rowVincularPermisionarioes->cat_periodopago_id_periodopago."\",\"".$rowVincularPermisionarioes->cat_periodopago_nombre."\",\"".$rowVincularPermisionarioes->cat_cobros_id_cobros."\",\"".$rowVincularPermisionarioes->cat_cobros_nombre."\",\"".$rowVincularPermisionarioes->cat_vincularpermisionario_fechainicio."\")' title='Editar VincularPermisionario' type='button'><i class='fa fa-edit'></i></button>":'');
                                echo "<button class='btn-".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==0)?"Success":"Danger")." ".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarVincularPermisionario(".$rowVincularPermisionarioes->cat_vincularpermisionario_id_vincularpermisionario.",".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==0)?1:0).")' title='Editar VincularPermisionario' type='button'><i class='fa fa-".(($rowVincularPermisionarioes->cat_vincularpermisionario_status==0)?"check":"close")."'></i></button></td>";                        
                                echo "</tr>";
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
                    <th>Cobro</th>         
                    <th>Fecha Inicio</th>
                    <th>Status</th>
                    <th>Fecha Movimiento</th>         
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.Permisionario -->
          <div class="modal fade" id="modal-agregar-permisionario">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Permisionario</h4>
                </div>

                <div id="messageAlertModal_permisionario" class="" style="">                  
                </div>

                  <form id="formPermisionario" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarpermisionario">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_permisionario" placeholder="Nombre Permisionario" data-error="Proporcione Nombre Permisionario" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Telefono</label>                                  
                                  <input type="text" class="form-control" id="telefono_permisionario" placeholder="Telefono Permisionario" data-error="Proporcione Telefono Permisionario" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_permisionario" placeholder="Direccion Permisionario" data-error="Proporcione Direccion Permisionario" required>
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
          <!-- /.fin permisionario -->

          <!-- /.unidad -->

          <div class="modal fade" id="modal-agregar-unidades">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Unidad</h4>
                </div>

                <div id="messageAlertModal_unidades" class="" style="">                  
                </div>

                  <form id="formUnidades" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarunidades">Grabar</button>
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

                                <div class="form-group col-xs-6 has-feedback">
                                  
                                  <label for="numero_placa" class="control-label"># Placa</label>
                                  <input type="text" class="form-control" id="numplaca" placeholder="Numero de Placa" data-error="Proporcione Numero de Placa" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                
                                </div>

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

          <!-- /.fin unidad -->

          <!-- /.operadores -->


          <div class="modal fade" id="modal-agregar-operadores">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Operadores</h4>
                </div>

                <div id="messageAlertModal_operadores" class="" style="">                  
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
                                  <input type="text" class="form-control" id="nombre_operadores" placeholder="Nombre Operadores" data-error="Proporcione Nombre Operadores" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="telefono_operadores" class="control-label">Telefono</label>                                  
                                  <input type="text" class="form-control" id="telefono_operadores" placeholder="Telefono Operadores" data-error="Proporcione Telefono Operadores" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="direccion_operadores" class="control-label">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_operadores" placeholder="Direccion Operadores" data-error="Proporcione Direccion Operadores" required>
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

          <!-- /.fin operadores -->

          <!-- /.placas -->


          <div class="modal fade" id="modal-agregar-placas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Placas</h4>
                </div>

                <div id="messageAlertModal_placas" class="" style="">                  
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

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="Periodo Pago" class="control-label">Periodo Pago</label>
                                  <select id="listperiodopago" class="form-control select2 select2-hidden-accessible" data-placeholder="Sel. Periodo Pago" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione Periodo Pago...</option>";

                                    <?php
                                      foreach($this->catalogos_placas_module->get_cat_catalogos('cat_periodopago') as $rowPeriodoPago){

                                         echo "<option value=\"".$rowPeriodoPago->cat_periodopago_id_periodopago."\">".$rowPeriodoPago->cat_periodopago_nombre."</option>";    
                                      }                                      
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione Periodo Pago</div>                            
                              
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

          <!-- /.fin placas -->

          <!-- /.Periodo Pago -->

          <div class="modal fade" id="modal-agregar-periodopago">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva PeriodoPago</h4>
                </div>

                <div id="messageAlertModal_periodopago" class="" style="">                  
                </div>

                  <form id="formPeriodoPago" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarperiodopago">Grabar</button>
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

                      </div>

                  </form>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- /.fin Periodo Pago -->

          <!-- /.Periodo Cobro -->

          <div class="modal fade" id="modal-agregar-cobros">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Cobros</h4>
                </div>

                <div id="messageAlertModal_cobros" class="" style="">                  
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

                                  <label for="cobros_nombre" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="cobros_nombre" placeholder="Nombre del Cobro" data-error="Proporcione Nombre Cobro" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              
                            </div>

                            <div class="row">

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="cobros_porcentaje" class="control-label">Porcentaje</label>
                                  <input type="text" class="form-control" id="cobros_porcentaje" placeholder="Nombre porcentaje" data-error="Proporcione Porcentaje" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                              
                              </div>

                              <div class="form-group col-xs-6 has-feedback">

                                  <label for="cobros_porcentajedecimal" class="control-label">Porcentaje Decimal</label>
                                  <input type="text" class="form-control" id="cobros_porcentajedecimal" placeholder="Nombre Porcentaje Decimal" data-error="Proporcione Porcentaje Decimal" required>
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
          <!-- /.fin Periodo Cobro -->

          <!-- /.modal -->    
          <div class="modal fade" id="modal-ver-ayuda">
            <div class="modal-dialog" style="width:95%;">
              <div class="modal-content" style="height:85%;">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="titleform">Ayuda - Vincular Permisionario</h4>
                </div>

                <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Vincular%20Permisionario%20-%20Control%20Placas/Control%20Placas%20-%20Vincular%20Permisionario.html"></iframe>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->    

          <!-- /.box -->
          <!-- /.box -->
            
    </section>

    <!-- /.content -->
  </div> 
  
</div>
<!-- ./wrapper -->

<script>    
     
    var idVincularPermisionarioEdit = 0;    
    var id_permisionario=0;
    var id_unidad=0;
    var id_operador=0;
    var id_placa=0;
    var id_periodopago=0;
    var id_cobro=0;    

    function buscar(){       
        blockUI(true);    
        var jqxhr = $.post
          (
              $("#baseUrl").val()+"Catalogos_VincularPermisionario/VincularPermisionario_Buscar", 
              {                  
                    id_permisionario: id_permisionario,
                    id_unidad: id_unidad,
                    id_operador: id_operador,
                    id_placa: id_placa,
                    id_periodopago: id_periodopago,
                    id_cobro: id_cobro,
                    vincular_fechainicio: $('#vincular_fechainicio').val(),
                    permisionario_tabulador: $('#permisionario_tabulador').val()
              },                
              function(html) {
                    blockUI(false);
                    //$('#tableReporte').html(html);
                    $('#contenderTable').html('<table id="tablaModulo" class="table table-bordered table-striped"><thead><tr><th>Id</th><th>Permisionarios</th><th>Unidad</th><th>Operador</th><th>Placa</th><th>Periodo Pago</th><th>Cobro</th><th>Fecha Inicio</th><th>Status</th><th>Fecha Movimiento</th><th>Acciones</th></tr></thead><tbody style="font-size: 15px;" id="tableReporte">'+html+'</tbody><tfoot><tr><th>Id</th><th>Permisionarios</th><th>Unidad</th><th>Operador</th><th>Placa</th><th>Periodo Pago</th><th>Cobro</th><th>Fecha Inicio</th><th>Status</th><th>Fecha Movimiento</th><th>Acciones</th></tr></tfoot></table>');
                    dataTableRefresh();
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

    function clearform(){
      $('.submitForm')[0].reset();      
    }         

    function limpiarVincular(){

         idVincularPermisionarioEdit=0;
         id_permisionario=0;
         id_unidad=0;
         id_operador=0;
         id_placa=0;
         id_periodopago=0;
         id_cobro=0;

        $('#vincular_permisionario,#vincular_unidad,#vincular_operador,#vincular_placa,#vincular_periodopago,#vincular_cobro,#vincular_fechainicio').val('');
        $('#vincular_permisionario_text,#vincular_unidad_text,#vincular_operador_text,#vincular_placa_text,#vincular_periodopago_text,#vincular_cobro_text,#vincular_fechainicio_text').html('');
        $('#accionvincular').html('Guardar');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
        buscar();

    }
    
    function verVincularPermisionario(idVincularPermisionario,cat_permisionario_id_permisionario,cat_permisionario_nombre,cat_unidades_id_unidad,cat_unidades_numeconomico,cat_operadores_id_operadores,cat_operadores_nombre,cat_placas_id_placas,cat_placas_numero,cat_periodopago_id_periodopago,cat_periodopago_nombre,cat_cobros_id_cobros,cat_cobros_nombre,cat_vincularpermisionario_fechainicio){

           limpiarVincular();
           $('#accionvincular').html('Editar');
           //$('#titleform').html('Editar VincularPermisionario');
           //$('#formUsuarios').validator('update');

           idVincularPermisionarioEdit = idVincularPermisionario;

           idVincularPermisionarioEdit=idVincularPermisionario;
           id_permisionario=cat_permisionario_id_permisionario;
           id_unidad=cat_unidades_id_unidad;
           id_operador=cat_operadores_id_operadores;
           id_placa=cat_placas_id_placas;
           id_periodopago=cat_periodopago_id_periodopago;
           id_cobro=cat_cobros_id_cobros;

           $('#vincular_permisionario').val(cat_permisionario_nombre);
           $('#vincular_unidad').val(cat_unidades_numeconomico);
           $('#vincular_operador').val(cat_operadores_nombre);
           $('#vincular_placa').val(cat_placas_numero);
           $('#vincular_periodopago').val(cat_periodopago_nombre);
           $('#vincular_cobro').val(cat_cobros_nombre);
           var fecha = cat_vincularpermisionario_fechainicio.split(" ");
           $('#vincular_fechainicio').val(fecha[0]);

           $('#vincular_permisionario_text').html(cat_permisionario_nombre);
           $('#vincular_unidad_text').html(cat_unidades_numeconomico);
           $('#vincular_operador_text').html(cat_operadores_nombre);
           $('#vincular_placa_text').html(cat_placas_numero);
           $('#vincular_periodopago_text').html(cat_periodopago_nombre);
           $('#vincular_cobro_text').html(cat_cobros_nombre);
           var fecha = cat_vincularpermisionario_fechainicio.split(" ");
           $('#vincular_fechainicio_text').html(fecha[0]);

    }

    function eliminarVincularPermisionario(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_VincularPermisionario/VincularPermisionario_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Catalogos_VincularPermisionario/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
          case "":
              guardarVincular();              
              break;
          case "permisionario":
              guardarDatosPermisionario();
              break;
          case "unidad":
              guardarDatosUnidad();
              break;
          case "operador":
              guardarDatosOperador();
              break;
          case "placa":
              guardarDatosPlacas();
              break;
          case "periodopago":
              guardarDatosPeriodoPago();
              break;
          case "cobro":
              guardarDatosCobros();
              break;
          default:              
      } 

      formGlobal = "";

    }    

    function guardarVincular(){


        if(id_permisionario==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista un Permisionario, verifique...','7000','danger');              
            ValidateControl("vincular_permisionario","7000");
            return false;

        }

        if(id_unidad==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista una Unidad, verifique...','7000','danger'); 
            ValidateControl("vincular_unidad","7000");      
            return false;
        }

        if(id_operador==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista un Operador, verifique...','7000','danger'); 
            ValidateControl("vincular_operador","7000");       
            return false;
        }

        if(id_placa==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista una Placa, verifique...','7000','danger');  
            ValidateControl("vincular_placa","7000");      
            return false;
        }

        if(id_periodopago==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista un Periodo de Pago, verifique...','7000','danger');  
            ValidateControl("vincular_periodopago","7000");      
            return false;
        }

        if(id_cobro==0){
            Message('messageAlertTable','Alerta!','Seleccione de la lista un Tipo de Cobro, verifique...','7000','danger');
            ValidateControl("vincular_cobro","7000");       
            return false;
        }

        if($('#vincular_fechainicio').val()==""){
            Message('messageAlertTable','Alerta!','Proporcione fecha, verifique...','7000','danger');
            ValidateControl("vincular_fechainicio","7000");       
            return false;
        }
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_VincularPermisionario/VincularPermisionario_Nuevo", 
                {            
                  idVincularPermisionario: idVincularPermisionarioEdit,
                  id_permisionario: id_permisionario,
                  id_unidad: id_unidad,
                  id_operador: id_operador,
                  id_placa: id_placa,
                  id_periodopago: id_periodopago,
                  id_cobro: id_cobro,
                  vincular_fechainicio: $('#vincular_fechainicio').val()
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          
                          limpiarVincular();

                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);

                          //$('#formVincularPermisionario')[0].reset();
                          //$('#titleform').html('Nueva VincularPermisionario');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          
                          //window.location=$("#baseUrl").val()+"Catalogos_VincularPermisionario/index";                          
                          //$('#vincular_permisionario,#vincular_unidad,#vincular_operador,#vincular_placa,#vincular_periodopago,#vincular_cobro').val('');
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  
                          ValidateControlAll("#vincular_unidad, #vincular_permisionario, #vincular_placa, #vincular_periodopago, #vincular_cobro","7000");
                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertTable','Alerta!','Imposible registrar La VincularPermisionario, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

     function guardarDatosPermisionario(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_Permisionario/Permisionario_Nuevo", 
                {  
                  idPermisionario: 0,        
                  permisionario: $('#permisionario').val(),
                  nombre_permisionario: $('#nombre_permisionario').val(),
                  telefono_permisionario: $('#telefono_permisionario').val(),
                  direccion_permisionario: $('#direccion_permisionario').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idPermisionarioEdit = 0;
                          $('#formPermisionario')[0].reset();
                          $('#titleform').html('Nueva Permisionario');
                          //$('#formPermisionario').attr('data-dismiss','modal');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          //window.location=$("#baseUrl").val()+"Catalogos_Permisionario/index";
                          closeModal('modal-agregar-permisionario');                          
                    }else{                          
                          Message(messageError.class_message+'_permisionario',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  
                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal_permisionario','Alerta!','Imposible registrar La Permisionario, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

    function guardarDatosUnidad(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_Unidades/Unidades_Nuevo", 
                {         
                  idUnidades: 0,         
                  numeconomico: $('#numeconomico').val(),
                  anounidad: $('#anounidad').val(),
                  numplaca: $('#numplaca').val(),
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
                        $('#formUnidades')[0].reset();
                        $('#titleform').html('Nueva Unidad');
                        $('.select2').val(null).trigger('change');
                        
                        closeModal('modal-agregar-unidades');

                    }else{                          
                        Message(messageError.class_message+'_unidades',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  
                    }
                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) {
                    Message('messageAlertModal_unidades','Alerta!','Imposible registrar La Unidad, Existente, verifique...','7000','danger');        
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
                  nombre_operadores: $('#nombre_operadores').val(),
                  telefono_operadores: $('#telefono_operadores').val(),
                  direccion_operadores: $('#direccion_operadores').val(),
                  zona_operadores: $('#listzona').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idOperadoresEdit = 0;
                          $('#formOperadores')[0].reset();
                          $('#titleform').html('Nueva Operadores');
                          
                          closeModal('modal-agregar-operadores');

                    }else{
                          
                          Message(messageError.class_message+'_operadores',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal_operadores','Alerta!','Imposible registrar La Operadores, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

    function guardarDatosPlacas(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_Placas/Placas_Nuevo", 
                {            
                  idPlacas: 0,
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
                          closeModal('modal-agregar-placas');
                    }else{                          
                          Message(messageError.class_message+'_placas',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);
                    }
                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) {
                    Message('messageAlertModal_placas','Alerta!','Imposible registrar La Placas, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

    function guardarDatosPeriodoPago(){       
        alert($('#periodopago_fechainicio').val());
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_PeriodoPago/PeriodoPago_Nuevo", 
                {                 
                  idPeriodoPago: 0,
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
                          closeModal('modal-agregar-periodopago');

                    }else{
                          
                          Message(messageError.class_message+'_periodopago',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal_periodopago','Alerta!','Imposible registrar La PeriodoPago, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

    function guardarDatosCobros(){       
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Catalogos_Cobros/Cobros_Nuevo", 
                {            
                  idCobros: 0,
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
                          closeModal('modal-agregar-cobros');
                          
                    }else{
                          
                          Message(messageError.class_message+'_cobros',messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal_cobros','Alerta!','Imposible registrar La Cobros, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>