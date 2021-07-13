
<?php 

    //Solo para tres niveles maximo
    //Se puede implementar un algoritmo recursivo, para n niveles, tipo arbol binario   

    $cadenaPrint = "";
    $listMenusItem_Nivel_1 = $this->menu_view->get_item_menu(0);      
    foreach($listMenusItem_Nivel_1 as $value_Nivel_1){

        $cadenaPrint .= '<li class="active treeview">';        
        $cadenaPrint .= '<a href="#">
                           
                            <div class="row">  

                                  <div class="col-md-3">
                                      <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-left"></i>
                                      </span>

                                      <label>
                                        
                                          <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red nodoPermiso" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_padre_id" name="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_padre" style="position: absolute; opacity: 0;" type="checkbox">

                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                          </div>

                                      </label>                           
                                  
                                      <i class="fa fa-dashboard"></i><span>'.$value_Nivel_1->cat_menu_nombre.'</span>                                    
                                  </div>

                                  <div class="col-md-9">

                                      <div class="row">

                                        <div class="col-md-3">
                                            <label>
                                                <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id.'_grabar" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red nodoPermiso" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_grabar_id" name="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_grabar" style="position: absolute; opacity: 0;" type="checkbox">

                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                    
                                                </div>
                                                Grabar
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                              <label>
                                                  <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id.'_editar" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red nodoPermiso" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_editar_id" name="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_editar" style="position: absolute; opacity: 0;" type="checkbox">

                                                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                      
                                                  </div>
                                                  Editar
                                              </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label>
                                                  <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id.'_borrar" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red nodoPermiso" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_borrar_id" name="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_borrar" style="position: absolute; opacity: 0;" type="checkbox">

                                                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                      
                                                  </div>
                                                  Borrar                                                                       
                                            </label>       
                                        </div>
                                     

                                        <div class="col-md-3">
                                            <label>
                                                  <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id.'_otro" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red nodoPermiso" name="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_otro" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_otro_id" style="position: absolute; opacity: 0;" type="checkbox">

                                                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                      
                                                  </div>
                                                  Otros                                                                       
                                            </label>       
                                        </div>

                                    </div>                                                                                             
                                        
                                </div>

                            </div>

                            <div class="row" id="permisos-extras_'.$value_Nivel_1->cat_menu_id.'" style="display:none;">                              

                            </div>

                         </a>';  
        /*
          <button type="button" class="btn btn-default btn-flat button-extras" id="extras_'.$value_Nivel_1->cat_menu_id.'">

            <i class="fa fa-align-center"></i>
            
          </button>   

        */

        /*  <div class="icheckbox_flat-green add-permisos" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red" id="'.$value_Nivel_1->cat_menu_nombre_clear."_".$value_Nivel_1->cat_menu_id.'_otro" style="position: absolute; opacity: 0;" type="checkbox">

            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
            
         </div>
         Otro*/

        /*<div class="col-md-3">

              <label>

                    <div class="icheckbox_flat-green add-permisos" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red" style="position: absolute; opacity: 0;" type="checkbox">

                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                        
                    </div>
                    Borrar                                    

              </label>    

              <button type="button" class="btn btn-default btn-flat">

                    <i class="fa fa-align-center"></i>

              </button> 

        </div>*/


        /*if(count($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id))==1){
            var_dump(count($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id)));
            var_dump($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id));
        }*/


        if($value_Nivel_1)    

            $listMenusItem_Nivel_2=$this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id);

            $iniItem=0;            

            if($listMenusItem_Nivel_2==TRUE){   

                $maxItem=count($listMenusItem_Nivel_2);

                foreach($listMenusItem_Nivel_2 as $valueSub_Nivel_2){                      
                    
                    $listMenusItem_Nivel_3=$this->menu_view->get_item_menu($valueSub_Nivel_2->cat_menu_id);     

                    if($listMenusItem_Nivel_3){
                        $cadenaPrint .= ($iniItem==0)? '<ul class="treeview-menu">':'';
                        
                        /*if($valueSub_Nivel_2){
                            $cadenaPrint .= '<li><a href="index2.html"><i class="fa fa-circle-o"></i>'.$valueSub_Nivel_2->cat_menu_nombre.'</a></li>';
                        }*/
                        
                        ////////////////////////////Segundo Nivel///////////////////////////////////////////
                        ///////////////////////////////////////////////////////////////////////////////////

                          
                        $cadenaPrint .= '<li class="treeview">';    
                        $cadenaPrint .= '<a href="#">
                                            <div class="row">

                                                <div class="col-md-3">

                                                      <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-left"></i>
                                                      </span>

                                                      <label>

                                                        <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_padre_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_padre" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                                        </div>

                                                      </label>

                                                      <i class="fa fa-circle-o"></i> <span>'.$valueSub_Nivel_2->cat_menu_nombre.'</span>
                                                    
                                                </div>

                                                <div class="col-md-9">

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>
                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_grabar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_grabar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_grabar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  
                                                              </div>
                                                              Grabar
                                                            </label>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>
                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_editar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_editar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_editar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  
                                                              </div>
                                                              Editar
                                                            </label>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>
                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_borrar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_borrar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_borrar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  
                                                              </div>
                                                              Borrar
                                                            </label>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>
                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_otro" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_otro_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_otro" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  
                                                              </div>
                                                              Otros
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                         </a>';   

                        foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_3){                                      
                            if($valueSub_Nivel_3){                  
                                $listMenusSub3Item=$this->menu_view->get_item_menu($valueSub_Nivel_3->cat_menu_id);
                                if(count($listMenusItem_Nivel_3)>0 && $listMenusItem_Nivel_3){
                                    $cadenaPrint .= '<ul class="treeview-menu">';
                                    foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_4){                           
                                        
                                              if($valueSub_Nivel_4){
                                            $cadenaPrint .= '<li>
                                                                <a href="#">
                                                                <div class="row">

                                                                  <div class="col-md-3">

                                                                      <label>
                                                                        <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_padre_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_padre" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                                                        </div>
                                                                      </label>

                                                                      <i class="fa fa-circle-o"></i>'.$valueSub_Nivel_4->cat_menu_nombre.

                                                                  '</div>

                                                                  <div class="col-md-9">

                                                                    <div class="row">

                                                                        <div class="col-md-3">
                                                                            <label>
                                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_grabar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_grabar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                                  
                                                                              </div>
                                                                              Grabar
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <label>
                                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_editar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_editar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                                  
                                                                              </div>
                                                                              Editar
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-3">

                                                                            <label>

                                                                              <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_borrar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_borrar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                                  
                                                                              </div>

                                                                              Borrar
                                                                            </label>

                                                                        </div>

                                                                        <div class="col-md-3">

                                                                            <label>

                                                                              <div class="icheckbox_flat-green add-permisos" style="position: relative;" aria-checked="false" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id.'_padre" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_otro_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id."-".$valueSub_Nivel_4->cat_menu_nombre.'_otro" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                                  
                                                                              </div>

                                                                              Otros
                                                                            </label>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                    
                                                                </div>



                                                                </a>
                                                            </li>';       
                                                      
                                        }
                                        
                                    }
                                    $cadenaPrint .= '</ul>';
                                }else{
                                    $cadenaPrint .= '<li>
                                                         <a href="">
                                                            <i class="fa fa-circle-o"></i> 
                                                         </a>
                                                     </li>';
                                }                                          
                            }
                        }

                        $cadenaPrint .= '</li>';

                        $iniItem++;
                        $cadenaPrint .= ($iniItem==$maxItem)?'</ul>':'';
                          
                        ////////////////////////////Tercer Nivel///////////////////////////////////////////
                        ///////////////////////////////////////////////////////////////////////////////////
                    }else{
                        $cadenaPrint .= ($iniItem==0)? '<ul class="treeview-menu">':'';
                        if($valueSub_Nivel_2){
                            $cadenaPrint .= '<li>
                                                <a href="#">
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>

                                                                  <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_padre" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_padre_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_padre" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  </div>

                                                            </label>
                                                            <i class="fa fa-circle-o"></i>'.$valueSub_Nivel_2->cat_menu_nombre.
                                                        '</div>

                                                        <div class="col-md-9">

                                                            <div class="row">

                                                                <div class="col-md-3">

                                                                    <label>

                                                                      <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_grabar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_grabar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_grabar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                          
                                                                      </div>
                                                                      Grabar

                                                                    </label>

                                                                </div>

                                                                <div class="col-md-3">

                                                                    <label>
                                                                      <div class="icheckbox_flat-green add-permisos"  id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_editar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_editar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_editar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                          
                                                                      </div>
                                                                      Editar
                                                                    </label>

                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label>
                                                                      <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_borrar" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_borrar_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_borrar" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                          
                                                                      </div>
                                                                      Borrar
                                                                    </label>
                                                                </div>  

                                                                <div class="col-md-3">
                                                                    <label>
                                                                      <div class="icheckbox_flat-green add-permisos" id="'.$value_Nivel_1->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id.'_otro" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_otro_id" name="'.$value_Nivel_1->cat_menu_id."-".$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id."-".$valueSub_Nivel_2->cat_menu_nombre.'_otro" class="flat-red nodoPermiso" style="position: absolute; opacity: 0;" type="checkbox">

                                                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                          
                                                                      </div>
                                                                      Otros
                                                                    </label>
                                                                </div>
                                                            </div>
                                                          </div>

                                                  </div>

                                                </a>'.
                                            '</li>';
                        }
                        $iniItem++;
                        $cadenaPrint .= ($iniItem==$maxItem)?'</ul>':'';
                    }
                  
                }
            }else{
               if($listMenusItem_Nivel_2==TRUE){ 
                    $cadenaPrint .= '<li>
                                        <a href="">
                                            <i class="fa fa-circle-o"></i>
                                        </a>
                                     </li>';
               }
            }     
     $cadenaPrint .= '</li>';                      
    }

    //echo $cadenaPrint;
    /*$fp = fopen('debuger_login.txt', 'w');
    fwrite($fp, $cadenaPrint);
    fclose($fp);*/

    echo $cadenaPrint;        

?>