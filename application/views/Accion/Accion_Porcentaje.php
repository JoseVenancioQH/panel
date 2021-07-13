<!DOCTYPE html>
<input type="hidden" id="baseUrl" value="<?php echo load_class('Config')->config['base_url']; ?>">
<input type="hidden" id="listPermisos" value="<?php echo $listPermisos; ?>">
<input type="hidden" id="padre" value="<?php echo $padre; ?>">
<input type="hidden" id="statusPermiso" value="<?php echo $statusPermiso; ?>">
<input type="hidden" id="orderTABLE" value="0">

<html>
<head>
   
</head>
<body>
  
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>PHP Codeigniter 3 - Create Dynamic Treeview Example - ItSolutionStuff.com</h1>
      
    </div>
    <div class="panel-body">
      <div class="col-md-8" id="treeview_json">
      </div>
    </div>
  </div>
</div>   
</body>
</html>