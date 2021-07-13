<?php

Class Reportes_Permisionarios_Module extends CI_Model {

	public function ver_pagospermisionarios($id){
		// Query to check whether username already exist or not
		// UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";
						   
		$this->db->select('*');		
		$this->db->from("reg_pagospermisionarios");		
		$this->db->where("reg_pagospermisionarios_id_vincularpermisionario = ".$id);	

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

	public function get_buscar_permisionarios($id_permisionario=null,$id_unidad=null,$id_operador=null,$id_placa=null,$tabulador=null,/*$fianzasStatus=null,*/$permisionarioFechas=null,$vincular_fechainicio=null) {

		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

        $filtro = Array(); 

		//var_dump($_REQUEST['lugarllanta']);
	    
	    if(isset($id_permisionario) && !is_null($id_permisionario) && $id_permisionario!=0){
			$filtro[] = "p.cat_permisionario_id_permisionario = ".$id_permisionario;	
		}
		if(isset($id_unidad) && !is_null($id_unidad) && $id_unidad!=0){
			$filtro[] = "u.cat_unidades_id_unidad = ".$id_unidad;	
		}
		if(isset($id_operador) && !is_null($id_operador) && $id_operador!=0){
			$filtro[] = "c.cat_operadores_id_operadores = ".$id_operador;
		}
		if(isset($id_placa) && !is_null($id_placa) && $id_placa!=0){
			$filtro[] = "pu.cat_placas_id_placas = ".$id_placa;
		}

		if(!empty($vincular_fechainicio)){

			$arrayFecha = explode("-",$vincular_fechainicio);

			$fechainicio = $arrayFecha[0];
			$fechafin = $arrayFecha[1];

			$stringFecha = $permisionarioFechas;

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
		//var_dump($condition);
		
		$q = 'SET GLOBAL group_concat_max_len=15000';
		$this->db->query($q);
						   
		$this->db->select("
						   vp.cat_vincularpermisionario_id_vincularpermisionario,
						   p.cat_permisionario_id_permisionario,
						   p.cat_permisionario_nombre,
						   u.cat_unidades_id_unidad,
						   u.cat_unidades_numeconomico,
						   c.cat_operadores_id_operadores,
						   c.cat_operadores_nombre,
						   pu.cat_placas_id_placas,
						   pu.cat_placas_numero,
						   pp.cat_periodopago_id_periodopago,
						   pp.cat_periodopago_nombre,
						   pp.cat_periodopago_periodo,
						   pp.cat_periodopago_diascondonados,
						   co.cat_cobros_id_cobros,
						   co.cat_cobros_nombre,
						   co.cat_cobros_porcentajedecimal,
						   vp.cat_vincularpermisionario_fechainicio,
						   vp.cat_vincularpermisionario_fecharegistro,
						   vp.cat_vincularpermisionario_fechaactualiza,
						   SUM(if(`rpp`.`reg_pagospermisionarios_tipo` = 1 ,`reg_pagospermisionarios_monto_cobro`,0)) as pagorenta,
						   SUM(if(`rpp`.`reg_pagospermisionarios_tipo` = 0 ,`reg_pagospermisionarios_monto_cobro`,0)) as pagorecargo,
						   vp.cat_vincularpermisionario_status,
						   GROUP_CONCAT(CONCAT_WS('', '{\"consecutivo\":\"', reg_pagospermisionarios_consecutivo, '\",\"monto\":\"',reg_pagospermisionarios_monto_cobro, '\",\"fecha\":\"',reg_pagospermisionarios_fechahora, '\",\"tipo\":\"',IF(reg_pagospermisionarios_tipo=1 ,\"Renta\", \"Recargo\"),'\"}') ORDER BY reg_pagospermisionarios_consecutivo SEPARATOR ',') as pagos,
						   count(*) as numreg
					  	");
		$this->db->select_sum('reg_pagospermisionarios_monto_cobro');	
		$this->db->from('cat_vincularpermisionario as vp');		
		$this->db->join('cat_permisionario as p', 'vp.cat_vincularpermisionario_id_permisionario = p.cat_permisionario_id_permisionario', 'left');		
		$this->db->join('cat_unidades as u', 'vp.cat_vincularpermisionario_id_unidad = u.cat_unidades_id_unidad', 'left');
		$this->db->join('cat_operadores as c', 'vp.cat_vincularpermisionario_id_operadores = c.cat_operadores_id_operadores', 'left');
		$this->db->join('cat_placas_unidades as pu', 'vp.cat_vincularpermisionario_id_placa = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_periodopago as pp', 'vp.cat_vincularpermisionario_id_periodopago = pp.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_cobros as co', 'vp.cat_vincularpermisionario_id_cobros = co.cat_cobros_id_cobros', 'left');
		$this->db->join('reg_pagospermisionarios as rpp', 'vp.cat_vincularpermisionario_id_vincularpermisionario = rpp.reg_pagospermisionarios_id_vincularpermisionario', 'left');
		if(!empty($tabulador)){$this->db->limit($tabulador);}
		if(!empty($condition)){$this->db->where($condition);}	
		$this->db->group_by("vp.cat_vincularpermisionario_id_vincularpermisionario");		

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

	public function get_registros_pagospermisionarios($table) {

		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";
		
		$q = 'SET GLOBAL group_concat_max_len=15000';
		$this->db->query($q);
						   
		$this->db->select("
						   vp.cat_vincularpermisionario_id_vincularpermisionario,
						   p.cat_permisionario_id_permisionario,
						   p.cat_permisionario_nombre,
						   u.cat_unidades_id_unidad,
						   u.cat_unidades_numeconomico,
						   c.cat_operadores_id_operadores,
						   c.cat_operadores_nombre,
						   pu.cat_placas_id_placas,
						   pu.cat_placas_numero,
						   pp.cat_periodopago_id_periodopago,
						   pp.cat_periodopago_nombre,
						   pp.cat_periodopago_periodo,
						   pp.cat_periodopago_diascondonados,
						   co.cat_cobros_id_cobros,
						   co.cat_cobros_nombre,
						   co.cat_cobros_porcentajedecimal,
						   vp.cat_vincularpermisionario_fechainicio,
						   vp.cat_vincularpermisionario_fecharegistro,
						   vp.cat_vincularpermisionario_fechaactualiza,
						   SUM(if(`rpp`.`reg_pagospermisionarios_tipo` = 1 ,`reg_pagospermisionarios_monto_cobro`,0)) as pagorenta,
						   SUM(if(`rpp`.`reg_pagospermisionarios_tipo` = 0 ,`reg_pagospermisionarios_monto_cobro`,0)) as pagorecargo,
						   vp.cat_vincularpermisionario_status,
						   GROUP_CONCAT(CONCAT_WS('', '{\"consecutivo\":\"', reg_pagospermisionarios_consecutivo, '\",\"monto\":\"',reg_pagospermisionarios_monto_cobro, '\",\"fecha\":\"',reg_pagospermisionarios_fechahora, '\",\"tipo\":\"',IF(reg_pagospermisionarios_tipo=1 ,\"Renta\", \"Recargo\"),'\"}') ORDER BY reg_pagospermisionarios_consecutivo SEPARATOR ',') as pagos,
						   count(`rpp`.`reg_pagospermisionarios_tipo`) as numreg
					  	");
		$this->db->select_sum('reg_pagospermisionarios_monto_cobro');	
		$this->db->from($table.' as vp');		
		$this->db->join('cat_permisionario as p', 'vp.cat_vincularpermisionario_id_permisionario = p.cat_permisionario_id_permisionario', 'left');		
		$this->db->join('cat_unidades as u', 'vp.cat_vincularpermisionario_id_unidad = u.cat_unidades_id_unidad', 'left');
		$this->db->join('cat_operadores as c', 'vp.cat_vincularpermisionario_id_operadores = c.cat_operadores_id_operadores', 'left');
		$this->db->join('cat_placas_unidades as pu', 'vp.cat_vincularpermisionario_id_placa = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_periodopago as pp', 'vp.cat_vincularpermisionario_id_periodopago = pp.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_cobros as co', 'vp.cat_vincularpermisionario_id_cobros = co.cat_cobros_id_cobros', 'left');
		$this->db->join('reg_pagospermisionarios as rpp', 'vp.cat_vincularpermisionario_id_vincularpermisionario = rpp.reg_pagospermisionarios_id_vincularpermisionario', 'left');
		$this->db->group_by("vp.cat_vincularpermisionario_id_vincularpermisionario");		

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

	public function registros_pagospermisionarios_insert($data) {
		// Query to check whether username already exist or not
		$condition = "reg_pagospermisionarios_id_vincularpermisionario =" . "'" .$data['reg_pagospermisionarios_id_vincularpermisionario']. "'";
		$this->db->select('*');
		$this->db->from('reg_pagospermisionarios');
		$this->db->select_max("reg_pagospermisionarios_consecutivo");
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->row()){
			$data['reg_pagospermisionarios_consecutivo'] = $query->row()->reg_pagospermisionarios_consecutivo+1;
		}else{
			$data['reg_pagospermisionarios_consecutivo'] = 1;
		}
		
		$this->db->insert('reg_pagospermisionarios', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function regsitros_pagospermisionarios_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('reg_pagospermisionarios_id_pagospermisionarios', $id);
		$this->db->update('reg_pagospermisionarios',$data);

	}	

	public function registros_pagospermisionarios_delete($data,$idpagospermisionarios) {

		$this->db->where('reg_pagospermisionarios_id_pagospermisionarios', $idpagospermisionarios);
		$this->db->update('reg_pagospermisionarios', $data);

		if ($this->db->affected_rows() > 0) {

			return true;

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