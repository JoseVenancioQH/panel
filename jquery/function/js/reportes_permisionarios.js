$(function () {  

    $('.reportes_permisionarios_pagos').hide();

    /*$('#periodopago_fechainicio').datepicker({
	      autoclose: true,
	      dateFormat: 'dd/mm/yy'
    });*/

    $('#permisionario_fecha').daterangepicker(
        { 
            timePicker: true, 
            timePickerIncrement: 30, 
            locale:{format: 'YYYY/MM/DD hh:mm:ss'} 
        }
    ).val('').on('apply.daterangepicker', function(ev, picker) {
        //$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('#permisionario_fecha, #permisionario_tabulador').change(function(){
        buscar();
    });

    $('#vincular_permisionario').typeahead({
            ajax: { 
                url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios?table=cat_permisionario&campos=cat_permisionario_nombre,cat_permisionario_telefono,cat_permisionario_direccion",            
                method: 'GET',            
                triggerLength: 3,
                loadingClass: "loading",
            },
            displayField: 'value',    
            valueField: 'id',         
            onSelect: function(item) {                       
                id_permisionario = item.value;        
                id_array_permisionario = item.text.split(" - ");
                id_permisionario_text = id_array_permisionario[0];                
                buscar();
            }
    });

    $('#vincular_unidad').typeahead({
            ajax: { 
                url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios_Unidades?table=cat_unidades",            
                method: 'GET',            
                triggerLength: 3,
                loadingClass: "loading"
            },
            displayField: 'value',    
            valueField: 'id',         
            onSelect: function(item) {           
                id_unidad = item.value;        
                id_array_unidad = item.text.split(" - ");
                id_unidad_text = id_array_unidad[0];    
                buscar();    
            }
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
            buscar();       
        }

    });

    $('#vincular_placa').typeahead({

        ajax: { 
            url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios_Placas?table=cat_placas_unidades",            
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
            buscar();   
        }

    });    

});