<?php

Class Catalogos_VincularFianza_Module extends CI_Model {

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

	public function get_buscar_vincularfianzas($liststatusfianza=null,$tabulador=null,$vincular_convenio=null,$vincular_fechafianza=null,$vincular_nomafectado=null,$id_operador){
		// Query to check whether username already exist or not
		// UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$filtro = Array();		
	    
	    if(isset($liststatusfianza) && !is_null($liststatusfianza) && $liststatusfianza!=0){
			$filtro[] = "vf.cat_vincularfianza_id_status = ".$liststatusfianza;	
		}
		if(isset($id_operador) && !is_null($id_operador) && $id_operador!=0){
			$filtro[] = "c.cat_operadores_id_operadores = ".$id_operador;	
		}

		if(isset($vincular_convenio) && !is_null($vincular_convenio)){			
			$filtro[] = "UPPER(vf.cat_vincularfianza_noconvenio) LIKE \"%".strtoupper($vincular_convenio)."%\"";	
		}
		if(isset($vincular_nomafectado) && !is_null($vincular_nomafectado)){
			$filtro[] = "UPPER(vf.cat_vincularfianza_nombreafectado) LIKE \"%".strtoupper($vincular_nomafectado)."%\"";
		}		

		if(!empty($vincular_fechafianza)){
			

			$fechainicio = $vincular_fechafianza;
			$fechafin = $vincular_fechafianza;

			$stringFecha = 'vf.cat_vincularfianza_fecha';

			if(isset($fechainicio) && !empty($fechainicio)){
				if(isset($fechafin) && !empty($fechafin)){				
					$filtro[] = $stringFecha." BETWEEN '".date('Y-m-d', strtotime($fechainicio))."' AND '".date('Y-m-d', strtotime($fechafin))."'";				
				}else{
					$filtro[] = $stringFecha." BETWEEN '".date('Y-m-d', strtotime($fechainicio))."' AND '".date('Y-m-d', strtotime($fechafin))."'";				
				}
			}else{
				if(isset($fechafin) && !empty($fechafin)){				
					$filtro[] = $stringFecha." BETWEEN '".date('Y-m-d', strtotime($fechafin))."' AND '".date('Y-m-d', strtotime($fechafin))."'";				
				}
			}
		}		

		$condition = ((count($filtro)>0)?implode(" AND ",$filtro):"");

		$this->db->select('
							   vf.cat_vincularfianza_id_vincularfianza,
							   vf.cat_vincularfianza_noconvenio,
							   sf.cat_statusfianzas_id_statusfianzas,
							   sf.cat_statusfianzas_nombre,
							   vf.cat_vincularfianza_montopactado,
							   vf.cat_vincularfianza_fecha,
							   c.cat_operadores_id_operadores,
							   c.cat_operadores_nombre,
							   vf.cat_vincularfianza_nombreafectado,
							   vf.cat_vincularfianza_evidencia,
							   vf.cat_vincularfianza_status,
							   vf.cat_vincularfianza_fecharegistro,
							   vf.cat_vincularfianza_fechaactualiza
					  	');

		$this->db->from('cat_vincularfianza as vf');		
		$this->db->join('cat_statusfianzas as sf', 'vf.cat_vincularfianza_id_status = sf.cat_statusfianzas_id_statusfianzas', 'left');
		$this->db->join('cat_operadores as c', 'vf.cat_vincularfianza_id_operadores = c.cat_operadores_id_operadores', 'left');
		if(!empty($tabulador)){$this->db->limit($tabulador);}
		if(!empty($condition)){$this->db->where($condition);}	
		$this->db->order_by("vf.cat_vincularfianza_fecharegistro", "desc");
		
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
	
	public function catalogos_vincularfianza_get_autocomplet($query,$table,$campos) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$condition = ($query=="")?"":"UPPER(".$table."_nombre) LIKE \"%".strtoupper($query)."%\"";
		$this->db->select('cat_fianza_id_fianza as id,
						   CONCAT_WS(\' - \','.$campos.') as value');
		$this->db->from($table);
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

	public function catalogos_vincularfianza_get_autocomplet_periodocobro($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(c.cat_cobros_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_cobros_porcentaje) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_cobros_porcentajedecimal) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_fianza_id_fianza as id,
						   
		$this->db->select('
						   c.cat_cobros_id_cobros as id,
						   CONCAT_WS(\' - \',
						   c.cat_cobros_nombre, 
						   c.cat_cobros_porcentaje,
						   c.cat_cobros_porcentajedecimal) as value
					  	');
		$this->db->from($table.' as c');
		//$this->db->from('cat_unidades as u');
		

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

	public function catalogos_vincularfianza_get_autocomplet_periodopago($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(pp.cat_periodopago_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pp.cat_periodopago_periodo) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_fianza_id_fianza as id,
						   
		$this->db->select('
						   pp.cat_periodopago_id_periodopago as id,
						   CONCAT_WS(\' - \',
						   pp.cat_periodopago_nombre, 
						   pp.cat_periodopago_periodo) as value
					  	');
		$this->db->from($table.' as pp');
		//$this->db->from('cat_unidades as u');
		

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

	public function catalogos_vincularfianza_get_autocomplet_placas($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(p.cat_placas_numero) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pe.cat_periodopago_nombre) LIKE \"%".strtoupper($query)."%\" OR ".					  
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_fianza_id_fianza as id,
						   
		$this->db->select('
						   p.cat_placas_id_placas as id,
						   CONCAT_WS(\' - \',
						   p.cat_placas_numero, 
						   pe.cat_periodopago_nombre, 		
						   zu.cat_zonas_unidades_nombre) as value
					  	');
		$this->db->from($table.' as p');
		//$this->db->from('cat_unidades as u');
		$this->db->join('cat_periodopago as pe', 'p.cat_placas_id_periodopago = pe.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_zonas_unidades as zu', 'p.cat_placas_id_base = zu.cat_zonas_unidades_id_zona', 'left');

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

	

	public function catalogos_vincularfianza_get_autocomplet_operadores($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(c.cat_operadores_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_operadores_telefono) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_operadores_direccion) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_fianza_id_fianza as id,
						   
		$this->db->select('
						   c.cat_operadores_id_operadores as id,
						   CONCAT_WS(\' - \',
						   c.cat_operadores_nombre, 
						   c.cat_operadores_telefono, 		
						   c.cat_operadores_direccion,
						   zu.cat_zonas_unidades_nombre) as value
					  	');
		$this->db->from($table.' as c');
		//$this->db->from('cat_unidades as u');
		$this->db->join('cat_zonas_unidades as zu', 'c.cat_operadores_id_zona = zu.cat_zonas_unidades_id_zona', 'left');

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
	
	public function catalogos_vincularfianza_get_autocomplet_unidades($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(u.cat_unidades_numeconomico) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(u.cat_unidades_ano) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(u.cat_unidades_placas) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(mu.cat_marcas_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pu.cat_placas_numero) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(ru.cat_rol_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(su.cat_servicio_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(al.cat_almacen_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(em.cat_empresa_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_fianza_id_fianza as id,
						   
		$this->db->select('
						   u.cat_unidades_id_unidad as id,
						   CONCAT_WS(\' - \',
						   u.cat_unidades_numeconomico, 
						   u.cat_unidades_ano, 		
						   u.cat_unidades_placas,
						   mu.cat_marcas_unidades_nombre,						   
						   mou.cat_modelos_unidades_nombre,						   
						   pu.cat_placas_numero,						   
						   ru.cat_rol_unidades_nombre,
						   su.cat_servicio_unidades_nombre,
						   zu.cat_zonas_unidades_nombre,
						   al.cat_almacen_nombre,
						   em.cat_empresa_nombre) as value
					  	');
		$this->db->from($table.' as u');
		//$this->db->from('cat_unidades as u');
		$this->db->join('cat_marcas_unidades as mu', 'u.cat_unidades_id_marca = mu.cat_marcas_unidades_id_marca', 'left');
		$this->db->join('cat_modelos_unidades as mou', 'u.cat_unidades_id_modelo = mou.cat_modelos_unidades_id_modelo', 'left');
		$this->db->join('cat_placas_unidades as pu', 'u.cat_unidades_placas = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_rol_unidades as ru', 'u.cat_unidades_id_rol = ru.cat_rol_unidades_id_rol', 'left');
		$this->db->join('cat_servicio_unidades as su', 'u.cat_unidades_id_servicio = su.cat_servicio_unidades_id_servicio', 'left');
		$this->db->join('cat_empresa as em', 'u.cat_unidades_id_empresa = em.cat_empresa_id_empresa', 'left');
		$this->db->join('cat_almacen as al', 'u.cat_unidades_id_almacen = al.cat_almacen_id_almacen', 'left');
		$this->db->join('cat_zonas_unidades as zu', 'u.cat_unidades_id_zona = zu.cat_zonas_unidades_id_zona', 'left');

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

	public function get_catalogos_vincularfianza($table,$tabulador) {

		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";
						   
		$this->db->select('
						   vf.cat_vincularfianza_id_vincularfianza,
						   vf.cat_vincularfianza_noconvenio,
						   sf.cat_statusfianzas_id_statusfianzas,
						   sf.cat_statusfianzas_nombre,
						   vf.cat_vincularfianza_montopactado,
						   vf.cat_vincularfianza_fecha,
						   c.cat_operadores_id_operadores,
						   c.cat_operadores_nombre,
						   vf.cat_vincularfianza_nombreafectado,
						   vf.cat_vincularfianza_evidencia,
						   vf.cat_vincularfianza_status,
						   vf.cat_vincularfianza_fecharegistro,
						   vf.cat_vincularfianza_fechaactualiza
					  	');

		$this->db->from($table.' as vf');		
		$this->db->join('cat_statusfianzas as sf', 'vf.cat_vincularfianza_id_status = sf.cat_statusfianzas_id_statusfianzas', 'left');
		$this->db->join('cat_operadores as c', 'vf.cat_vincularfianza_id_operadores = c.cat_operadores_id_operadores', 'left');
		$this->db->order_by("vf.cat_vincularfianza_fecharegistro", "desc");
		if(!empty($tabulador)){$this->db->limit($tabulador);}

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

	public function catalogos_vincularfianza_insert($data) {

		// Query to check whether username already exist or not
		$condition = "cat_vincularfianza_noconvenio = "."'".$data['cat_vincularfianza_noconvenio']."' and ".
					 "cat_vincularfianza_montopactado = " . "'" .$data['cat_vincularfianza_montopactado']. "' and ".
					 "cat_vincularfianza_id_operadores = " . "'" .$data['cat_vincularfianza_id_operador']. "' and ".
					 "cat_vincularfianza_nombreafectado = " . "'" .$data['cat_vincularfianza_nombreafectado']. "'";

		$this->db->select('*');
		$this->db->from('cat_vincularfianza');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			//var_dump($data);
			$this->db->insert('cat_vincularfianza', $data);
			if ($this->db->affected_rows() > 0) {
				$this->logs_controlplacas_module->logs_controlplacas("success","insert","cat_vincularfianza",$data);
				return true;
			}
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","insert","cat_vincularfianza",$data);
			return false;
		}

	}

	public function catalogos_vincularfianza_update($data,$id) {
		// Query to check whether username already exist or not
		$this->db->where('cat_vincularfianza_id_vincularfianza', $id);
		$this->db->update('cat_vincularfianza',$data);
		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_vincularfianza",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_vincularfianza",$data);
			return false;
			
        }

	}	

	public function catalogos_vincularfianza_delete($data,$idvincularfianza) {
		$this->db->where('cat_vincularfianza_id_vincularfianza', $idvincularfianza);
		$this->db->update('cat_vincularfianza', $data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","delete","cat_vincularfianza",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_vincularfianza",$data);
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