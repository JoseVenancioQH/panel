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
        Perfiles
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Perfiles</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

              <div class="box-header">
                <h3 class="box-title">Lista de Perfiles</h3>
              </div>

              <div class="box-header">                  

                  <div class="col-md-12">  

                        <button type="button" class="btn btn-primary pull-right class-guardar" data-toggle="modal" data-target="#modal-agregar-perfil" onclick="javascript:idPerfilEdit = 0;clearform();">Agregar Perfil</button>                       

                  </div>                                        
               
              </div>

              <!-- /.box-header -->
              <div class="box-body table-responsive">

                <table id="tablaModulo" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th style="width:30%">Nombre Perfil</th>
                          <th style="width:50%">Permisos</th>
                          <th style="width:10%">Status</th>                  
                          <th style="width:20%">Acciones</th>                  
                      </tr>
                  </thead>
                  <tbody style="font-size: 15px;">
                      <?php                        
                          $arrayTable = $this->perfiles_module->get_perfiles_table(0);
                          //var_dump($this->permisos_module->get_permisos_tree(0));exit;                    
                          foreach($arrayTable as $rowPerfiles){
                                $arrayPermiso = json_decode($rowPerfiles->cat_perfiles_permisos);                                              

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
                               echo "<td>".$rowPerfiles->cat_perfiles_nombre."</td>";                                                             
                               echo "<td><div style=\"width:300px; height:60px; overflow:auto;\"><table>".$stringTable."</table></div></td>";
                               echo "<td>".(($rowPerfiles->cat_perfiles_status==1)?'Activo':'Inactivo')."</td>";                                                               
                               echo "<td><button class='btn-Primary class-editar' onclick='verPerfil(\"".$rowPerfiles->id_perfiles."\",\"".$rowPerfiles->cat_perfiles_nombre."\",\"".$rowPerfiles->cat_perfiles_nombre_clear."\",".json_encode($rowPerfiles->cat_perfiles_permisos).")' title='Editar Perfiles' data-toggle='modal' data-target='#modal-agregar-perfil' type='button'><i class='fa fa-edit'></i></button>";
                               echo "<button class='btn-".(($rowPerfiles->cat_perfiles_status==0)?"Success":"Danger")." ".(($rowPerfiles->cat_perfiles_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPerfil(".$rowPerfiles->id_perfiles.",".(($rowPerfiles->cat_perfiles_status==0)?1:0).")' title='Editar Usuario' type='button'><i class='fa fa-".(($rowPerfiles->cat_perfiles_status==0)?"check":"close")."'></i></button></td>";
                               
                               echo "</tr>";                               

                          }
                      ?>                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre Perfil</th>
                    <th>Permisos</th>
                    <th>Status</th>                    
                    <th>Acciones</th>                    
                  </tr>
                  </tfoot>
                </table>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="modal fade" id="modal-agregar-perfil">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Perfil</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>

                  <form id="formPerfil" class="submitForm" data-toggle="validator" role="form">

                      <div class="modal-header">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default pull-left" onclick="clearform()">Limpiar</button>
                        <div class="form-group">                          
                          <button type="submit" class="btn btn-primary pull-right" id="grabarperfil">Grabar</button>
                        </div>
                      </div>

                      <div class="box-body">

                          <div class="form-group has-feedback">

                              <label for="nombre_usuario_completo" class="control-label">Nombre del Perfil</label>
                              <input type="text" class="form-control" id="nombreperfil" placeholder="Nombre del Perfil" data-error="Proporcione nombre perfil" required>
                              <div class="help-block with-errors"></div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                          
                          
                          </div>                         

                          <div clas="row">
                              <div class="col-md-12">                                          
                                        <!-- iCheck -->
                                        <div class="box box-success">

                                                <div class="box-header">
                                                  <h3 class="box-title">Seleccione - Lista de Permisos para el Perfil</h3>
                                                </div>

                                                <div class="box-body">
                                                   <ul class="sidebar-menu" data-widget="tree" id="permisosArbol">
                                                    <li class="header">Menu Principal PERFIL</li>
                                                    <?php
                                                        $this->load->view('menu/view_permisos.php');
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
                  <h4 class="modal-title" id="titleform">Ayuda - Perfiles</h4>
                </div>

                <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Perfiles%20-%20Control%20Placas/Perfiles%20-%20Control%20Placas.html"></iframe>

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
      
    var idPerfilEdit = 0;
    

    function clearform(){

        $('#formPerfil')[0].reset();
        //$('#userempresa, #useralmacen').val(null).trigger('change');
        $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
        $('#grabarperfil').html('Grabar');
        $('#titleform').html('Nuevo Perfil');

    }
    
    function verPerfil(idPerfiles,cat_perfiles_nombre,cat_perfiles_nombre_clear,cat_perfiles_permisos){

       clearform();
       $('#grabarperfil').html('Editar');
       $('#titleform').html('Editar Perfil');
       //$('#formUsuarios').validator('update');

       idPerfilEdit = idPerfiles;
        
       $.each(JSON.parse(cat_perfiles_permisos), function(i,j) {           
            $('#'+j.replace(/\s/g, "\\ ").replace("%20", "\\ ")+'_id').iCheck('check');
       });

       $('#nombreperfil').val(cat_perfiles_nombre);      

    }

    function eliminarPerfil(id,status){
        blockUI(true);
        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Sistema_Perfiles/Perfil_Eliminar", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {

                        blockUI(false);                      

                        window.location=$("#baseUrl").val()+"Sistema_Perfiles/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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

        $(".nodoPermiso:checked").each(function() {                  
            var objName = $(this).prop('id');
            var arraySplit = objName.split('_id');//para quitar el _id de la cadena         
            arrayPermisos.push( arraySplit[0] );            
        });    

        if(arrayPermisos.length==0){
           Message('messageAlertModal','Alerta!','Imposible registrar El Perfil, Seleccione por lo menos un permiso, verifique...','7000','danger'); 
           return false;
        }

        /*$.each($('#useralmacen').select2('data'), function (i,j) {          
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
                $("#baseUrl").val()+"Sistema_Perfiles/Perfil_Nuevo", 
                {            
                  idPerfil: idPerfilEdit,
                  nomPerfil: $('#nombreperfil').val(),
                  permisos: JSON.stringify(arrayPermisos)                  
                },                
                function(html) {

                    blockUI(false);

                    var messageError = JSON.parse(html);  

                    if(html){
                      
                          idPerfilEdit = 0;
                          $('#formPerfil')[0].reset();                          

                          clearform();
                          $('#grabarperfil').html('Grabar');
                          $('#titleform').html('Nuevo Perfil');

                          //$('#userempresa, #useralmacen').val(null).trigger('change');
                          $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
                          window.location=$("#baseUrl").val()+"Sistema_Perfiles/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                          
                    }else{
                          
                          Message(messageError.class_message,messageError.short_message,messageError.long_message,messageError.time_message,messageError.type_message);  

                    }

                })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(html) { 

                    Message('messageAlertModal','Alerta!','Imposible registrar El Perfil, Existente, verifique...','7000','danger');        
                    //alert( "error" );
                })
                .always(function() {
                    //alert( "finished" );
                } 
            );                
    }       
</script>