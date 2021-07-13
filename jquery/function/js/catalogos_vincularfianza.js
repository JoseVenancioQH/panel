$(function () {  

	var formGlobal = "";
    var idVinculacion_evidencia = 0;

    $( "input[type=text]" ).focus(function() {
      this.select();
    });

    $('#vincular_fechafianza').datepicker({
	      autoclose: true,
	      dateFormat: 'dd/mm/yy'
    });

    $('#vincular_operador').typeahead({

        ajax: { 
            url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios_Operadores?table=cat_operadores",            
            method: 'GET',            
            triggerLength: 3,
            loadingClass: "loading"
        },
        displayField: 'value',    
        valueField: 'id',         
        onSelect: function(item) {           
            id_operador = item.value;
            id_array_operador = item.text.split(" - ");        
            id_operador_text = id_array_operador[0];    
            $('#vincular_operador_text').html(id_operador_text);    
        }

    });    

    $('#vincularfianza_tabulador').change(function(){
        buscar();
    });    

    /*$('#vincularfianza_tabulador,#liststatusfianza').change(function(){
        buscar();
    });*/

});

