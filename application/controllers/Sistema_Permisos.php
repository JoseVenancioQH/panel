<?php
//session_start(); //we need to start session in order to access it through CI
Class Sistema_Permisos extends CI_Controller {

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

		$this->load->model('permisos_module');

		$this->load->model('logs_controlplacas_module');
						
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {

		$this->load->view('index/header');
		$this->load->view('Permisos/Principal',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));		
		$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));

	}

	public function view_permisos_agregar() {

		$this->load->view('menu/view_permisos_agregar.php',array('id'=>$this->input->post('id')));

	}
	
	
	public function registrarPermiso() {

		$data = array(			 			
						'cat_menu_nombre' => $this->input->post('nomPermiso'),
						'cat_menu_nombre_clear' => $this->permisos_module->scanear_string($this->input->post('nomPermiso')),
						'cat_menu_link' => $this->input->post('accesoControlador'),						
						'cat_menu_id_padre' => $this->input->post('cat_menu_id'),
						'cat_menu_orden_padre' => 0,
						'cat_menu_status' => 1,
						'cat_menu_orden_hijo' => $this->permisos_module->permisos_max_orden($this->input->post('cat_menu_id'))
					);
		
		if($this->input->post('statusOperacion')=='grabar'){
			//var_dump($data);
			$result = $this->permisos_module->permisos_insert($data);
		}else{
			$result = $this->permisos_module->permisos_update($data,$this->input->post('idActualizarGlobal'));
		}
		//var_dump($result);

		if ($result == TRUE) {
			//$data['message_display'] = 'Registration Successfully !';
			return $this->load->view( 'menu/view_permisos_agregar.php' , array('id'=>$this->input->post('cat_menu_id')) );
			//$this->load->view('login_form', $data);
		} else {
			//$data['message_display'] = 'Username already exist!';
			return false;
			//$this->load->view('registration_form', $data);
		}

	}	

	public function registrarOrden() {		
			$result = $this->permisos_module->permisos_orden_update($this->input->post('jsonOrden'));			
			if ($result == TRUE) {
				//$data['message_display'] = 'Registration Successfully !';
				//return $this->load->view('menu/view_permisos_agregar.php');
				//$this->load->view('login_form', $data);
				return true;
			} else {
				//$data['message_display'] = 'Username already exist!';
				return false;
				//$this->load->view('registration_form', $data);
			}
	}	
	
	public function eliminarPermiso() {

		$result = $this->permisos_module->permisos_eliminar($this->input->post('id'),$this->input->post('status'));		

		if ($result == TRUE) {
			//$data['message_display'] = 'Registration Successfully !';
			//return $this->load->view('menu/view_permisos_agregar.php');
			//$this->load->view('login_form', $data);
			return true;
		} else {
			//$data['message_display'] = 'Username already exist!';
			return false;
			//$this->load->view('registration_form', $data);
		}
	}
}
?>