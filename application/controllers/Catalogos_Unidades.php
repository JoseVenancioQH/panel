<?php

//session_start(); //we need to start session in order to access it through CI
Class Catalogos_Unidades extends CI_Controller {

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

		$this->load->model('catalogos_unidades_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);	
				
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Catalogos/Unidades',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}		

	public function Permisionario_Get_Permisionarios_Placas() {
		// Check validation for user input in SignUp form
		$result = $this->catalogos_unidades_module->catalogos_vincularpermisionario_get_autocomplet_placas($this->input->get('query'),$this->input->get('table'));
		echo json_encode($result);	
	}

	// Validate and store registration data in database

	public function Unidades_Nuevo() {
		// Check validation for user input in SignUp form
		
		$data = array(
						'cat_unidades_numeconomico' => $this->input->post('numeconomico'),
						'cat_unidades_ano' => $this->input->post('anounidad'),
						//'cat_unidades_id_placas' => $this->input->post('numplaca'),
						'cat_unidades_id_marca' => $this->input->post('listmarcaunidad'),
						'cat_unidades_id_modelo' => $this->input->post('listmodelounidad'),
						'cat_unidades_id_servicio' => $this->input->post('listserviciosunidad'),
						'cat_unidades_id_rol' => $this->input->post('listrolunidad'),
						'cat_unidades_id_empresa' => $this->input->post('listempresaunidad'),
						'cat_unidades_id_almacen' => $this->input->post('listalmacenunidad'),
						'cat_unidades_id_zona' => $this->input->post('listzonaunidad'),												
						'cat_unidades_status' => 1, 
					 );

		//var_dump($data);
		if($this->input->post('idUnidades')==0){

			$data['cat_unidades_fecharegistro'] = date("Y-m-d H:i:s", time());
			$result = $this->catalogos_unidades_module->catalogos_unidades_insert($data);
			
		}else{

			$data['cat_unidades_fechaactualizada'] = date("Y-m-d H:i:s", time());		
			$result = $this->catalogos_unidades_module->catalogos_unidades_update($data,$this->input->post('idUnidades'));
			
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Unidades, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Unidad, duplicado verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Unidades_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_unidades_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_unidades_module->catalogos_unidades_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Unidad, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Unidad, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
		
}
?>