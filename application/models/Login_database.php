<?php

Class Login_Database extends CI_Model {

	// Insert registration data in database
	public function registration_insert($data) {
		// Query to check whether username already exist or not

		$condition = "usuarios_nombre_sistema =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('usuarios', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}

	}

	// Read data using username and password
	public function login($data) {
		$condition = "usuarios_nombre_sistema =" . "'" . $data['username'] . "' AND " . "usuarios_pass_sistema =" . "'" . $data['password'] . "' AND usuarios_status = 1";
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
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "usuarios_nombre_sistema =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('usuarios as u');
		$this->db->join('cat_perfiles as p', 'u.usuarios_id_perfil = p.id_perfiles', 'left');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		//var_dump($this->db->last_query());
		//var_dump($query->result());

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}

	}
	

}

?>