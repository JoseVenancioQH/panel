<?php

Class Catalogos_Empresa_Module extends CI_Model {	

	public function get_catalogos_empresa($id) {
		// Query to check whether username already exist or not
		//$condition = ($id==0)?"":"cm.cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('pr2_category_lang');

		//if($condition)
		//$this->db->where($condition);
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

	public function catalogos_empresa_insert($data) {
		// Query to check whether username already exist or not
		$condition = "cat_empresa_nombre =" . "'" .$data['cat_empresa_nombre']. "'";
		$this->db->select('*');
		$this->db->from('cat_empresa');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			//var_dump($data);
			$this->db->insert('cat_empresa', $data);
			if ($this->db->affected_rows() > 0) {
				$this->logs_controlplacas_module->logs_controlplacas("success","insert","cat_empresa",$data);
				return true;
			}
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","insert","cat_empresa",$data);
			return false;
		}
	}

	public function catalogos_empresa_update($data,$id) {
		// Query to check whether username already exist or not
		$this->db->where('cat_empresa_id_empresa', $id);
		$this->db->update('cat_empresa',$data);
		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_empresa",$data);
			return true;
		}else{
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_empresa",$data);
			return false;
		}

	}	

	public function catalogos_empresa_delete($data,$idempresa) {

		$this->db->where('cat_empresa_id_empresa', $idempresa);
		$this->db->update('cat_empresa', $data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","delete","cat_empresa",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_empresa",$data);
			return false;
			
        }

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