<?php

//session_start(); //we need to start session in order to access it through CI
Class Productos_Registros extends CI_Controller {

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

		$this->load->model('productos_registros_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Productos/Productos_Registros',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}

	// Validate and store registration data in database
	public function Producto_Nuevo() {
		// Check validation for user input in SignUp form

		$data = array(
						'cat_productos_id_cliente' => $this->input->post('idCliente'),
						'cat_productos_sku' => $this->input->post('SKU'),
						'cat_productos_mlm' => $this->input->post('MLM'),
						'cat_productos_cantidad' => $this->input->post('cantidad'),
						'cat_productos_descripcion' => $this->input->post('descripcion'),
						'cat_productos_comentarios' => base64_encode($this->input->post('comentarios')),
						'cat_productos_preciopromocion' => $this->input->post('preciopromocion'),
						'cat_productos_precioregular' => $this->input->post('precioregular'),
						'cat_productos_status' => 1,
						'cat_productos_fechaalta' => date("Y-m-d H:i:s", time())
					 );

		//var_dump($data);
		if($this->input->post('idProducto')==0){
			$result = $this->productos_registros_module->productos_insert($data);
		}else{
			$result = $this->productos_registros_module->productos_update($data,$this->input->post('idProducto'));
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de producto, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar producto, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Producto_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_productos_status' => $this->input->post('status')
					 );

		$result = $this->productos_registros_module->productos_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de productos, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar productos, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

		
}
?>