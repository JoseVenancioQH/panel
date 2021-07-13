<?php

Class Menu_View extends CI_Model {

	// Insert registration data in database
	public function get_item_menu($id) {
		// Query to check whether username already exist or not
		$condition = "cat_menu_id_padre = ".$id." And cat_menu_status = 1";
		$this->db->select('*');
		$this->db->from('cat_menu');
		$this->db->where($condition);
		$this->db->order_by("cat_menu_orden_hijo", "ASC");
		//$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			// Query to insert data in database
			/*$this->db->insert('usuarios', $data);
			if ($this->db->affected_rows() > 0) {*/
			return $query->result();
			//}
		} else {
			return false;
		}
	}

	//echo menu view
	public function get_content_menu(){
    //Solo para tres niveles maximo
    //Se puede implementar un algoritmo recursivo, para n niveles, tipo arbol binario

    $cadenaPrint = "";
    $listMenusItem_Nivel_1 = $this->menu_view->get_item_menu(0);  

    foreach($listMenusItem_Nivel_1 as $value_Nivel_1){

        $cadenaPrint .= '<li class="active treeview" class="visibleMenu" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_menupadre">';
        $cadenaPrint .= '<a href="#">
                            <i class="fa fa-dashboard"></i> <span>'.$value_Nivel_1->cat_menu_nombre.'</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                         </a>';     

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
                        
                        ////////////////////////////Tercer Nivel///////////////////////////////////////////
                        ///////////////////////////////////////////////////////////////////////////////////

                          
                        $cadenaPrint .= '<li class="treeview visibleMenu" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_'.$valueSub_Nivel_2->cat_menu_id.'-'.$valueSub_Nivel_2->cat_menu_nombre.'_menuhijo">';    
                        $cadenaPrint .= '<a href="#">
                                            <i class="fa fa-circle-o"></i> <span>'.$valueSub_Nivel_2->cat_menu_nombre.'</span>
                                            <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                         </a>';   

                        foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_3){                                      
                            if($valueSub_Nivel_3){                  
                                $listMenusSub3Item=$this->menu_view->get_item_menu($valueSub_Nivel_3->cat_menu_id);
                                if(count($listMenusItem_Nivel_3)>0 && $listMenusItem_Nivel_3){
                                    $cadenaPrint .= '<ul class="treeview-menu">';
                                    foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_4){
                                                                         
                                        if($valueSub_Nivel_4){
                                            $cadenaPrint .= '<li class="visibleMenu" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_'.$valueSub_Nivel_2->cat_menu_id.'-'.$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id.'-'.$valueSub_Nivel_4->cat_menu_nombre.'_menuhijo">
                                                                <a href="'.load_class('Config')->config['base_url'].$valueSub_Nivel_4->cat_menu_link.'/index'.'/0/1/'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre.'_'.$valueSub_Nivel_2->cat_menu_id.'-'.$valueSub_Nivel_2->cat_menu_nombre."_".$valueSub_Nivel_4->cat_menu_id.'-'.$valueSub_Nivel_4->cat_menu_nombre.'">
                                                                    <i class="fa fa-circle-o"></i>'.$valueSub_Nivel_4->cat_menu_nombre.
                                                                '</a>'.
                                                            '</li>';                    
                                        }

                                    }
                                    $cadenaPrint .= '</ul>';
                                }else{
                                    $cadenaPrint .= '<li><a href=""><i class="fa fa-circle-o"></i> </a></li>';
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
                            $cadenaPrint .= '<li class="visibleMenu" id="'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id.'-'.$valueSub_Nivel_2->cat_menu_nombre."_menuhijo".'">'.
                                                '<a href="'.load_class('Config')->config['base_url'].$valueSub_Nivel_2->cat_menu_link.'/index'.'/0/1/'.$value_Nivel_1->cat_menu_id.'-'.$value_Nivel_1->cat_menu_nombre."_".$valueSub_Nivel_2->cat_menu_id.'-'.$valueSub_Nivel_2->cat_menu_nombre.'">'.
                                                    '<i class="fa fa-circle-o"></i>'.$valueSub_Nivel_2->cat_menu_nombre.
                                                '</a>'.
                                            '</li>';
                        }
                        $iniItem++;
                        $cadenaPrint .= ($iniItem==$maxItem)?'</ul>':'';
                    }
                }
            }else{
                if($listMenusItem_Nivel_2==TRUE){ 
                    $cadenaPrint .= '<li><a href=""><i class="fa fa-circle-o"></i> </a></li>';
                }
            }     
     $cadenaPrint .= '</li>';                      
    }

    //echo $cadenaPrint;
    /*$fp = fopen('debuger_login.txt', 'w');
    fwrite($fp, $cadenaPrint);
    fclose($fp);*/

    return  $cadenaPrint;

	}

	// Read data using username and password
	/*public function login($data) {
		$condition = "usuarios_nombre_sistema =" . "'" . $data['username'] . "' AND " . "usuarios_pass_sistema =" . "'" . $data['password'] . "'";
		$this->db->select('*');	
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		//var_dump($this->db->get());
		//exit;

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}*/

	// Read data from database to show data in admin page
	/*public function read_user_information($username) {

		$condition = "usuarios_nombre_sistema =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}*/

}

?>