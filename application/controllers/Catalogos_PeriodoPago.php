<?php

//session_start(); //we need to start session in order to access it through CI
Class Catalogos_PeriodoPago extends CI_Controller {

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

		$this->load->model('catalogos_periodopago_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Catalogos/Catalogos_PeriodoPago',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}		

	// Validate and store registration data in database

	public function PeriodoPago_Nuevo() {
			// Check validation for user input in SignUp form

			$date = date_create($this->input->post('periodopago_fechainicio'));
					
			$data = array(
							'cat_periodopago_nombre' => $this->input->post('periodopago_nombre'),
							'cat_periodopago_periodo' => $this->input->post('periodopago_periodo'),
							'cat_periodopago_diascondonados' => $this->input->post('periodopago_diascondonados'),
							'cat_periodopago_fechainicio' => date_format($date, 'Y-m-d H:i:s'),
							'cat_periodopago_status' => 1,
						 );

			//var_dump($data);
			if($this->input->post('idPeriodoPago')==0){

				$data['cat_periodopago_fecharegistro'] = date("Y-m-d H:i:s", time());
				$result = $this->catalogos_periodopago_module->catalogos_periodopago_insert($data);
				
			}else{

				$data['cat_periodopago_fechaactualiza'] = date("Y-m-d H:i:s", time());		
				$result = $this->catalogos_periodopago_module->catalogos_periodopago_update($data,$this->input->post('idPeriodoPago'));
				
			}
			
			if ($result == true) {

				$dataMessaje['status'] = 'ok';			
				$dataMessaje['class_message'] = 'messageAlertTable';
				$dataMessaje['time_message'] = '7000';	
				$dataMessaje['short_message'] = 'Información!';
				$dataMessaje['long_message'] = 'Registro de Periodo Pago, realizado exitosamente...';			
				$dataMessaje['type_message'] = 'info';
				echo json_encode($dataMessaje);

			} else {			

				$dataMessaje['status'] = 'fail';
				$dataMessaje['class_message'] = 'messageAlertModal';
				$dataMessaje['time_message'] = '7000';
				$dataMessaje['short_message'] = 'Alerta!';
				$dataMessaje['long_message'] = 'Imposible registrar Periodo Pago, verifique...';			
				$dataMessaje['type_message'] = 'danger';
				echo json_encode($dataMessaje);

			}			
		
	}

	public function PeriodoPago_Eliminar() {
			// Check validation for user input in SignUp form

			$data = array(						
							'cat_periodopago_status' => $this->input->post('status'),
						 );

			$result = $this->catalogos_periodopago_module->catalogos_periodopago_delete($data,$this->input->post('id'));
					
			if ($result == true) {

				$dataMessaje['status'] = 'ok';			
				$dataMessaje['class_message'] = 'messageAlertTable';
				$dataMessaje['time_message'] = '7000';	
				$dataMessaje['short_message'] = 'Información!';
				$dataMessaje['long_message'] = 'Registro de Periodo Pago, realizado exitosamente...';			
				$dataMessaje['type_message'] = 'info';
				echo json_encode($dataMessaje);

			} else {			

				$dataMessaje['status'] = 'fail';
				$dataMessaje['class_message'] = 'messageAlertModal';
				$dataMessaje['time_message'] = '7000';
				$dataMessaje['short_message'] = 'Alerta!';
				$dataMessaje['long_message'] = 'Imposible registrar Periodo Pago, verifique...';			
				$dataMessaje['type_message'] = 'danger';
				echo json_encode($dataMessaje);

			}			
		
	}
		
}
?>