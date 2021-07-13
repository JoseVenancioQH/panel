<?php

Class Catalogos_Module extends CI_Model {

	// Insert registration data in database
	public function get_usuarios($id) {
		// Query to check whether username already exist or not
		$condition = ($id==0)?"":"cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->order_by("usuarios_fechaalta", "desc");

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
		//$condition = ($id==0)?"":"cat_menu_id_padre = ".$id;
		$this->db->select('*');
		$this->db->from('cat_empresa');
		$this->db->order_by("cat_empresa_fecharegistro", "desc");
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
		$this->db->order_by("cat_almacen_fecharegistro", "desc");
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

	public function usuarios_insert($data) {
		// Query to check whether username already exist or not

		$condition = "usuarios_nombre_sistema =" . "'" .$data['usuarios_correo_sistema']. "'";
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			//var_dump($data);
			$this->db->insert('usuarios', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
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