<?php

//session_start(); //we need to start session in order to access it through CI
Class Controllers_Catalogos extends CI_Controller {

	public function __construct() {

			parent::__construct();
	
			// Load session library
			$this->load->library('session');

			$this->load->model('catalogos_mdoule');
			
	}