<?php

Class Productos_Registros_Module extends CI_Model {
	
	
	public function get_cat_cliente($id) {
		// Query to check whether username already exist or no
		$this->db->select('*');
		$this->db->from('cat_cliente');
		$this->db->where("cat_cliente_status = 1");
		//if($condition)$this->db->where($condition);
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

	// Insert registration data in database
	public function get_productos($id) {
		// Query to check whether username already exist or not
		$condition = ($id==0)?"":"cat_productos_id_cliente = ".$id;		
		$this->db->select('*');
		$this->db->from('cat_productos as p');
		
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


	public function get_cat_empresa($id) {
		// Query to check whether username already exist or not
		$condition = ($id==0)?"":"cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('cat_empresa');
		$this->db->where('cat_empresa_status = 1');
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

	public function get_cat_almacen($id) {
		// Query to check whether username already exist or not
		//$condition = ($id==0)?"":"cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('cat_almacen');
		$this->db->where('cat_almacen_status = 1');
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

	public function productos_insert($data) {		
		// Query to check whether username already exist or not

		$condition = "cat_productos_id_cliente =".$data['cat_productos_id_cliente']. " AND ".
					 "cat_productos_sku = '".$data['cat_productos_sku']. "'";
		$this->db->select('*');
		$this->db->from('cat_productos');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		var_dump($this->db->last_query());

		if ($query->num_rows() == 0) {
			
			// Query to insert data in database
			//var_dump($data);

			$this->db->insert('cat_productos', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}

		} else {

			return false;

		}

	}

	public function productos_update($data,$idproducto) {

		$this->db->where('cat_productos_id_productos', $idproducto);
		$this->db->update('cat_productos', $data);

		if ($this->db->affected_rows() > 0) {

			return true;

		} else {

			return false;
			
        }

	}

	public function productos_delete($data,$idproducto) {

		$this->db->where('cat_productos_id_productos', $idproducto);
		$this->db->update('cat_productos', $data);

		if ($this->db->affected_rows() > 0) {

			return true;

		} else {

			return false;
			
        }

	}

	

}

?>