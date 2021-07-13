  <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-//////////////////////////////////////////////////////////////////////////////////////////////-->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; <?php echo "2017 -".date("Y"); ?> <a href="-"> | </a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>  
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      

      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-FOOTER-//////////////////////////////////////////////////////////////////////////////////////////////-->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<?php

      $style_css = array(        
                           1  => 'jquery.min.js',
                           2  => 'bootstrap.min.js',
                           3  => 'jquery.dataTables.min.js',
                           4  => 'dataTables.bootstrap.js',
                           5  => 'jquery-ui.min.js',
                           //6=>'morris.min.js',
                           //7=>'dashboard.js', Grafico.........                                               
                           8  => 'raphael.min.js',                         
                           9  => 'jquery.sparkline.min.js',
                           10 => 'jquery-jvectormap-1.2.2.min.js',
                           11 => 'jquery-jvectormap-world-mill-en.js',
                           12 => 'jquery.knob.min.js',
                           13 => 'moment.min.js',
                           14 => 'daterangepicker.js',
                           15 => 'icheck.min.js',//checkbox
                           16 => 'bootstrap-datepicker.min.js',
                           17 => 'bootstrap3-wysihtml5.all.min.js',
                           18 => 'jquery.slimscroll.min.js',                       
                           19 => 'fastclick.js',
                           20 => 'adminlte.min.js',
                           //21=>'dashboard.js', Grafico..........                  
                           22 => 'demo.js',                        
                           23 => 'select2.full.min.js',
                           24 => 'validator.js',
                           25 => 'jquery.blockui.js',
                           26 => 'jquery.inputmask.js',   
                           27 => 'jquery.inputmask.date.extensions.js',    
                           28 => 'jquery.inputmask.extensions.js',
                           29 => 'bootstrap-typeahead.js',   
                           30 => 'plugins/purify.min.js',
                           31 => 'plugins/sortable.min.js',
                           32 => 'fileinput.js',                                    
                           33 => 'function/grl/principal.js',
                           34 => 'function/js/'.strtolower($modulo).'.js',
                           35 => 'bootstrap-treeview.js'                                                                                               
                        );

      //var_dump($modulo);

      foreach($style_css as $key=>$valor)
      {        
        echo '<script src="'.load_class('Config')->config['base_url'].'jquery/'.$valor.'"></script>';      
      }

?>

<script>

      function segmentarCad(cad){

          var arrayCad = cad.split("_");
          var arrayOut = Array();

          for (var i = 0; i < arrayCad.length-1; i++) {
              arrayOut.push(arrayCad[i]);            
          }
           
          return arrayOut.join("_");
          
      }

      function dataTableRefresh(orderColum){
        
          $('#tablaModulo, .tablaModulo').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true,
                    'iDisplayLength': 5,
                    "order": [[ $('#orderTABLE').val(), "desc" ]],
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
          });
          $('#tablaReporteTable').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true,
                    'iDisplayLength': -1,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
          });
      }

      var arrayOrden = Array();
      $.widget.bridge('uibutton', $.ui.button);
      
      $(function () {
              $('.select2').select2();  

              dataTableRefresh(3);     

              showPermisos(); 
          
              $('#messageAlert').hide();     
              
      });

      hasRadio();

      var arrayPermisos = JSON.parse( $('#permisosJson').val() );      

      $('.visibleMenu').hide().each(function(i,j){
          var elementId = $(this);

          $.each(arrayPermisos, function(ii,jj) {
              var jj_segmentada = segmentarCad(jj);
              var elementId_segmentada = segmentarCad(elementId.prop('id'));              
              if(jj_segmentada==elementId_segmentada){                
                elementId.show();
              }
          });      

      });
      
</script>

</body>
</html>