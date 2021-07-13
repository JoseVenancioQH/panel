$(function () {  

    $('.reportes_fianzas_pagos').hide();

    $('#fianza_cliente').typeahead({

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
            id_operador_text = id_array_cliente[0];        
        }

    });        

    $('#fianza_fecha').daterangepicker(
        { 
            timePicker: true, 
            timePickerIncrement: 30, 
            locale:{format: 'YYYY/MM/DD hh:mm:ss'} 
        }
    ).val('').on('apply.daterangepicker', function(ev, picker) {
        //$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('#fianza_fecha, #liststatusfianza, #fianza_tabulador').change(function(){
        buscar();
    });

});