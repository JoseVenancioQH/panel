$(function () {
    $('.messages-menu, .notifications-menu, .tasks-menu, .tab-content, .control-sidebar-dark').hide();
    $('.submitForm').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
            Message('messageAlertModal','Alerta!','Información incompleta, verifique...','7000','danger');
            // handle the invalid form...
          } else {
            e.preventDefault();                          
            guardarDatos();                               
            // everything looks good! 
          }
    });    
    $.blockUI.defaults.baseZ = 4000;
    showPermisos();   
});

var isCheckedGlobal = true;
var reportes_fianzasStatus = "";
var reportes_fianzasFechas = "vf.cat_vincularfianza_fecharegistro";
var reportes_permisionarioStatus = "";
var reportes_permisionarioFechas = "vp.cat_vincularpermisionario_fechainicio";

function closeModal(id){
  $("#"+id).modal('hide');//ocultamos el modal
  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}


function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
    return true;
}  


function isNumericKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return true;
    return false;
} 

function ValidateControl(control,time)
{

    $('#'+control).css('background-color', '#e98a7e');
    setTimeout(function(){$('#'+control).css('background-color', '#ffffff');},time);   
             
}

function ValidateControlAll(control,time)
{

    $(control).css('background-color', '#e98a7e');
    setTimeout(function(){$(control).css('background-color', '#ffffff');},time);   
             
}

function VEntero(numero)
{

    return (numero!="" && !isNaN(numero) && (numero % 1 == 0))?true:false;   
             
}

function Indicador(id,color,time){

        $('#'+id).css('border-color', color);
        setTimeout(
                  function()
                            {
                              $('#'+id).css('border-color', '').val('');
                            },
                            time
        );
}

function Message(id,messageH,messageText,time,type){

        var classIcon = ((type=='danger')?'ban':((type=='success')?'check':((type=='info')?'info':'warning')));

        $('#'+id).addClass('alert alert-'+type+' alert-dismissible').html('<h4><i class="icon fa fa-'+classIcon+'"></i> '+messageH+'</h4>'+messageText).show();
        
        setTimeout(function(){$('#'+id).fadeOut().html('').removeClass('alert alert-'+type+' alert-dismissible');},time);

}

function blockUI(ban){    
      if(ban){
          $.blockUI({ 
                  css: { 
                          border: 'none', 
                          padding: '15px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '10px', 
                          '-moz-border-radius': '10px', 
                          opacity: .5, 
                          color: '#fff',
                          zIndex: 100000,
                          baseZ:100000
                       },
                  message: '<img src="'+$("#baseUrl").val()+'img/loader.gif" alt="Loading..." height="21" width="21"> Espere un momento, Por Favor...'
          });
      }else{          
          $.unblockUI();
      }
}

function hasRadio(){ 

        /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass   : 'iradio_minimal-blue'
        });

        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass   : 'iradio_minimal-red'
        });/*/

        $('input[type="radio"].flat-red').iCheck({   

              radioClass   : 'iradio_flat-green'

        }).on('ifClicked', function(e) {
                     
              switch (e.target.name) {
                  case "reporte_status":
                      reportes_fianzasStatus = e.target.value;
                      reportes_permisionarioStatus = e.target.value;
                      break;
                  case "reporte_fecha":
                      reportes_fianzasFechas = e.target.value;
                      reportes_permisionarioFechas = e.target.value;                      
                      break;
              }
              
              //cuando hay un cambio en los controles, se dispara el buscar;
              buscar();

        });


        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red').iCheck({

              checkboxClass: 'icheckbox_flat-green'  
                          
        }).on('ifClicked', function(e) {              

              isCheckedGlobal = e.target.checked;   

              var Checked = '';
              var arrayIdInput = Array();
              var arrayPermisos  = Array();
              var thisVar = $(this);            
              var arrayId = thisVar.prop('id').split('_');

              if(isCheckedGlobal==true){Checked = "uncheck"}else{Checked = "check"}              

              for (i = 0; i < arrayId.length-2; i++) {
                  //var idClear =  arrayId[i].split(' | ');             
                  arrayIdInput.push(arrayId[i]);
              }   

              $("input[name*='"+arrayIdInput.join('_')).each(function() {   
                                         
                  var objName = $(this).prop('name');                  
                  var arrayName = objName.split('_'); 
                  var i = 0; count = 0;

                  for (i = 0; i < arrayId.length-1; i++) {                                           
                      if($.inArray(arrayId[i],arrayName)>-1){
                          count++;
                      }
                  }

                  if(count==arrayId.length-1){
                      //alert(objName+' = '+arrayId.join('_'));
                      if(objName.replace(/\s/g, "\\ ")+'_id'!=arrayId.join('_').replace(/\s/g, "\\ ")){                          
                          $('#'+objName.replace(/\s/g, "\\ ")+'_id').iCheck(Checked);                         
                      }
                  }else{
                      if(arrayId[arrayId.length-2]=="padre"){                        
                          $('#'+objName.replace(/\s/g, "\\ ")+'_id, '+'#'+objName.replace(/\s/g, "\\ ")).iCheck(Checked);                          
                      }                      
                  }    

              });  
        });

}

function showPermisos()
{
      $(".class-guardar, .class-editar, .class-activar, .class-desactivar, .class-otros").hide();
      var cadenaPermiso = $('#listPermisos').val().replace(/\s/g, "\\ ").replace("%20", "\\ "); 

      /*if($.inArray(cadenaPermiso+"_grabar",JSON.parse($('#permisosJson').val().replace(/\s/g, "\\ ").replace("%20", "\\ ")))>-1){
          $(".class-guardar").show();
      }

      if($.inArray(cadenaPermiso+"_editar",JSON.parse($('#permisosJson').val().replace(/\s/g, "\\ ").replace("%20", "\\ ")))>-1){
        $(".class-editar").show();   
      }

      if($.inArray(cadenaPermiso+"_borrar",JSON.parse($('#permisosJson').val().replace(/\s/g, "\\ ").replace("%20", "\\ ")))>-1){
          $(".class-activar, .class-desactivar").show();
      }

      if($.inArray(cadenaPermiso+"_otro",JSON.parse($('#permisosJson').val().replace(/\s/g, "\\ ").replace("%20", "\\ ")))>-1){
          $(".class-otros").show();
      }*/

      $.each(JSON.parse($('#permisosJson').val()), function(i,j) {    
          //alert(j.replace(/\s/g, "\\ "));

          if(cadenaPermiso+"_grabar"==j.replace(/\s/g, "\\ ").replace("%20", "\\ ")){
            $(".class-guardar").show();        
          }

          if(cadenaPermiso+"_editar"==j.replace(/\s/g, "\\ ").replace("%20", "\\ ")){
            $(".class-editar").show();        
          }

          if(cadenaPermiso+"_borrar"==j.replace(/\s/g, "\\ ").replace("%20", "\\ ")){
            $(".class-activar, .class-desactivar").show();        
          }

          if(cadenaPermiso+"_otro"==j.replace(/\s/g, "\\ ").replace("%20", "\\ ")){
            $(".class-otros").show();        
          }
                   
          //$('#'+j.replace(/\s/g, "\\ ")+'_id').iCheck('check');

      });
      //alert($('#listPermisosAll').val());
}