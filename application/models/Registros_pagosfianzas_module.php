<?php

Class Registros_PagosFianzas_Module extends CI_Model {

	public function ver_pagosfianzas($id){

		// Query to check whether username already exist or not
		// UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";
						   
		$this->db->select('*');		
		$this->db->from("reg_pagosfianzas");		
		$this->db->where("reg_pagosfianzas_id_vincularfianza = ".$id);	

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

	public function get_registros_pagosfianzas_buscar($liststatusfianza=null,$id_operador=null,$fianza_afectado=null,$fianza_fecha=null,$tabulador=null,/*$fianzasStatus=null,*/$fianzasFechas=null) {

		// Query to check whether username already exist or not
		// UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$condition = "cat_statusfianzas_llave = 1";
		$this->db->select('*');
		$this->db->from('cat_statusfianzas');		
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		$llaveActiva = $query->row()->cat_statusfianzas_id_statusfianzas;

		if(isset($llaveActiva) && !is_null($llaveActiva)){
			$filtro[] = "vf.cat_vincularfianza_id_status = ".$llaveActiva;	
		}

		if(isset($liststatusfianza) && !is_null($liststatusfianza) && $liststatusfianza!=0){
			$filtro[] = "vf.cat_vincularfianza_id_status = ".$liststatusfianza;	
		}
		if(isset($fianza_afectado) && !is_null($fianza_afectado)){			
			$filtro[] = "UPPER(vf.cat_vincularfianza_nombreafectado) LIKE \"%".strtoupper($fianza_afectado)."%\"";	
		}
		if(isset($id_operador) && !is_null($id_operador) && $id_operador!=0){
			$filtro[] = "c.cat_operadores_id_operadores = ".$id_operador;
		}		

		//var_dump($fianza_afectado);

		if(!empty($fianza_fecha)){
			$arrayFecha = explode("-",$fianza_fecha);

			$fechainicio = $arrayFecha[0];
			$fechafin = $arrayFecha[1];

			$stringFecha = $fianzasFechas;

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
						   pf.reg_pagosfianzas_id_pagosfianzas,
						   pf.reg_pagosfianzas_id_vincularfianza,
						   pf.reg_pagosfianzas_consecutivo,						   
						   pf.reg_pagosfianzas_monto,
						   pf.reg_pagosfianzas_fecharegistro,
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
						   vf.cat_vincularfianza_fechaactualiza,
						   count(*) as numreg
					  	');

		$this->db->select_sum('reg_pagosfianzas_monto',' reg_pagosfianzas_monto_suma');
		$this->db->from('cat_vincularfianza as vf');		
		$this->db->join('reg_pagosfianzas as pf', 'vf.cat_vincularfianza_id_vincularfianza = pf.reg_pagosfianzas_id_vincularfianza', 'left');
		$this->db->join('cat_statusfianzas as sf', 'vf.cat_vincularfianza_id_status = sf.cat_statusfianzas_id_statusfianzas', 'left');
		$this->db->join('cat_operadores as c', 'vf.cat_vincularfianza_id_operadores = c.cat_operadores_id_operadores', 'left');
		if(!empty($condition)){$this->db->where($condition);}
		$this->db->group_by("vf.cat_vincularfianza_id_vincularfianza");		

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

	public function get_registros_pagosfianzas($table) {

		// Query to check whether username already exist or not
		// UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$condition = "cat_statusfianzas_llave = 1";
		$this->db->select('*');
		$this->db->from('cat_statusfianzas');		
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		$llaveActiva = $query->row()->cat_statusfianzas_id_statusfianzas;

		if(isset($llaveActiva) && !is_null($llaveActiva)){
			$filtro[] = "vf.cat_vincularfianza_id_status = ".$llaveActiva;	
		}

		$condition = ((count($filtro)>0)?implode(" AND ",$filtro):"");
				   
		$this->db->select('
						   pf.reg_pagosfianzas_id_pagosfianzas,
						   pf.reg_pagosfianzas_id_vincularfianza,
						   pf.reg_pagosfianzas_consecutivo,						   
						   pf.reg_pagosfianzas_monto,
						   pf.reg_pagosfianzas_fecharegistro,
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
						   vf.cat_vincularfianza_fechaactualiza,
						   count(*) as numreg
					  	');

		$this->db->select_sum('reg_pagosfianzas_monto',' reg_pagosfianzas_monto_suma');
		$this->db->from($table.' as vf');		
		$this->db->join('reg_pagosfianzas as pf', 'vf.cat_vincularfianza_id_vincularfianza = pf.reg_pagosfianzas_id_vincularfianza', 'left');
		$this->db->join('cat_statusfianzas as sf', 'vf.cat_vincularfianza_id_status = sf.cat_statusfianzas_id_statusfianzas', 'left');
		$this->db->join('cat_operadores as c', 'vf.cat_vincularfianza_id_operadores = c.cat_operadores_id_operadores', 'left');
		if(!empty($condition)){$this->db->where($condition);}
		$this->db->group_by("vf.cat_vincularfianza_id_vincularfianza");		

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

	public function registros_pagosfianzas_insert($data) {
		// Query to check whether username already exist or not
		$condition = "reg_pagosfianzas_id_vincularfianza =" . "'" .$data['reg_pagosfianzas_id_vincularfianza']. "'";
		$this->db->select('*');
		$this->db->from('reg_pagosfianzas');
		$this->db->select_max("reg_pagosfianzas_consecutivo");
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->row()){
			$data['reg_pagosfianzas_consecutivo'] = $query->row()->reg_pagosfianzas_consecutivo+1;
		}else{
			$data['reg_pagosfianzas_consecutivo'] = 1;
		}
		
		$this->db->insert('reg_pagosfianzas', $data);
		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","insert","reg_pagosfianzas",$data);
			return true;
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","insert","reg_pagosfianzas",$data);
			return false;
		}
		

	}

	public function regsitros_pagosfianzas_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('reg_pagosfianzas_id_pagosfianzas', $id);
		$this->db->update('reg_pagosfianzas',$data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","reg_pagosfianzas",$data);
			return true;
		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","update","reg_pagosfianzas",$data);
			return false;
		}

	}	

	public function registros_pagosfianzas_delete($data,$idpagosfianzas) {

		$this->db->where('reg_pagosfianzas_id_pagosfianzas', $idpagosfianzas);
		$this->db->update('reg_pagosfianzas', $data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","delete","reg_pagosfianzas",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","delete","reg_pagosfianzas",$data);
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