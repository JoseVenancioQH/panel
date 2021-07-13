$(function () {  

    /*$.fn.modal.Constructor.prototype.enforceFocus = function() {};

    $('.button-extras').click(function(){
        if( $('#permisos-'+$(this).prop('id')).is(':visible')  ){
            $('#permisos-'+$(this).prop('id')).hide("slow");
        }else{          
            $('#permisos-'+$(this).prop('id')).show("slow");
        }
    });

    $('#listperfil').change(function(){
    	 $('input[type="checkbox"].flat-red, icheckbox_flat-green').iCheck('uncheck').iCheck('update');    	 
    	 var arrayElement = JSON.parse($('#arrayPerfiles').val());    	 	
	   	 $.each(JSON.parse(arrayElement[$(this).val()]), function(i,j) {           
	        $('#'+j.replace(/\s/g, "\\ ")+'_id').iCheck('check');
	     });
    });*/       

    /*$('#numplaca').typeahead({
        ajax: { 
            url: $("#baseUrl").val()+"Catalogos_Unidades/Permisionario_Get_Permisionarios_Placas?table=cat_placas_unidades",            
            method: 'GET',            
            triggerLength: 3,
            loadingClass: "loading"
        },
        displayField: 'value',    
        valueField: 'id',         
        onSelect: function(item) {
            id_placa = item.value;
            id_array_placa = item.text.split(" - ");
            id_placa_text = id_array_placa[0];       
        }
    });*/
});