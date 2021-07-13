<?php

//session_start(); //we need to start session in order to access it through CI
Class File_Input extends CI_Controller {
	public function __construct() {

		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load form simple_html_dom library
		//$this->load->library('Simple_html_dom');

		// Load session library
		$this->load->library('session');
	}

	// Show login page
	public function index() {
		$this->load->view('index/header');
		$this->load->view('File_Input');	
		$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));		
	}		
}

?>