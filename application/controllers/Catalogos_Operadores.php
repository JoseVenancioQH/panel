<?php

//session_start(); //we need to start session in order to access it through CI
Class Catalogos_Operadores extends CI_Controller {

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

		// Load database
		$this->load->model('login_database');

		// Load menu_view
		$this->load->model('menu_view');		

		$this->load->model('catalogos_operadores_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Catalogos/Catalogos_Operadores',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}		

	// Validate and store registration data in database

	public function Operadores_Nuevo() {
		// Check validation for user input in SignUp form
		
		$data = array(
						'cat_operadores_nombre' => $this->input->post('nombre_operadores'),
						'cat_operadores_telefono' => $this->input->post('telefono_operadores'),
						'cat_operadores_direccion' => $this->input->post('direccion_operadores'),
						'cat_operadores_id_zona' => $this->input->post('zona_operadores'),
						'cat_operadores_status' => 1,
					 );

		//var_dump($data);
		if($this->input->post('idOperadores')==0){

			$data['cat_operadores_fecharegistro'] = date("Y-m-d H:i:s", time());
			$result = $this->catalogos_operadores_module->catalogos_operadores_insert($data);
			
		}else{

			$data['cat_operadores_fechaactualiza'] = date("Y-m-d H:i:s", time());		
			$result = $this->catalogos_operadores_module->catalogos_operadores_update($data,$this->input->post('idOperadores'));
			
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Operador, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Operador, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Operadores_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_operadores_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_operadores_module->catalogos_operadores_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Operador, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Operador, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
		
}
?>