<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="3">

<div class="box box-solid bg-teal-gradient">
</div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
   
    <!-- Content Header (Page header) -->
    <div class="login-box-body" style="cursor:pointer; cursor: hand;">
      <a class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modal-ver-ayuda"><b >Ayuda</a>
    </div>
    <section class="content-header">      
      <h1>
        Productos
        <small>Modulo</small>        
      </h1>      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Productos</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-productos" onclick="javascript:idProductosEdit = 0;clearform();">Agregar Productos</button>                      
                   </td>                   
               </tr>
             </table>                  
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID Productos</th>
                    <th>ID Cliente</th>
                    <th>SKU</th>
                    <th>MLM</th>
                    <th>Descripción</th>
                    <th>Precio Regular</th>
                    <th>Precio Promoción</th>
                    <th>Cantidad</th>
                    <th>Comentarios</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Productos = $this->productos_registros_module->get_productos(0);

                   if(!empty($Productos)){  

                      foreach($Productos as $rowProductos){                   

                        echo "<tr>";
                        echo "<td>".$rowProductos->cat_productos_id_productos."</td>";                     
                        echo "<td>".$rowProductos->cat_productos_id_cliente."</td>";                     
                        echo "<td>".$rowProductos->cat_productos_sku."</td>";                     
                        echo "<td>".$rowProductos->cat_productos_mlm."</td>"; 
                        echo "<td>".$rowProductos->cat_productos_descripcion."</td>"; 
                        echo "<td>".$rowProductos->cat_productos_precioregular."</td>";
                        echo "<td>".$rowProductos->cat_productos_preciopromocion."</td>";
                        echo "<td>".$rowProductos->cat_productos_cantidad."</td>";
                        echo "<td>".$rowProductos->cat_productos_comentarios."</td>";                     
                        //echo "<td>".(($rowProductos->cat_productos_descripcion==1)?'Activo':'Inactivo')."</td>";               
                        //echo "<td><div style=\"width:300px; height:60px; overflow:auto;\"><table>".$stringTable."</table></div></td>";
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();blockUI(true);verProducto(\"".
                          $rowProductos->cat_productos_id_productos."\",\"".
                          $rowProductos->cat_productos_id_cliente."\",\"".
                          $rowProductos->cat_productos_sku."\",\"".
                          $rowProductos->cat_productos_mlm."\",\"".
                          $rowProductos->cat_productos_descripcion."\",\"".
                          $rowProductos->cat_productos_precioregular."\",\"".
                          $rowProductos->cat_productos_preciopromocion."\",\"".
                          $rowProductos->cat_productos_cantidad."\",\"".
                          $rowProductos->cat_productos_comentarios."\")' title='Editar Productos' data-toggle='modal' data-target='#modal-agregar-productos' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowProductos->cat_productos_status==0)?"Success":"Danger")." ".(($rowProductos->cat_productos_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarProducto(".$rowProductos->cat_productos_id_productos.",".(($rowProductos->cat_productos_status==0)?1:0).")' title='Eliminar Producto' type='button'><i class='fa fa-".(($rowProductos->cat_productos_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>ID Productos</th>
                    <th>ID Cliente</th>
                    <th>SKU</th>
                    <th>MLM</th>
                    <th>Descripción</th>
                    <th>Precio Regular</th>
                    <th>Precio Promoción</th>
                    <th>Cantidad</th>
                    <th>Comentarios</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-productos">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Productos</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formProductos" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarproductos">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-sm-12">
                                  <label for="Cliente" class="control-label">Cliente</label>
                                  <select id="listCliente" class="form-control" data-placeholder="Sel. Cliente" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione un Cliente...</option> 

                                    <?php

                                      foreach($this->productos_registros_module->get_cat_cliente(0) as $rowCliente){
                                         echo "<option value=\"".$rowCliente->cat_cliente_id_cliente."\">".$rowCliente->cat_cliente_nombre."</option>";
                                         //$arrayCliente[$rowCliente->cat_cliente_id_cliente] = $rowCliente->cat_perfiles_permisos;
                                         
                                      }
                                      //echo "<input type=\"hidden\" id=\"arrayPerfiles\" name=\"arrayPerfiles\" value='".json_encode($arrayPerfiles)."'>";
                                      //var_dump(json_encode($arrayPerfiles));
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione un Cliente</div>
                              </div>         

                            </div>                 
                          
                          </div>                          

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="form-group col-xs-6 has-feedback">
                                  
                                    <label class="control-label">SKU</label>
                                    <input type="text" data-minlength="6" class="form-control" id="SKU" placeholder="SKU" data-error="Minimo 6 Caracteres" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                
                                </div>

                                <div class="form-group col-xs-6 has-feedback">

                                  <label class="control-label">MLM</label>                            
                                  <input type="text" class="form-control" id="MLM" placeholder="MLM" data-error="MLM invalido" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                  
                                </div>

                            </div>

                          </div>

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="col-sm-6">
                                  <label class="control-label">Precio Regular</label>
                                    <input type="number" data-minlength="3" class="form-control" id="precioregular" placeholder="Precio Regular" step="any" data-error="Minimo 6 Caracteres" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                </div>

                                <div class="col-sm-6">
                                  <label class="control-label">Precio Promocion</label>
                                    <input type="number" data-minlength="3" class="form-control" id="preciopromocion" placeholder="Precio Promocion" step="any" data-error="Minimo 6 Caracteres" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                </div>

                            </div>

                          </div>

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="col-sm-12">
                                  <label class="control-label">Cantidad</label>
                                    <input type="number" data-minlength="3" class="form-control" id="cantidad" placeholder="Cantidad" step="any" data-error="Minimo 6 Caracteres" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                </div>                               

                            </div>

                          </div>

                           <div class="form-group">
                            
                            <div class="row">

                                <div class="col-sm-12">
                                  <label class="control-label">Descripcion</label>
                                   
                                    <textarea id="descripcion" name="descripcion" class="form-control" rows="2" cols="30"></textarea>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                </div>

                                <div class="col-sm-12">
                                  <label class="control-label">Comentarios</label>
                                    <textarea id="comentarios" name="comentarios" class="form-control" rows="2" cols="30"></textarea>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
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
          <div class="modal fade" id="modal-ver-ayuda">
            <div class="modal-dialog" style="width:95%;">
              <div class="modal-content" style="height:85%;">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Ayuda - Productos</h4>
                </div>

                <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Usuarios%20-%20Control%20Placas/Usuarios%20-%20Control%20Placas.html"></iframe>

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
     
    var idProductoEdit = 0;
    var arrayIdEmpresa = Array();
    var arrayIdAlmacen = Array();

    function clearform(){
      $('#formProductos')[0].reset();
      $('#listCliente').val(null).trigger('change');
      //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
      $('#grabarproducto').html('Grabar');
      $('#titleform').html('Nuevo Producto');
    }
    
    function verProducto(idProducto,idCliente,SKU,MLM,cantidad,precioregular,preciopromocion,descripcion,comentarios){
         
         clearform();
         $('#grabarproductos').html('Editar');
         $('#titleform').html('Editar Producto');
         //$('#formUsuarios').validator('update');

         idProductoEdit = idProducto; 

         /*$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');       

         $.each(JSON.parse(usuarios_permisos), function(i,j) {           
                $('#'+j.replace(/\s/g, "\\ ")+'_id').iCheck('check').iCheck('update');
         });*/          

         $('#listCliente').val(idCliente);         
         $('#SKU').val(SKU);
         $('#MLM').val(MLM);      
         $('#precioregular').val(precioregular);
         $('#preciopromocion').val(preciopromocion);    
         $('#cantidad').val(cantidad);          
         $('#descripcion').val(descripcion);
         $('#comentarios').val(comentarios);

          blockUI(false);


    }

    function eliminarProducto(id,status){
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Productos_Registros/Producto_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Productos_Registros/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
        
        /*var arrayPermisos = Array();
        var arrayAlmacenes = Array();
        var arrayEmpresa = Array();        

        $(".nodoPermiso:checked").each(function() {                  
            var objName = $(this).prop('id');
            var arraySplit = objName.split('_id');//para quitar el _id de la cadena         
            arrayPermisos.push( arraySplit[0] );            
        });    

        if(arrayPermisos.length==0){
           Message('messageAlertModal','Alerta!','Imposible registrar El Usuario, Seleccione por lo menos un permiso, verifique...','7000','danger'); 
           return false;
        }

        $.each($('#useralmacen').select2('data'), function (i,j) {          
            arrayAlmacenes.push(j['id']);            
        });

        $.each($('#userempresa').select2('data'), function (i,j) {          
            arrayEmpresa.push(j['id']);            
        });*/

        //alert(objectToArray($('#useralmacen').select2('data')));
        //alert(JSON.stringify(arrayIdEmpresa));
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Productos_Registros/Producto_Nuevo", 
                {            
                  idProducto: idProductoEdit,
                  idCliente: $('#listCliente').val(),
                  SKU: $('#SKU').val(),
                  MLM : $("#MLM").val(),
                  cantidad : $("#cantidad").val(),
                  precioregular : $("#precioregular").val(),                  
                  preciopromocion: $("#preciopromocion").val(), 
                  descripcion: $("#descripcion").val(),
                  comentarios: $("#comentarios").val()
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idProductoEdit = 0;
                          $('#formProductos')[0].reset();
                          $('#titleform').html('Nuevo Producto');
                          $('#listCliente').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Productos_Registros/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);
                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar El Producto, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

           
</script>