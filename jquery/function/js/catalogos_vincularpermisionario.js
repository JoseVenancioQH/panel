$(function () {  

        var formGlobal = "";

        $( "input[type=text]" ).focus(function() {
          this.select();
        });

        $('#vincular_fechainicio').datepicker({
            autoclose: true
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
                    $("#vincular_permisionario_text").html(id_permisionario_text);                
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
                    $("#vincular_unidad_text").html(id_unidad_text);      

                    /*blockUI(true);
                    var jqxhr = $.post
                        (
                            $("#baseUrl").val()+"Catalogos_VincularPermisionario/Data_Unidad_Get", 
                            {            
                              id_unidad: id_unidad
                            },                
                            function(json) {

                                blockUI(false);
                                var data = JSON.parse(json)[0];  

                                if(data != false){

                                      id_placa = data.cat_placas_id_placas;
                                      $('#vincular_placa').val(data.cat_placas_numero);
                                      id_periodopago = data.cat_periodopago_id_periodopago;
                                      $('#vincular_periodopago').val(data.cat_periodopago_nombre);                  
                                      
                                }else{
                                      
                                      Message('messageAlertTable','Alerta!','Ocurrio un error, Existente, verifique...','7000','danger');  

                                }

                            })
                            .done(function() {
                                //alert( "second success" );
                            })
                            .fail(function(html) { 

                                Message('messageAlertTable','Alerta!','Ocurrio un error, Existente, verifique...','7000','danger');        
                                //alert( "error" );
                            })
                            .always(function() {
                                //alert( "finished" );
                            } 
                        );*/       
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
                $("#vincular_operador_text").html(id_operador_text);  
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
                $("#vincular_placa_text").html(id_placa_text);    
            }

        });

        $('#vincular_periodopago').typeahead({

            ajax: { 
                url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios_PeriodoPago?table=cat_periodopago",            
                method: 'GET',            
                triggerLength: 3,
                loadingClass: "loading"
            },
            displayField: 'value',    
            valueField: 'id',         
            onSelect: function(item) {
                id_periodopago = item.value;
                id_array_periodopago = item.text.split(" - ");        
                id_periodopago_text = id_array_periodopago[0];  
                $("#vincular_periodopago_text").html(id_periodopago_text);                  
            }
        });

        $('#vincular_cobro').typeahead({

            ajax: { 
                url: $("#baseUrl").val()+"Catalogos_VincularPermisionario/Permisionario_Get_Permisionarios_PeriodoCobro?table=cat_cobros",            
                method: 'GET',            
                triggerLength: 3,
                loadingClass: "loading"
            },
            displayField: 'value',    
            valueField: 'id',         
            onSelect: function(item) {
                id_cobro = item.value;
                id_array_cobro = item.text.split(" - ");        
                id_cobro_text = id_array_cobro[0]; 
                $("#vincular_cobro_text").html(id_cobro_text);
            }

        });

        $('#vincular_fechainicio').change(function(){
            $("#vincular_fechainicio_text").html(this.value);
        });

        $('#permisionario_tabulador').change(function(){
            buscar();
        });

});