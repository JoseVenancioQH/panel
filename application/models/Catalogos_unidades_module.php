
<?php

Class Catalogos_Unidades_Module extends CI_Model {

	public function get_cat_catalogos($id) {
		
		// Query to check whether username already exist or not
		//$condition = ($id==0)?"":"cm.cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from($id);
		$this->db->where($id."_status = 1");
		$this->db->order_by($id."_fecharegistro", "desc");
		
		//if($condition)
		//$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();

		//var_dump($this->db->last_query());

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

	public function get_cat_modelo($id) {
		// Query to check whether username already exist or not
		;
		$this->db->select('*');
		$this->db->from('cat_modelos_unidades');
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

	/*public function catalogos_vincularpermisionario_get_autocomplet_placas($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(p.cat_placas_numero) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pe.cat_periodopago_nombre) LIKE \"%".strtoupper($query)."%\" OR ".					  
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_permisionario_id_permisionario as id,
						   
		$this->db->select('
						   p.cat_placas_id_placas as id,
						   CONCAT_WS(\' - \',
						   p.cat_placas_numero, 
						   pe.cat_periodopago_nombre, 		
						   zu.cat_zonas_unidades_nombre) as value
					  	');
		$this->db->from($table.' as p');
		$this->db->where("cat_placas_status = 1");
		//$this->db->from('cat_unidades as u');
		$this->db->join('cat_periodopago as pe', 'p.cat_placas_id_periodopago = pe.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_zonas_unidades as zu', 'p.cat_placas_id_base = zu.cat_zonas_unidades_id_zona', 'left');

		if($condition)
		$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();
		//var_dump($this->db->last_query());

		if ($query->num_rows() > 0) {
			// Query to insert data in database
			//$this->db->insert('usuarios', $data);
			//if ($this->db->affected_rows() > 0) {
			return $query->result();
			//}
		} else {
			return false;
		}
	}*/

	public function catalogos_unidades_insert($data) {
		// Query to check whether username already exist or not
		$condition = "cat_unidades_numeconomico = '".$data['cat_unidades_numeconomico']."'";
		
		$this->db->select('*');
		$this->db->from('cat_unidades');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		//var_dump($this->db->last_query());

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			//var_dump($data);
			$this->db->insert('cat_unidades', $data);
			if ($this->db->affected_rows() > 0) {
				$this->logs_controlplacas_module->logs_controlplacas("success","insert","cat_unidades",$data);
				return true;
			}
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","insert","cat_unidades",$data);
			return false;
		}
	}

	public function catalogos_unidades_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('cat_unidades_id_unidad', $id);
		$this->db->update('cat_unidades',$data);
		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_unidades",$data);
			return true;
		}else{
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_unidades",$data);
			return false;
		}

	}	

	public function catalogos_unidades_delete($data,$idunidad) {

		$this->db->where('cat_unidades_id_unidad', $idunidad);
		$this->db->update('cat_unidades', $data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","delete","cat_unidades",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_unidades",$data);
			return false;
			
        }

	}

	// Insert registration data in database
	public function get_catalogos_unidades($id) {
		// Query to check whether username already exist or not
		$condition = ($id==0)?"":"cm.cat_menu_id_padre = ".$id;
			$this->db->select('u.cat_unidades_id_unidad as cat_unidades_id_unidad,
							   u.cat_unidades_numeconomico as cat_unidades_numeconomico, 
							   u.cat_unidades_ano as cat_unidades_ano, 		
							   
							   u.cat_unidades_fecharegistro as cat_unidades_fecharegistro,
							   u.cat_unidades_fechaactualizada as cat_unidades_fechaactualizada, 
							   u.cat_unidades_status as cat_unidades_status,
							   mu.cat_marcas_unidades_nombre as cat_marcas_unidades_nombre,
							   mu.cat_marcas_unidades_id_marca as cat_unidades_id_marca,
							   mou.cat_modelos_unidades_nombre as cat_modelos_unidades_nombre,
							   mou.cat_modelos_unidades_id_modelo as cat_unidades_id_modelo,
							   
							   ru.cat_rol_unidades_nombre as cat_rol_unidades_nombre,
							   ru.cat_rol_unidades_id_rol as cat_unidades_id_rol,
							   su.cat_servicio_unidades_nombre as cat_servicio_unidades_nombre,
							   su.cat_servicio_unidades_id_servicio as cat_unidades_id_servicio,
							   zu.cat_zonas_unidades_nombre as cat_zonas_unidades_nombre,
							   zu.cat_zonas_unidades_id_zona as cat_unidades_id_zona,
							   al.cat_almacen_nombre as cat_almacen_nombre,
							   al.cat_almacen_id_almacen as cat_unidades_id_almacen,
							   em.cat_empresa_nombre as cat_empresa_nombre,
							   em.cat_empresa_id_empresa as cat_unidades_id_empresa
						  ');

		/*pu.cat_placas_numero as cat_placas_numero,
		pu.cat_placas_id_placas as cat_placas_id_placas,
		pu.cat_placas_numero as cat_unidades_placas,*/

		$this->db->from('cat_unidades as u');
		$this->db->join('cat_marcas_unidades as mu', 'u.cat_unidades_id_marca = mu.cat_marcas_unidades_id_marca', 'left');
		$this->db->join('cat_modelos_unidades as mou', 'u.cat_unidades_id_modelo = mou.cat_modelos_unidades_id_modelo', 'left');
		//$this->db->join('cat_placas_unidades as pu', 'u.cat_unidades_id_placas = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_rol_unidades as ru', 'u.cat_unidades_id_rol = ru.cat_rol_unidades_id_rol', 'left');
		$this->db->join('cat_servicio_unidades as su', 'u.cat_unidades_id_servicio = su.cat_servicio_unidades_id_servicio', 'left');
		$this->db->join('cat_empresa as em', 'u.cat_unidades_id_empresa = em.cat_empresa_id_empresa', 'left');
		$this->db->join('cat_almacen as al', 'u.cat_unidades_id_almacen = al.cat_almacen_id_almacen', 'left');
		$this->db->join('cat_zonas_unidades as zu', 'u.cat_unidades_id_zona = zu.cat_zonas_unidades_id_zona', 'left');
		
		$this->db->order_by("u.cat_unidades_id_unidad", "ASC");

		if($condition)
		$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();

		//var_dump($this->db->last_query());	

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

	public function scanear_string($string){
                        
 
        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                 "#", "@", "|", "!", "\"",
                 "·", "$", "%", "&", "/",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "]",
                 "+", "}", "{", "¨", "´",
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