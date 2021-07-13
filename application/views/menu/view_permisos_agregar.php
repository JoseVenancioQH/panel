<?php 

    //Solo para tres niveles maximo
    //Se puede implementar un algoritmo recursivo, para n niveles, tipo arbol binario    

    $cadenaPrint = "";
    $listMenusItem_Nivel_1 = $this->menu_view->get_item_menu(0);    

    $id_array = (isset($id)?explode('_',$id):"");
    $id = (isset($id_array[1])?$id_array[1]:0);    

    $cadenaPrint .= '<li class="active treeview">';        
    $cadenaPrint .= '<a href="#">
                        <div class="row">

                            <div class="col-md-3">                              

                                <label>
                                  
                                      <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="-1_-1_-1_-1" name="permisoadd" class="flat-red" style="position: absolute; opacity: 0;" type="radio" '.(($id=="0")?'checked="checked"':"").'>

                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                      </div>

                                </label>                           
                            
                                <i class="fa fa-dashboard"></i><span>Nuevo Padre Raiz</span>
                                
                            </div>                               

                        </div>
                     </a>';    
    $cadenaPrint .= '</li>'; 

    foreach($listMenusItem_Nivel_1 as $value_Nivel_1){

        $id_find = $value_Nivel_1->cat_menu_id."_".$value_Nivel_1->cat_menu_id_padre."_".$value_Nivel_1->cat_menu_orden_padre."_".$value_Nivel_1->cat_menu_orden_hijo;        
        $id_find_ = $value_Nivel_1->cat_menu_id;        

        $cadenaPrint .= '<li class="active treeview">';        
        $cadenaPrint .= '<a href="#">
                            <div class="row">

                                <div class="col-md-6">

                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>

                                    <label>
                                      
                                      <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$id_find.'" name="permisoadd" class="flat-red" style="position: absolute; opacity: 0;" type="radio" '.(($id==$id_find_)?'checked="checked"':"").'>

                                          <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                      </div>

                                    </label>                           
                                
                                    <i class="fa fa-dashboard"></i><span>'.$value_Nivel_1->cat_menu_nombre.'</span>
                                    
                                </div>                               

                            </div>
                         </a>';   

        /*if(count($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id))==1){
            var_dump(count($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id)));
            var_dump($this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id));
        }*/


        if($value_Nivel_1 && $value_Nivel_1->cat_menu_id!=0)    

            $listMenusItem_Nivel_2=$this->menu_view->get_item_menu($value_Nivel_1->cat_menu_id);
        
            $iniItem=0;            

            if($listMenusItem_Nivel_2 == TRUE){ 

                $maxItem=count($listMenusItem_Nivel_2);                  

                foreach($listMenusItem_Nivel_2 as $valueSub_Nivel_2){                      
                    
                    $listMenusItem_Nivel_3=$this->menu_view->get_item_menu($valueSub_Nivel_2->cat_menu_id);     

                    if($listMenusItem_Nivel_3 == TRUE){
                        $cadenaPrint .= ($iniItem==0)? '<ul class="treeview-menu">':'';
                        
                        /*if($valueSub_Nivel_2){
                            $cadenaPrint .= '<li><a href="index2.html"><i class="fa fa-circle-o"></i>'.$valueSub_Nivel_2->cat_menu_nombre.'</a></li>';
                        }*/
                        
                        ////////////////////////////Segundo Nivel///////////////////////////////////////////
                        ///////////////////////////////////////////////////////////////////////////////////

                        $id_find = $valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id_padre."_".$valueSub_Nivel_2->cat_menu_orden_padre."_".$valueSub_Nivel_2->cat_menu_orden_hijo;
                        $id_find_ = $valueSub_Nivel_2->cat_menu_id;                  

                        $cadenaPrint .= '<li class="treeview">';    
                        $cadenaPrint .= '<a href="#">
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <span class="pull-right-container">
                                                      <i class="fa fa-angle-left pull-right"></i>
                                                    </span>

                                                    <label>
                                                          <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$id_find.'" name="permisoadd" class="flat-red" style="position: absolute; opacity: 0;" type="radio" '.(($id==$id_find_)?'checked="checked"':"").'>

                                                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>

                                                          </div>
                                                    </label>

                                                    <i class="fa fa-circle-o"></i> <span>'.$valueSub_Nivel_2->cat_menu_nombre.'</span>
                                                    
                                                </div>                                                

                                            </div>
                                         </a>';   

                        foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_3){                                      
                            if($valueSub_Nivel_3 && $valueSub_Nivel_3->cat_menu_id!=0){                  
                                $listMenusSub3Item=$this->menu_view->get_item_menu($valueSub_Nivel_3->cat_menu_id);
                                if(count($listMenusItem_Nivel_3)>0 && $listMenusItem_Nivel_3==TRUE){
                                    $cadenaPrint .= '<ul class="treeview-menu">';
                                    foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_4){                           
                                        
                                              if($valueSub_Nivel_4){
                                                $id_find = $valueSub_Nivel_4->cat_menu_id."_".$valueSub_Nivel_4->cat_menu_id_padre."_".$valueSub_Nivel_4->cat_menu_orden_padre."_".$valueSub_Nivel_4->cat_menu_orden_hijo; 
                                                $id_find_ = $valueSub_Nivel_4->cat_menu_id;
                                              

                                                $cadenaPrint .= '<li>
                                                                    <a href="#">
                                                                    <div class="row">

                                                                        <div class="col-md-6">

                                                                            <label>
                                                                              <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$id_find.'" name="permisoadd" class="flat-red" style="position: absolute; opacity: 0;" type="radio" disabled="disabled">

                                                                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                              </div>
                                                                            </label>

                                                                            <i class="fa fa-circle-o"></i>'.$valueSub_Nivel_4->cat_menu_nombre.

                                                                        '</div>                                                             
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
                            $id_find = $valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id_padre."_".$valueSub_Nivel_2->cat_menu_orden_padre."_".$valueSub_Nivel_2->cat_menu_orden_hijo;                             
                            $id_find_ = $valueSub_Nivel_2->cat_menu_id;                            

                            $cadenaPrint .= '<li>
                                                <a href="#">
                                                    <div class="row">                                                                
                                                        <div class="col-md-6">
                                                            <label>

                                                                  <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input id="'.$valueSub_Nivel_2->cat_menu_id."_".$valueSub_Nivel_2->cat_menu_id_padre."_".$valueSub_Nivel_2->cat_menu_orden_padre."_".$valueSub_Nivel_2->cat_menu_orden_hijo.'" name="permisoadd" class="flat-red" style="position: absolute; opacity: 0;" type="radio" '.(($id==$id_find_)?'checked="checked"':"").'>

                                                                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                                  </div>

                                                            </label>
                                                            <i class="fa fa-circle-o"></i>'.$valueSub_Nivel_2->cat_menu_nombre.
                                                        '</div>

                                                   </div>
                                                </a>'.
                                            '</li>';
                        }
                        $iniItem++;
                        $cadenaPrint .= ($iniItem==$maxItem)?'</ul>':'';
                    }
                  
                }
            }else{
               if($listMenusItem_Nivel_2 == TRUE){ 
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