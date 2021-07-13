$(function () {  
	var treeData;
    
        $.ajax({
                type: "GET",  
                url: $("#baseUrl").val()+"Accion_Porcentaje/getItem_",
                dataType: "json",       
                success: function(response)  
                {
                   
                   initTree(response)
                }   
          });
    
  function initTree(treeData) {
    $('#treeview_json').treeview({data: treeData});
  }

});