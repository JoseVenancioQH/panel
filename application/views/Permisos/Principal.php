<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="orderTABLE" value="0">


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
        Permisos
        <small>Modulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Permisos</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <div id="messageAlertTable" class="" style="">                  
    </div>

    <!-- Main content -->
    <section class="content">     
      
          <div class="box">

              <div class="box-header">
                <h3 class="box-title">Lista de Permisos</h3>
              </div>

              <div class="box-header">
               
                  <div class="col-md-3">

                 
                 
                      <select name="padre" id="padre" class="form-control" required>
                          <option value="0">Selecciona Padre Menu...</option>
                          <?php foreach ($this->permisos_module->get_permisos_select(0) as $key=>$value){                            
                              if($value->cat_menu_id_padre==0 || $value->cat_menu_link=="-"){?>
                              <option value="<?=$key?>" <?=($padre==$key)?'selected':''?> ><?=$value->cat_menu_nombre?></option>
                              <?php } } ?>      
                      </select> 

                  </div>      

                  <div class="col-md-3">   

                      <select name="statusPermiso" id="statusPermiso" class="form-control" required>                            
                            <option value="1" <?=($statusPermiso==1)?"selected":""?>>Permisos (Activos)</option>
                            <option value="0" <?=($statusPermiso==0)?"selected":""?>>Permisos (Inactivo)</option>                            
                      </select>                    

                  </div>      

                  <div class="col-md-6">  

                      <button type="button" onclick='javascript:idActualizarGlobal = 0;verPermisos("","","0")' class="btn btn-primary pull-right class-guardar" data-toggle="modal" data-target="#modal-agregar-permiso">Agregar Permiso</button> 
                      <button type="button" class="btn btn-Danger pull-right class-guardar" onclick="guardarOrden()">Guardar Orden</button>     

                  </div>                                        
               
              </div>

              <!-- /.box-header -->
              <div class="box-body table-responsive">

                <table id="tablaModulo" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th style="width:10%">Padre</th>
                          <th style="width:20%">Nombre</th>
                          <!--<th>Orden Padre</th>-->
                          <th style="width:20%">Orden </th>
                          <!--<th>Class Padre</th>-->
                          <!--<th>Class Hijo</th>-->
                          <th style="width:20%">Acceso Controlador</th>
                          <th style="width:15%">Acciones</th>                  
                      </tr>
                  </thead>
                  <tbody style="font-size: 15px;">
                      <?php                       
                          //var_dump($statusPermiso); 
                          $arrayOrdentable = $this->permisos_module->get_permisos_table($padre,$statusPermiso);
                          
                          //var_dump($this->permisos_module->get_permisos_tree(0));exit;                    
                          foreach($arrayOrdentable as $rowPermisos){
                               echo "<tr>";
                               echo "<td>".$rowPermisos->cat_menu_nombre_1."</td>";                                                    
                               echo "<td>".$rowPermisos->cat_menu_nombre."</td>";                                                      
                               //echo "<td>".$rowPermisos->cat_menu_orden_padre."</td>";                     
                               echo "<td><input maxlength='20' class='form-control actualizarOrden' id='permisoOrden_".$rowPermisos->cat_menu_id."' placeholder='' value='".$rowPermisos->cat_menu_orden_hijo."' type='text'></td>";                     
                               //echo "<td>".$rowPermisos->cat_menu_class_padre."</td>";                     
                               //echo "<td>".$rowPermisos->cat_menu_class_hijo."</td>";                     
                               echo "<td>".$rowPermisos->cat_menu_link."</td>";                     
                               echo "<td><button class='btn-Primary class-editar' onclick='verPermisos(\"".$rowPermisos->cat_menu_nombre."\",\"".$rowPermisos->cat_menu_link."\",\"".$rowPermisos->cat_menu_id."_".$rowPermisos->cat_menu_id_padre."_".$rowPermisos->cat_menu_orden_padre."_".$rowPermisos->cat_menu_orden_hijo."\")' title='Editar Permiso' data-toggle='modal' data-target='#modal-agregar-permiso' type='button'><i class='fa fa-edit'></i></button>";
                               echo "<button class='btn-".(($rowPermisos->cat_menu_status==0)?"Success":"Danger")." ".(($rowPermisos->cat_menu_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPermisos(".$rowPermisos->cat_menu_id.",".(($rowPermisos->cat_menu_status==0)?1:0).")' title='Editar Permiso' type='button'><i class='fa fa-".(($rowPermisos->cat_menu_status==0)?"check":"close")."'></i></button></td>";
                               echo "</tr>";                               
                          }
                      ?>                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Padre</th>
                    <th>Nombre</th>
                    <!--<th>Orden Padre</th>-->
                    <th>Orden </th>
                    <!--<th>Class Padre</th>-->
                    <!--<th>Class Hijo</th>-->
                    <th>Acceso Controlador</th>
                    <th>Acciones</th> 
                  </tr>
                  </tfoot>
                </table>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->       

          <div class="modal fade" id="modal-agregar-permiso">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="titleform">Nuevo Permiso</h4>
                </div>

                <div id="messageAlertModal" class="" style="">                  
                </div>                

                <div class="modal-header">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="grabarPermiso" class="btn btn-primary pull-right" onclick="grabarPermiso()">Grabar</button>               
                </div>

                <div class="modal-body">

                    <form role="form" id="formPermisos">

                      <div class="box-body">

                            <div clas="row">

                                  <div class="col-md-12">                                          
                                            <!-- iCheck -->
                                            <div class="box box-success ">
                                                    <div class="box-header">
                                                      <h3 class="box-title">Seleccione Nodo - Agregar Nuevo Permiso</h3>
                                                    </div>                                                    

                                                    <div class="box-body">
                                                       <ul class="sidebar-menu" data-widget="tree" id="permisosArbol">
                                                          <!--<li class="header">Seleccione un Nodo Padre</li>-->

                                                          <?php
                                                              //$this->load->view('menu/view_permisos_agregar.php');
                                                          ?>

                                                       </ul>                                                    
                                                    </div>                                                                
                                            </div>                                         
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="nombrePermiso">Nombre Permiso</label>
                                      <input class="form-control" id="nomPermiso" placeholder="Nombre Permiso" type="text">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="accesoControlador">Acceso a Controlador</label>
                                      <input class="form-control" id="accesoControlador" placeholder="Liga o Vinculo" type="text">
                                    </div>
                                  </div>

                            </div>                  
                        
                      </div> 

                    </form>

                </div>
                
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
                  <h4 class="modal-title" id="titleform">Ayuda - Permisos</h4>
                </div>

                <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Permisos%20-%20Control%20Placas/Control%20Placas%20-%20Permisos.html"></iframe>

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
      
    var statusOperacion = "";   
    var idActualizarGlobal = 0;

    function clearform(){

        $('#formPermisos')[0].reset();
        //$('#userempresa, #useralmacen').val(null).trigger('change');
        $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
        $('#grabarPermiso').html('Grabar');
        $('#titleform').html('Nuevo Permiso');

    }

    function verPermisos(nombrePermiso,nombreLink,id){  

        if(id=="0"){$('#grabarPermiso').html('Grabar');$('#titleform').html('Nuevo Permiso');statusOperacion='grabar';}else{$('#grabarPermiso').html('Editar');$('#titleform').html('Editar Permiso');statusOperacion='editar';}
        
        var jqxhr = $.post
                (
                    $("#baseUrl").val()+"Sistema_Permisos/view_permisos_agregar", 
                    { 
                        id: id
                    },
                    function(html) {                        
                        $('#permisosArbol').html('<li class="header">Seleccione un Nodo Padre</li>'+html);                          
                        hasRadio();
                        var idSplitAG = id.split('_');
                        idActualizarGlobal = idSplitAG[0];
                        //alert( "success" );
                        //Message('messageAlertTable','Exitoso!','Actualización de orden...','7000','success');
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
        
       $('#nomPermiso').val(nombrePermiso);
       $('#accesoControlador').val(nombreLink);
    }

    function buscar(){
      
    }

    function eliminarPermisos(id,status){

        var jqxhr = $.post
              (
                    $("#baseUrl").val()+"Sistema_Permisos/eliminarPermiso", 
                    { 
                        id: id,
                        status: status
                    },
                    function() {                      

                        window.location=$("#baseUrl").val()+"Sistema_Permisos/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();                     

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

    function guardarOrden(){ 

            var banDanger = true;         

            $('.actualizarOrden').each(function(i,val){

                    if( !VEntero( $(this).prop("value") ) || $(this).prop("value")=="" ){           

                        Message('messageAlertTable','Verificar!','Solo Números Enteros y No Blancos...','7000','danger');
                        Indicador($(this).prop("id"),'red','7000');    
                        arrayOrden = [];
                        banDanger = false;
                        return false;
                    }  

            }); 

            if(arrayOrden.length > 0){

              var jqxhr = $.post
                  (
                        $("#baseUrl").val()+"Sistema_Permisos/registrarOrden", 
                        { 
                          jsonOrden: JSON.stringify(arrayOrden)
                        },
                        function() {
                            //alert( "success" );
                            Message('messageAlertTable','Exitoso!','Actualización de orden...','7000','success');
                            window.location=$("#baseUrl").val()+"Sistema_Permisos/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();
                        })
                        .done(function() {
                            //alert( "second success" );
                        })
                        .fail(function() {
                            Message('messageAlertTable','Error!','Al actualizar datos...','7000','danger');
                        })
                        .always(function() {
                            //alert( "finished" );
                        }
                  );
            }else{
                if(banDanger)
                      Message('messageAlertTable','Información!','Sin Datos para actualizar, Verifique...','7000','info');
            }

            arrayOrden = [];
    }

    function grabarPermiso(){

        if($("#nomPermiso").val()!=''){
            /*if($("#accesoControlador").val()=='' && $('input[name="permisoadd"]:checked').prop("id")!="-1_-1_-1_-1")
              {
                Message('messageAlertModal','Alerta!','Imposible registrar un NOMBRE DE PERMISO, Solo Nodo padre y nombre de controlador blanco, verifique...','7000','danger');
                return false;
              }*/
            if($('input[name="permisoadd"]:checked').prop("id")){
                var idSplit = ($('input[name="permisoadd"]:checked').prop("id")!="-1_-1_-1_-1")?$('input[name="permisoadd"]:checked').prop("id").split('_'):Array(0,1,0,0);      
                var jqxhr = $.post
                (
                    $("#baseUrl").val()+"Sistema_Permisos/registrarPermiso", 
                    {            
                          statusOperacion: statusOperacion,
                          idActualizarGlobal: idActualizarGlobal,
                          nomPermiso: $("#nomPermiso").val(), 
                          accesoControlador: $("#accesoControlador").val(),
                          cat_menu_id: idSplit[0],
                          cat_menu_id_padre: idSplit[1],
                          cat_menu_orden_padre: idSplit[2],
                          cat_menu_orden_hijo: idSplit[3]                         
                    },
                    function(html) {        

                        if(html || statusOperacion=="editar"){

                              $('#permisosArbol').html('<li class="header">Seleccione un Nodo Padre</li>' + html);
                              hasRadio();
                              Message('messageAlertModal','Exitoso!','Operación realizada con exito...','7000','success');
                              window.location=$("#baseUrl").val()+"Sistema_Permisos/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();

                        }else{

                              Message('messageAlertModal','Alerta!','Imposible registrar un NOMBRE DE PERMISO, Existente, verifique...','7000','danger');  

                        }   

                    })
                    .done(function() {
                        //alert( "second success" );
                    })
                    .fail(function() {
                        Message('messageAlertModal','Alerta!','Imposible registrar un NOMBRE DE PERMISO, Existente, verifique...','7000','danger');        
                        //alert( "error" );
                    })
                    .always(function() {
                        //alert( "finished" );
                    } 
                );
            }else{
                Message('messageAlertModal','Alerta!','Proporcione un nodo padre, verifique...','7000','danger');
            }
        }else{
              Message('messageAlertModal','Información!','Proporcione Nombre del Permiso y Acceso al Controlador, verifique...','7000','info');    
        }
    }       
</script>