<?php

Class Catalogos_VincularPermisionario_Module extends CI_Model {
	
	public function get_buscar_permisionarios($id_permisionario=null,$id_unidad=null,$id_operador=null,$id_placa=null,$id_periodopago=null,$id_cobro=null,$tabulador=null,$vincular_fechainicio=null) {
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
		if(isset($id_periodopago) && !is_null($id_periodopago) && $id_periodopago!=0){
			$filtro[] = "pp.cat_periodopago_id_periodopago = ".$id_periodopago;
		}
		if(isset($id_cobro) && !is_null($id_cobro) && $id_cobro!=0){
			$filtro[] = "co.cat_cobros_id_cobros = ".$id_cobro;
		}

		if(!empty($vincular_fechainicio)){

			//$arrayFecha = explode("-",$vincular_fechainicio);

			$fechainicio = $vincular_fechainicio;
			$fechafin = $vincular_fechainicio;

			$stringFecha = 'vp.cat_vincularpermisionario_fechainicio';

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
						   co.cat_cobros_id_cobros,
						   co.cat_cobros_nombre,
						   vp.cat_vincularpermisionario_fechainicio,
						   vp.cat_vincularpermisionario_fecharegistro,
						   vp.cat_vincularpermisionario_fechaactualiza,
						   vp.cat_vincularpermisionario_status
					  	");
		$this->db->from('cat_vincularpermisionario as vp');		
		$this->db->join('cat_permisionario as p', 'vp.cat_vincularpermisionario_id_permisionario = p.cat_permisionario_id_permisionario', 'left');		
		$this->db->join('cat_unidades as u', 'vp.cat_vincularpermisionario_id_unidad = u.cat_unidades_id_unidad', 'left');
		$this->db->join('cat_operadores as c', 'vp.cat_vincularpermisionario_id_operadores = c.cat_operadores_id_operadores', 'left');
		$this->db->join('cat_placas_unidades as pu', 'vp.cat_vincularpermisionario_id_placa = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_periodopago as pp', 'vp.cat_vincularpermisionario_id_periodopago = pp.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_cobros as co', 'vp.cat_vincularpermisionario_id_cobros = co.cat_cobros_id_cobros', 'left');
		$this->db->order_by("vp.cat_vincularpermisionario_fecharegistro, vp.cat_vincularpermisionario_fechaactualiza", "desc");
		if(!empty($tabulador)){$this->db->limit($tabulador);}
		if(!empty($condition)){$this->db->where($condition);}		

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

	public function catalogos_vincularpermisionario_get_autocomplet_unidad($idunidad){

		$this->db->select("						   
						   pu.cat_placas_id_placas,
						   pu.cat_placas_numero,
						   pp.cat_periodopago_id_periodopago,
						   pp.cat_periodopago_nombre,						   
					  	");
		$this->db->from('cat_unidades as u');		
		$this->db->join('cat_placas_unidades as pu', 'u.cat_unidades_id_placas = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_periodopago as pp', 'pu.cat_placas_id_periodopago = pp.cat_periodopago_id_periodopago', 'left');		
		$this->db->where("u.cat_unidades_id_unidad = ".$idunidad);
		
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
	
	public function catalogos_vincularpermisionario_get_autocomplet($query,$table,$campos) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$condition = ($query=="")?"":"UPPER(".$table."_nombre) LIKE \"%".strtoupper($query)."%\"";
		$this->db->select('cat_permisionario_id_permisionario as id,
						   CONCAT_WS(\' - \','.$campos.') as value');
		$this->db->from($table);
		$this->db->where($table."_status = 1");
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

	public function catalogos_vincularpermisionario_get_autocomplet_periodocobro($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(c.cat_cobros_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_cobros_porcentaje) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_cobros_porcentajedecimal) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_permisionario_id_permisionario as id,
						   
		$this->db->select('
						   c.cat_cobros_id_cobros as id,
						   CONCAT_WS(\' - \',
						   c.cat_cobros_nombre, 
						   c.cat_cobros_porcentaje,
						   c.cat_cobros_porcentajedecimal) as value
					  	');
		$this->db->from($table.' as c');
		//$this->db->from('cat_unidades as u');
		
		$this->db->where($table."_status = 1");
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

	public function catalogos_vincularpermisionario_get_autocomplet_periodopago($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(pp.cat_periodopago_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pp.cat_periodopago_periodo) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_permisionario_id_permisionario as id,
						   
		$this->db->select('
						   pp.cat_periodopago_id_periodopago as id,
						   CONCAT_WS(\' - \',
						   pp.cat_periodopago_nombre, 
						   pp.cat_periodopago_periodo) as value
					  	');
		$this->db->from($table.' as pp');
		//$this->db->from('cat_unidades as u');
		
		$this->db->where($table."_status = 1");
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

	public function catalogos_vincularpermisionario_get_autocomplet_placas($query,$table) {
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

	

	public function catalogos_vincularpermisionario_get_autocomplet_operadores($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(c.cat_operadores_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_operadores_telefono) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(c.cat_operadores_direccion) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_permisionario_id_permisionario as id,
						   
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

		$this->db->where($table."_status = 1");
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
	
	public function catalogos_vincularpermisionario_get_autocomplet_unidades($query,$table) {
		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";

		$stringLink = "UPPER(u.cat_unidades_numeconomico) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(u.cat_unidades_ano) LIKE \"%".strtoupper($query)."%\" OR ".
					  
					  "UPPER(mu.cat_marcas_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(pu.cat_placas_numero) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(ru.cat_rol_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(su.cat_servicio_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(zu.cat_zonas_unidades_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(al.cat_almacen_nombre) LIKE \"%".strtoupper($query)."%\" OR ".
					  "UPPER(em.cat_empresa_nombre) LIKE \"%".strtoupper($query)."%\"";


		$condition = ($query=="")?"":$stringLink;
		//$this->db->select('cat_permisionario_id_permisionario as id,
						   
		$this->db->select('
						   u.cat_unidades_id_unidad as id,
						   CONCAT_WS(\' - \',
						   u.cat_unidades_numeconomico, 
						   u.cat_unidades_ano, 		
						   pu.cat_placas_numero,
						   mu.cat_marcas_unidades_nombre,						   
						   mou.cat_modelos_unidades_nombre,						   
						   pu.cat_placas_numero,						   
						   ru.cat_rol_unidades_nombre,
						   su.cat_servicio_unidades_nombre,
						   zu.cat_zonas_unidades_nombre,
						   al.cat_almacen_nombre,
						   em.cat_empresa_nombre) as value
					  	');

		$this->db->where($table."_status = 1");
		$this->db->from($table.' as u');
		//$this->db->from('cat_unidades as u');
		$this->db->join('cat_marcas_unidades as mu', 'u.cat_unidades_id_marca = mu.cat_marcas_unidades_id_marca', 'left');
		$this->db->join('cat_modelos_unidades as mou', 'u.cat_unidades_id_modelo = mou.cat_modelos_unidades_id_modelo', 'left');
		$this->db->join('cat_placas_unidades as pu', 'u.cat_unidades_id_placas = pu.cat_placas_id_placas', 'left');
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




	public function get_catalogos_vincularpermisionario($table) {

		// Query to check whether username already exist or not
		//UPPER(numEconomico) LIKE '%".strtoupper($_GET['query'])."%'";
						   
		$this->db->select('
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
						   co.cat_cobros_id_cobros,
						   co.cat_cobros_nombre,
						   vp.cat_vincularpermisionario_fechainicio,
						   vp.cat_vincularpermisionario_fecharegistro,
						   vp.cat_vincularpermisionario_fechaactualiza,
						   vp.cat_vincularpermisionario_status
					  	');

		$this->db->from($table.' as vp');	
		//$this->db->where($table."_status = 1");	
		$this->db->join('cat_permisionario as p', 'vp.cat_vincularpermisionario_id_permisionario = p.cat_permisionario_id_permisionario', 'left');		
		$this->db->join('cat_unidades as u', 'vp.cat_vincularpermisionario_id_unidad = u.cat_unidades_id_unidad', 'left');
		$this->db->join('cat_operadores as c', 'vp.cat_vincularpermisionario_id_operadores = c.cat_operadores_id_operadores', 'left');
		$this->db->join('cat_placas_unidades as pu', 'vp.cat_vincularpermisionario_id_placa = pu.cat_placas_id_placas', 'left');
		$this->db->join('cat_periodopago as pp', 'vp.cat_vincularpermisionario_id_periodopago = pp.cat_periodopago_id_periodopago', 'left');
		$this->db->join('cat_cobros as co', 'vp.cat_vincularpermisionario_id_cobros = co.cat_cobros_id_cobros', 'left');
		$this->db->order_by("vp.cat_vincularpermisionario_fecharegistro, vp.cat_vincularpermisionario_fechaactualiza", "desc");

		

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

	public function catalogos_vincularpermisionario_insert($data) {
		// Query to check whether username already exist or not

		$condition = "cat_vincularpermisionario_id_permisionario = "."'".$data['cat_vincularpermisionario_id_permisionario']."' and ".
					 "cat_vincularpermisionario_id_unidad = " . "'" .$data['cat_vincularpermisionario_id_unidad']. "' and ".
					 "cat_vincularpermisionario_id_placa = " . "'" .$data['cat_vincularpermisionario_id_placa']. "' and ".
					 "cat_vincularpermisionario_id_periodopago = " . "'" .$data['cat_vincularpermisionario_id_periodopago']. "' and ".
					 "cat_vincularpermisionario_status = 1 and ".
					 "cat_vincularpermisionario_id_cobros = " . "'" .$data['cat_vincularpermisionario_id_cobros']. "'";

		$this->db->select('*');
		$this->db->from('cat_vincularpermisionario');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {

			// Query to insert data in database
			//var_dump($data);

			$this->db->select('*');
			$this->db->from('cat_vincularpermisionario');
			$this->db->where("cat_vincularpermisionario_id_placa = '" .$data['cat_vincularpermisionario_id_placa']. "'");			
			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				$this->db->where('cat_vincularpermisionario_id_placa', $data['cat_vincularpermisionario_id_placa']);
				$this->db->update('cat_vincularpermisionario',array('cat_vincularpermisionario_status'=>0,'cat_vincularpermisionario_fechainicio'=>null));

				$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_vincularpermisionario",array('cat_vincularpermisionario_status'=>0,'cat_vincularpermisionario_fechainicio'=>null)
																	);
			}

			$this->db->insert('cat_vincularpermisionario', $data);

			//if ($this->db->affected_rows() > 0) {

						/*$this->db->where('cat_unidades_id_unidad', $data['cat_vincularpermisionario_id_unidad']);
						$this->db->update('cat_unidades',array(
																'cat_unidades_id_placas'=>$data['cat_vincularpermisionario_id_placa']
															  )
										 );
						$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_unidades",array('cat_unidades_id_placas'=>$data['cat_vincularpermisionario_id_placa']));
						
						$this->db->where('cat_vincularpermisionario_id_permisionario', $data['cat_vincularpermisionario_id_permisionario']);
						$this->db->where('cat_vincularpermisionario_id_unidad', $data['cat_vincularpermisionario_id_unidad']);
						$this->db->where('cat_vincularpermisionario_id_permisionario', $data['cat_vincularpermisionario_id_placa']);
						$this->db->update('cat_vincularpermisionario',array(
																			'cat_vincularpermisionario_fechainicio'=>date("Y-m-d H:i:s", time())
																		   )
										 );*/						

				
			//}

			$this->logs_controlplacas_module->logs_controlplacas("success","insert","cat_vincularpermisionario",$data);				
			return true;


		} else {

			$this->logs_controlplacas_module->logs_controlplacas("error","insert","cat_vincularpermisionario",$data);
			return false;

		}
	}

	public function catalogos_vincularpermisionario_update($data,$id) {
		// Query to check whether username already exist or not

		$this->db->where('cat_vincularpermisionario_id_vincularpermisionario', $id);
		$this->db->update('cat_vincularpermisionario',$data);

		if ($this->db->affected_rows() > 0) {
			$this->logs_controlplacas_module->logs_controlplacas("success","update","cat_vincularpermisionario",$data);
			return true;

		} else {
			$this->logs_controlplacas_module->logs_controlplacas("error","update","cat_vincularpermisionario",$data);
			return false;
			
        }

	}	

	public function catalogos_vincularpermisionario_delete($data,$idvincularpermisionario) {

		if($data['cat_vincularpermisionario_status']==1){

			$this->db->select('*');
			$this->db->from('cat_vincularpermisionario');
			$this->db->where('cat_vincularpermisionario_id_vincularpermisionario', $idvincularpermisionario);		
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$this->db->where('cat_vincularpermisionario_id_placa', $query->row()->cat_vincularpermisionario_id_placa);
				$this->db->update('cat_vincularpermisionario',array('cat_vincularpermisionario_status'=>0,
																	'cat_vincularpermisionario_fechainicio'=>null
																	)
								 );

				$this->logs_controlplacas_module->logs_controlplacas(($this->db->affected_rows() > 0?"success":"error"),"delete","cat_vincularpermisionario",
																		array('cat_vincularpermisionario_status'=>0,
																			  'cat_vincularpermisionario_fechainicio'=>null,
																			  'cat_vincularpermisionario_id_placa'=>$query->row()->cat_vincularpermisionario_id_placa)
								 );

				$this->db->where('cat_vincularpermisionario_id_vincularpermisionario', $idvincularpermisionario);
				$this->db->update('cat_vincularpermisionario', $data);

				$this->logs_controlplacas_module->logs_controlplacas(($this->db->affected_rows() > 0?"success":"error"),"delete","cat_vincularpermisionario",$data);			

				return true;
			} else {

				$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_vincularpermisionario",$data);
				return false;

	        }

	    }else{
	    	$this->db->where('cat_vincularpermisionario_id_vincularpermisionario', $idvincularpermisionario);
			$this->db->update('cat_vincularpermisionario', $data);

			if($this->db->affected_rows() > 0){
				$this->logs_controlplacas_module->logs_controlplacas("success","delete","cat_vincularpermisionario",$data);
				return true;
			}else{
				$this->logs_controlplacas_module->logs_controlplacas("error","delete","cat_vincularpermisionario",$data);
				return false;
			}
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