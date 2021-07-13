$(function () {  
    
    if($('#permisosStatus').val()==0){

          $('.class-guardar').remove();
          $('.class-editar').remove();
          $('.class-borrar').remove();// en el caso de descativar un registro y pasa a estado borrado
          $('.class-desactivar').remove();//en el caso de activar un registro borrado        

    }

    $('#padre, #statusPermiso').change(function(){        

        window.location = $("#baseUrl").val()+"Sistema_Permisos/index/"+$('#padre').val()+'/'+$('#statusPermiso').val()+'/'+$('#listPermisos').val();  
        
    }); 

    $('.actualizarOrden').change(function(){ 

        if( VEntero($(this).prop("value")) ){  
            var idSplit = $(this).prop("id").split('_');

            ////// Buscar si existe algun cambio en los valores originales.
            ////// En add llantas, existe una funcion que busca dentro de un arreglo un objeto.
            ////// Solo enviar los cambios de orden para minimizar las inserciones en la bd.

            arrayOrden.push ({
                              id:idSplit[1],
                              valor:$(this).prop("value")
                            });
        }
        
    });   

});