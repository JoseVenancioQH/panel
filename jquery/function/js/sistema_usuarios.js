$(function () {   

    $('.button-extras').click(function(){
        if( $('#permisos-'+$(this).prop('id')).is(':visible')  ){
            $('#permisos-'+$(this).prop('id')).hide("slow");
        }else{          
            $('#permisos-'+$(this).prop('id')).show("slow");
        }
    });

    $('#listperfil').change(function(){
    	 $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');
         //alert($('#arrayPerfiles').val());
         var arrayElement = JSON.parse($('#arrayPerfiles').val());   
         //alert(arrayElement); 	 	
	   	 $.each(JSON.parse(arrayElement[$(this).val()]), function(i,j) {           
	        $('#'+j.replace(/\s/g, "\\ ")+'_id').iCheck('check');
	     });
    });

    var jqxhr = $.post
      (
        $("#baseUrl").val()+"Sistema_Usuarios/Usuarios_VerPermisos", 
        { 
            //id: id,
            //status: status
        },
        function(html) {

            $('#permisosUsuario').html(html);
            hasRadio();              
                     
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
        
});