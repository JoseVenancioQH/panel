$('#padreMenu').change(function(){
    window.location = $("#baseUrl").val()+"Sistema_Permisos/index/"+$('#padreMenu').val();  
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