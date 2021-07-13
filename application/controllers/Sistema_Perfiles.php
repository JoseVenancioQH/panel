<?php
//session_start(); //we need to start session in order to access it through CI
Class Sistema_Perfiles extends CI_Controller {

	public function __construct() {

		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');

		// Load menu_view
		$this->load->model('menu_view');		

		$this->load->model('perfiles_module');

		$this->load->model('logs_controlplacas_module');
						
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {

		$this->load->view('index/header');
		$this->load->view('Perfiles/Principal',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));		
		$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));

	}

	public function view_perfiles_agregar() {

		$this->load->view('menu/view_perfiles_agregar.php',array('id'=>$this->input->post('id')));

	}       

	public function Perfil_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_perfiles_status' => $this->input->post('status')
					 );

		$result = $this->perfiles_module->perfiles_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Perfil, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Perfil, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
	
	// Validate and store registration data in database
	public function Perfil_Nuevo() {
		// Check validation for user input in SignUp form

		$data = array(
						'cat_perfiles_nombre_clear' => "",
						'cat_perfiles_permisos' => $this->input->post('permisos'),						
						'cat_perfiles_nombre' => $this->input->post('nomPerfil'),						
						'cat_perfiles_status' => 1
					 );

		//var_dump($data);
		if($this->input->post('idPerfil')==0){ 
			$result = $this->perfiles_module->perfiles_insert($data);
		}else{
			$result = $this->perfiles_module->perfiles_update($data,$this->input->post('idPerfil'));
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Perfil, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Perfil, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
	
}
?>