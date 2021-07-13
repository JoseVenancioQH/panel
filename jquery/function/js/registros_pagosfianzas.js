$(function () {  

	 $('#fianza_operador').typeahead({

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
        }

    });        

    $('#fianza_fecha').daterangepicker(
        { 
            timePicker: true, 
            timePickerIncrement: 30, 
            autoUpdateInput: true,
            //format: "DD/MM/YYYY",
            locale:{
                format: 'YYYY/MM/DD hh:mm:ss',
                separator: " - ",
                applyLabel: "Aplicar",
                cancelLabel: "Cancelar",
                fromLabel: "DE",
                toLabel: "HASTA",
                customRangeLabel: "Custom",
                daysOfWeek: [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sáb"
                ],
                monthNames: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ]
            } 
        }
    ).val('').on('apply.daterangepicker', function(ev, picker) {
        //$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('#fianza_tabulador').change(function(){
        buscar();
    });
    

});