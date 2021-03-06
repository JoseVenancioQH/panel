<?php

Class Catalogos_PeriodoPago_Module extends CI_Model {
	

	public function get_catalogos_periodopago($id) {
		// Query to check whether username already exist or not
		//$condition = ($id==0)?"":"cm.cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('cat_periodopago');
		$this->db->order_by("cat_periodopago_fecharegistro", "desc");
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

	public function catalogos_periodopago_insert($data) {
		// Query to check whether username already exist or not
		$condition = "cat_periodopago_nombre =" . "'" .$data['cat_periodopago_nombre']. "'";
		$this->db->select('*');
		$this->db->from('cat_periodopago');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			//var_dump($data);
			$this->db->insert('cat_periodopago', $data);
			if ($this->db->affected_rows() > 0) {
				$this->logs_controlplacas_module->logs_controlplacas("success","insert","cat_periodopago",$data);
				return true;
			}
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","insert","cat_periodopago",$data);
			return false;
		}
	}

	public function catalogos_periodopago_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('cat_periodopago_id_periodopago', $id);
		$this->db->update('cat_periodopago',$data);

		//var_dump($this->db->last_query());

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_periodopago",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_periodopago",$data);
			return false;
			
        }


	}	

	public function catalogos_periodopago_delete($data,$idperiodopago) {

		$this->db->where('cat_periodopago_id_periodopago', $idperiodopago);
		$this->db->update('cat_periodopago', $data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","delete","cat_periodopago",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_periodopago",$data);
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