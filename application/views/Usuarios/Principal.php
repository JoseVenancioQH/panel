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
        Usuarios
        <small>Modulo</small>        
      </h1>      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Lista de Usuarios</h3>
            </div>

            <div class="box-header">
             <table class="pull-right">
               <tr>
                   <td>
                      <button type="button" class="btn btn-primary class-guardar" data-toggle="modal" data-target="#modal-agregar-usuario" onclick="javascript:idUsuarioEdit = 0;clearform();">Agregar Usuario</button>                      
                   </td>                   
               </tr>
             </table>                  
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table id="tablaModulo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre Usuario</th>
                    <th>Correo Electronico</th>
                    <th>Nombre de Usuario</th>
                    <th>Fecha Alta</th>
                    <th>Estado</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="font-size: 15px;">
                  <?php 

                   $Usuarios = $this->usuario_module->get_usuarios(0);

                   if(!empty($Usuarios)){  

                      foreach($Usuarios as $rowUsuario){

                        $arrayPermiso = json_decode($rowUsuario->usuarios_permisos);                                              

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
                        $stringTable .= "</tr>";                        

                        echo "<tr>";
                        echo "<td>".$rowUsuario->usuarios_nombre_completo."</td>";                     
                        echo "<td>".$rowUsuario->usuarios_correo_sistema."</td>";                     
                        echo "<td>".$rowUsuario->usuarios_nombre_sistema."</td>";                     
                        echo "<td>".$rowUsuario->usuarios_fechaalta."</td>";                     
                        echo "<td>".(($rowUsuario->usuarios_status==1)?'Activo':'Inactivo')."</td>";                     
                        echo "<td><div style=\"width:300px; height:60px; overflow:auto;\"><table>".$stringTable."</table></div></td>";
                        echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();blockUI(true);verUsuario(\"".$rowUsuario->usuarios_id_usuarios."\",\"".$rowUsuario->usuarios_nombre_completo."\",\"".$rowUsuario->usuarios_correo_sistema."\",\"".base64_decode($rowUsuario->usuarios_pass_sistema)."\",\"".$rowUsuario->usuarios_nombre_sistema."\",".json_encode($rowUsuario->usuarios_id_empresa).",".json_encode($rowUsuario->usuarios_id_almacen).",".json_encode($rowUsuario->usuarios_permisos).",".json_encode($rowUsuario->usuarios_id_perfil).")' title='Editar Usuario' data-toggle='modal' data-target='#modal-agregar-usuario' type='button'><i class='fa fa-edit'></i></button>";
                        echo "<button class='btn-".(($rowUsuario->usuarios_status==0)?"Success":"Danger")." ".(($rowUsuario->usuarios_id_usuarios==0)?"class-activar":"class-desactivar")."' onclick='eliminarUsuario(".$rowUsuario->usuarios_id_usuarios.",".(($rowUsuario->usuarios_status==0)?1:0).")' title='Editar Usuario' type='button'><i class='fa fa-".(($rowUsuario->usuarios_status==0)?"check":"close")."'></i></button></td>";                        
                        echo "</tr>";

                      }

                   }
                  
                  ?>                
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre Usuario</th>
                  <th>Correo Electronico</th>
                  <th>Nombre de Usuario</th>
                  <th>Fecha Alta</th>
                  <th>Estado</th>
                  <th>Permisos</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-usuario">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Usuario</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formUsuarios" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarusuario">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                            <div class="row">

                              <div class="form-group col-sm-12">
                                  <label for="Perfil" class="control-label">Perfil</label>
                                  <select id="listperfil" class="form-control" data-placeholder="Sel. Perfil" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Seleccione un perfil...</option> 

                                    <?php

                                      foreach($this->usuario_module->get_cat_perfiles(0) as $rowPerfiles){
                                         echo "<option value=\"".$rowPerfiles->id_perfiles."\">".$rowPerfiles->cat_perfiles_nombre."</option>";
                                         $arrayPerfiles[$rowPerfiles->id_perfiles] = $rowPerfiles->cat_perfiles_permisos;
                                         
                                      }
                                      echo "<input type=\"hidden\" id=\"arrayPerfiles\" name=\"arrayPerfiles\" value='".json_encode($arrayPerfiles)."'>";
                                      //var_dump(json_encode($arrayPerfiles));
                                    ?>

                                  </select>                              
                                  <div class="help-block">Seleccione un perfil</div>
                              </div>         

                            </div>                 
                          
                          </div>

                          <div class="form-group has-feedback">

                              <label for="nombre_usuario_completo" class="control-label">Nombre Completo del Usuario</label>
                              <input type="text" class="form-control" id="nomcompletousuario" placeholder="Nombre Usuario Completo" data-error="Proporcione nombre completo" required>
                              <div class="help-block with-errors"></div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                          
                          </div>

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="form-group col-xs-6 has-feedback">
                                  
                                    <label for="inputPassword" class="control-label">Nombre Usuario</label>
                                    <input type="text" data-minlength="6" class="form-control" id="nomusuario" placeholder="Nombre Usuario" data-error="Minimo 6 Caracteres" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" arisa-hidden="true"></span>
                                
                                </div>

                                <div class="form-group col-xs-6 has-feedback">

                                  <label for="inputPassword" class="control-label">Correo Electronico</label>                            
                                  <input type="email" class="form-control" id="correoelectronico" placeholder="Email" data-error="Dirección de correo electronica invalida" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                  
                                </div>

                            </div>

                          </div>

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="col-sm-6">
                                  <label for="pass" class="control-label">Contraseña</label>
                                  <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Contraseña" data-error="Minimo 6 caracteres" data-validate="true" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="col-sm-6">
                                  <label for="passc" class="control-label">Confirmar Contraseña</label>
                                  <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="No, coinciden Contraseñas, verifique" placeholder="Confirmar" data-validate="true" required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>

                          </div>

                          <div class="form-group">
                            
                            <div class="row">

                                <div class="form-group col-sm-6">
                                  <label for="empresa" class="control-label">Empresa</label>
                                  <select id="userempresa" class="form-control select2" multiple="multiple" data-placeholder="Sel. Empresa" style="width: 100%;" tabindex="-1" aria-hidden="true" required>                                
                                    <?php                  
                                      foreach($this->usuario_module->get_cat_empresa(0) as $rowEmpresa){
                                         echo "<option value=\"".$rowEmpresa->cat_empresa_id_empresa."\">".$rowEmpresa->cat_empresa_nombre."</option>";
                                      }
                                    ?>                                      
                                  </select>                              
                                  <div class="help-block">Seleccione Una Empresa, por lo menos</div>
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="almacen" class="control-label">Alamcen</label>                            
                                  <select id="useralmacen" class="form-control select2" multiple="multiple" data-placeholder="Sel. Almacen" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <?php                  
                                            foreach($this->usuario_module->get_cat_almacen(0) as $rowAlmacen){
                                               echo "<option value=\"".$rowAlmacen->cat_almacen_id_almacen."\">".$rowAlmacen->cat_almacen_nombre."</option>";
                                            }
                                          ?>                                     
                                  </select>
                                  <div class="help-block">Seleccione Un Almacen, por lo menos</div>
                                </div>

                            </div>

                          </div>

                          <div clas="row">
                              <div class="col-md-12">                                          
                                        <!-- iCheck -->
                                        <div class="box box-success">

                                                <div class="box-header">
                                                  <h3 class="box-title">Seleccione - Lista de Permisos</h3>
                                                </div>

                                                <div class="box-body">
                                                
                                                   <ul class="sidebar-menu" data-widget="tree" id="permisosArbol">
                                                    <li id="permisosUsuario" class="header">Menu Principal CONTROL PLACAS</li>
                                                    <?php
                                                        //$this->load->view('menu/view_permisos.php');
                                                    ?>
                                                    </ul>                                                    

                                                </div>                                                

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
          <div class="modal fade" id="modal-ver-ayuda">
            <div class="modal-dialog" style="width:95%;">
              <div class="modal-content" style="height:85%;">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Ayuda - Usuarios</h4>
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
     
    var idUsuarioEdit = 0;
    var arrayIdEmpresa = Array();
    var arrayIdAlmacen = Array();

    function clearform(){
      $('#formUsuarios')[0].reset();
      $('#userempresa, #useralmacen').val(null).trigger('change');
      $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
      $('#grabarusuario').html('Grabar');
      $('#titleform').html('Nuevo Usuario');
    }
    
    function verUsuario(idUsuario,usuarios_nombre_completo,usuarios_correo_sistema,usuarios_pass_sistema,usuarios_nombre_sistema,usuarios_id_empresa,usuarios_id_almacen,usuarios_permisos,usuarios_id_perfil){
         
         clearform();
         $('#grabarusuario').html('Editar');
         $('#titleform').html('Editar Usuario');
         //$('#formUsuarios').validator('update');

         idUsuarioEdit = idUsuario; 

         $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');       

         $.each(JSON.parse(usuarios_permisos), function(i,j) {           
                $('#'+j.replace(/\s/g, "\\ ")+'_id').iCheck('check').iCheck('update');
         });          

         $('#nomcompletousuario').val(usuarios_nombre_completo);
         $('#nomusuario').val(usuarios_nombre_sistema);
         $('#correoelectronico').val(usuarios_correo_sistema);      
         $('#userempresa').val(JSON.parse(usuarios_id_empresa));
         $('#userempresa').trigger('change');              
         $('#useralmacen').val(JSON.parse(usuarios_id_almacen));
         $('#useralmacen').trigger('change');
         $('#inputPassword').val(usuarios_pass_sistema);
         $('#inputPasswordConfirm').val(usuarios_pass_sistema);
         $('#listperfil').val(usuarios_id_perfil);  

          blockUI(false);


    }

    function eliminarUsuario(id,status){
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Sistema_Usuarios/Usuarios_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Sistema_Usuarios/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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
        
        var arrayPermisos = Array();
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
        });

        //alert(objectToArray($('#useralmacen').select2('data')));
        //alert(JSON.stringify(arrayIdEmpresa));
        
        blockUI(true);
        var jqxhr = $.post
            (
                $("#baseUrl").val()+"Sistema_Usuarios/Usuarios_Nuevo", 
                {            
                  idUsuario: idUsuarioEdit,
                  idPerfil: $('#listperfil').val(),
                  permisos: JSON.stringify(arrayPermisos),
                  username : $("#nomusuario").val(),
                  usercompletname : $("#nomcompletousuario").val(),                  
                  usermail: $("#correoelectronico").val(), 
                  userpass: $("#inputPassword").val(),
                  userempresa: JSON.stringify(arrayEmpresa),
                  useralmacen: JSON.stringify(arrayAlmacenes)
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(messageError.status!='fail'){
                          idUsuarioEdit = 0;
                          $('#formUsuarios')[0].reset();
                          $('#titleform').html('Nuevo Usuario');
                          $('#userempresa, #useralmacen').val(null).trigger('change');
                          $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Sistema_Usuarios/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);
                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar El Usuario, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }

           
</script>