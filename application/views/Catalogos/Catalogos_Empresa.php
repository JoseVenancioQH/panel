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
        Empresa
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Empresa</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Empresa</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-empresa" onclick="javascript:idEmpresaEdit = 0;clearform();">Agregar Empresa</button>                      
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
                    <th>Status</th>           
                    <th>Fecha</th>         
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Empresaes = $this->catalogos_empresa_module->get_catalogos_empresa(0);

                   if(!empty($Empresaes)){  

                      foreach($Empresaes as $rowEmpresaes){                                                         

                        echo "<tr>";
                        echo "<td>".$rowEmpresaes->cat_empresa_id_empresa."</td>";                     
                        echo "<td>".$rowEmpresaes->cat_empresa_nombre."</td>";                          
                        echo "<td>".(($rowEmpresaes->cat_empresa_status==1)?'Activo':'Inactivo')."</td>";                
                        echo "<td> Registro:<br><b>".$rowEmpresaes->cat_empresa_fecharegistro."</b><br>Actuali.:<br><b>".$rowEmpresaes->cat_empresa_fechaactualiza."</b></td>";                                 
                        
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verEmpresa(\"".$rowEmpresaes->cat_empresa_id_empresa."\",\"".$rowEmpresaes->cat_empresa_nombre."\",\"".$rowEmpresaes->cat_empresa_status."\",\"".$rowEmpresaes->cat_empresa_fecharegistro."\",\"".$rowEmpresaes->cat_empresa_fechaactualiza."\")' title='Editar Empresa' data-toggle='modal' data-target='#modal-agregar-empresa' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowEmpresaes->cat_empresa_status==0)?"Success":"Danger")." ".(($rowEmpresaes->cat_empresa_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarEmpresa(".$rowEmpresaes->cat_empresa_id_empresa.",".(($rowEmpresaes->cat_empresa_status==0)?1:0).")' title='Editar Empresa' type='button'><i class='fa fa-".(($rowEmpresaes->cat_empresa_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
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

          <div class="modal fade" id="modal-agregar-empresa">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nueva Empresa</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formEmpresa" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarempresa">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-xs-12 has-feedback">

                                  <label for="servicio_unidad" class="control-label">Empresa</label>
                                  <input type="text" class="form-control" id="empresa" placeholder="Servicio de la Unidad" data-error="Proporcione Empresa" required>
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
     
    var idEmpresaEdit = 0;    

    function clearform(){

        $('#formEmpresa')[0].reset();
        $('#grabarempresa').html('Grabar');
        $('#titleform').html('Nuevo Empresa');
        //$('.select2').val(null).trigger('change');
        //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');

    }
    
    function verEmpresa(idEmpresa,cat_empresa_nombre,cat_empresa_status,cat_empresa_fecharegistro,cat_empresa_fechaactualiza){

           clearform();
           $('#grabarempresa').html('Editar');
           $('#titleform').html('Editar Empresa');
           //$('#formUsuarios').validator('update');

           idEmpresaEdit = idEmpresa;

           $('#empresa').val(cat_empresa_nombre);
    }

    function eliminarEmpresa(id,status){     
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Catalogos_Empresa/Empresa_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);    

                        window.location=$("#baseUrl").val()+"Catalogos_Empresa/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
                $("#baseUrl").val()+"Catalogos_Empresa/Empresa_Nuevo", 
                {            
                  idEmpresa: idEmpresaEdit,
                  empresa: $('#empresa').val(),
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idEmpresaEdit = 0;
                          $('#formEmpresa')[0].reset();
                          $('#titleform').html('Nueva Empresa');
                          //$('.select2').val(null).trigger('change');
                          //$('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Catalogos_Empresa/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar La Empresa, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }
           
</script>