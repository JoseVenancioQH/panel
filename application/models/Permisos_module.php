<?php

Class Permisos_Module extends CI_Model {

	// Insert registration data in database
	public function get_permisos($id) {
		// Query to check whether username already exist or not
		$condition = ($id==0)?"":"cm.cat_menu_id_padre = ".$id;
		$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
						   cm.cat_menu_id as cat_menu_id, 		
						   cm.cat_menu_nombre as cat_menu_nombre, 	
						   cm.cat_menu_id_padre as cat_menu_id_padre, 	
						   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
						   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
						   cm.cat_menu_class_padre as cat_menu_class_padre, 	
						   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
						   cm.cat_menu_link as cat_menu_link
						  ');
		$this->db->from('cat_menu as cm');
		$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id', 'left');
		$this->db->order_by("cat_menu_id_padre", "ASC");

		if($condition)
		$this->db->where($condition);
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

	// Insert registration data in database
	public function get_permisos_select($id) {

		$arrayPrint = array();

		$condition = "cm.cat_menu_id_padre = ".$id." ANd cm.cat_menu_status = 1";
		$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
						   cm.cat_menu_id as cat_menu_id, 		
						   cm.cat_menu_nombre as cat_menu_nombre, 	
						   cm.cat_menu_id_padre as cat_menu_id_padre, 	
						   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
						   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
						   cm.cat_menu_class_padre as cat_menu_class_padre, 	
						   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
						   cm.cat_menu_link as cat_menu_link
						  ');
		$this->db->from('cat_menu as cm');
		$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id', 'left');
		$this->db->order_by("cat_menu_id_padre", "ASC");
		$this->db->where($condition);
		
		$query = $this->db->get();		

		$listMenusItem_Nivel_1 = $query->result();

		foreach($listMenusItem_Nivel_1 as $value_Nivel_1){   					
					
			$arrayPrint[$value_Nivel_1->cat_menu_id] = $value_Nivel_1;

          	$condition = "cm.cat_menu_id_padre = ".$value_Nivel_1->cat_menu_id." ANd cm.cat_menu_status = 1";
			$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
			   cm.cat_menu_id as cat_menu_id, 		
			   cm.cat_menu_nombre as cat_menu_nombre, 	
			   cm.cat_menu_id_padre as cat_menu_id_padre, 	
			   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
			   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
			   cm.cat_menu_class_padre as cat_menu_class_padre, 	
			   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
			   cm.cat_menu_link as cat_menu_link
			  ');
			$this->db->from('cat_menu as cm');
			$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id', 'left');
			$this->db->order_by("cat_menu_id_padre", "ASC");
			$this->db->where($condition);

			$query = $this->db->get();

            $listMenusItem_Nivel_2=$query->result();                      

            foreach($listMenusItem_Nivel_2 as $valueSub_Nivel_2){

	           	if(isset($valueSub_Nivel_2)){

	            	$arrayPrint[$valueSub_Nivel_2->cat_menu_id] = $valueSub_Nivel_2;  

	            }

           	}
            		       
		}	

		return $arrayPrint;
	}

	// Insert registration data in database
	public function get_permisos_table($id,$status) {

		$arrayPrint = array();

		$condition = (($id!="" && $id!=0)?"cm.cat_menu_id_padre = ".$id:"");
		$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
						   cm.cat_menu_id as cat_menu_id, 		
						   cm.cat_menu_status as cat_menu_status, 		
						   cm.cat_menu_nombre as cat_menu_nombre, 	
						   cm.cat_menu_id_padre as cat_menu_id_padre, 	
						   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
						   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
						   cm.cat_menu_class_padre as cat_menu_class_padre, 	
						   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
						   cm.cat_menu_link as cat_menu_link
						  ');

		$this->db->from('cat_menu as cm');
		$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id','left');
		$this->db->where("cm.cat_menu_status = ".$status);
		
		$this->db->order_by("cat_menu_id_padre", "ASC");

		if(!empty($condition)){$this->db->where($condition);}	
		
		$query = $this->db->get();		

		//var_dump($this->db->last_query());

		$listMenusItem_Nivel_1 = $query->result();

		foreach($listMenusItem_Nivel_1 as $value_Nivel_1){   					
					
			$arrayPrint[] = $value_Nivel_1;

          	/*$condition = (($value_Nivel_1->cat_menu_id!="" && $value_Nivel_1->cat_menu_id!=0)?"cm.cat_menu_id_padre = ".$value_Nivel_1->cat_menu_id." And ":"")."cm.cat_menu_status = ".$status;
			$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
			   cm.cat_menu_id as cat_menu_id, 		
			   cm.cat_menu_status as cat_menu_status,
			   cm.cat_menu_nombre as cat_menu_nombre, 	
			   cm.cat_menu_id_padre as cat_menu_id_padre, 	
			   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
			   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
			   cm.cat_menu_class_padre as cat_menu_class_padre, 	
			   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
			   cm.cat_menu_link as cat_menu_link
			  ');
			$this->db->from('cat_menu as cm');
			$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id');
			$this->db->order_by("cat_menu_id_padre", "ASC");		
			$this->db->where($condition);
			$this->db->distinct();

			$query = $this->db->get();

            $listMenusItem_Nivel_2=$query->result();                      

            foreach($listMenusItem_Nivel_2 as $valueSub_Nivel_2){	

            	$arrayPrint[] = $valueSub_Nivel_2;    

            	$condition = (($valueSub_Nivel_2->cat_menu_id!="" && $valueSub_Nivel_2->cat_menu_id!=0)?"cm.cat_menu_id_padre = ".$valueSub_Nivel_2->cat_menu_id." And ":"")."cm.cat_menu_status = ".$status;            	
				$this->db->select('cm1.cat_menu_nombre as cat_menu_nombre_1, 
				   cm.cat_menu_id as cat_menu_id, 		
				   cm.cat_menu_status as cat_menu_status,
				   cm.cat_menu_nombre as cat_menu_nombre, 	
				   cm.cat_menu_id_padre as cat_menu_id_padre, 	
				   cm.cat_menu_orden_padre as cat_menu_orden_padre, 	
				   cm.cat_menu_orden_hijo as cat_menu_orden_hijo,
				   cm.cat_menu_class_padre as cat_menu_class_padre, 	
				   cm.cat_menu_class_hijo as cat_menu_class_hijo, 	
				   cm.cat_menu_link as cat_menu_link
				  ');
				$this->db->from('cat_menu as cm');
				$this->db->join('cat_menu as cm1', 'cm.cat_menu_id_padre = cm1.cat_menu_id');
				$this->db->order_by("cat_menu_id_padre", "ASC");				
				$this->db->where($condition);

				$query = $this->db->get();

	            $listMenusItem_Nivel_3=$query->result();   

	            foreach($listMenusItem_Nivel_3 as $valueSub_Nivel_3){

	            	$arrayPrint[] = $valueSub_Nivel_3;    

	            }
            }*/		       
		}
		return $arrayPrint;
	}

	public function permisos_insert($data) {
		// Query to check whether username already exist or not
		$condition = "cat_menu_nombre_clear =" . "'" .$this->scanear_string($data['cat_menu_nombre']). "'";
		$this->db->select('*');
		$this->db->from('cat_menu');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			
			// Query to insert data in database
			//var_dump($data);

			$this->db->insert('cat_menu', $data);
			if ($this->db->affected_rows() > 0) {
				$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_menu",$this->session->userdata['logged_in']['idusuario'],$data);
				return true;
			}

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_menu",$this->session->userdata['logged_in']['idusuario'],$data);
			return false;

		}
		
		

	}

	public function permisos_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('cat_menu_id', $id);
		$this->db->update('cat_menu',$data);
		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_menu",$this->session->userdata['logged_in']['idusuario'],$data);
			return true;
		}else{
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_menu",$this->session->userdata['logged_in']['idusuario'],$data);
			return false;
		}

	}

	public function permisos_orden_update($data) {
		// Query to update data in database				
		foreach (json_decode($data) as $key => $value) {
			$this->db->where('cat_menu_id', $value->id);
			$this->db->update('cat_menu',array('cat_menu_orden_hijo'=>$value->valor));	
		}		
		return true;
	}

	public function permisos_eliminar($id,$status) {
		// Query to update data in database	
		$this->db->where('cat_menu_id', $id);
		$this->db->update('cat_menu',array('cat_menu_status'=>$status));	
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}		
	}

	public function permisos_max_orden($id) {
		// Query to check whether username already exist or not

		$condition = "cat_menu_id_padre =" .$id;	

		$this->db->select_max('cat_menu_orden_hijo');
		$this->db->from('cat_menu');
		$this->db->where($condition);

		//$this->db->limit(1);	

		$indice = $this->db->get()->row_array();

		return $indice["cat_menu_orden_hijo"]+1;

		/*if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('cat_menu', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}-ABC02
		} else {
			return false;
		}*/
	}

	public function scanear_string($string){
                        
 
        $string = trim($string);

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??', '??'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extra??o
        $string = str_replace(
            array("\\", "??", "??", "-", "~",
                 "#", "@", "|", "!", "\"",
                 "??", "$", "%", "&", "/",
                 "(", ")", "?", "'", "??",
                 "??", "[", "^", "]",
                 "+", "}", "{", "??", "??",
                 ">", "< ", ";", ",", ":",
                 "."),
            '',
            $string
        );

        //Esta parte se encarga de sustituir los espacios en blanco por guiones
        $string = str_replace(array(" "),'-',$string);

        $string=strtolower($string);
        
        return $string;
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