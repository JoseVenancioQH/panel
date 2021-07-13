<?php

//session_start(); //we need to start session in order to access it through CI
Class Sistema_Usuarios extends CI_Controller {

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

		$this->load->model('usuario_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Usuarios/Principal',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}

	// Show registration page
	public function user_registration_show() {
			$this->load->view('registration_form');
	}

	public function Usuarios_VerPermisos() {
			return $this->load->view('menu/view_permisos.php');
	}

	

	// Validate and store registration data in database
	/*public function new_user_registration() {
			// Check validation for user input in SignUp form
			$this->form_validation->set_rules('username', 'Nombre de Usuario', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email_value', 'Correo Electronico', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('registration_form');
			} else {
				$data = array(
							'user_name' => $this->input->post('username'),
							'user_email' => $this->input->post('email_value'),
							'user_password' => $this->input->post('password')
							);
				$result = $this->login_database->registration_insert($data);
				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successfully !';
					$this->load->view('login_form', $data);
				} else {
					$data['message_display'] = 'Username already exist!';
					$this->load->view('registration_form', $data);
				}
			}
	}*/	

	// Validate and store registration data in database
	public function Usuarios_Nuevo() {
		// Check validation for user input in SignUp form

		$data = array(
						'usuarios_permisos' => $this->input->post('permisos'),
						'usuarios_id_perfil' => $this->input->post('idPerfil'),
						'usuarios_correo_sistema' => $this->input->post('usermail'),
						'usuarios_nombre_sistema' => $this->input->post('username'),
						'usuarios_nombre_completo' => $this->input->post('usercompletname'),
						'usuarios_pass_sistema' => base64_encode($this->input->post('userpass')),
						'usuarios_id_empresa' => $this->input->post('userempresa'),
						'usuarios_id_almacen' => $this->input->post('useralmacen'),
						'usuarios_status' => 1,
						'usuarios_fechaalta' => date("Y-m-d H:i:s", time())
					 );

		//var_dump($data);
		if($this->input->post('idUsuario')==0){
			$result = $this->usuario_module->usuarios_insert($data);
		}else{
			$result = $this->usuario_module->usuarios_update($data,$this->input->post('idUsuario'));
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de usuario, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar usuario, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Usuarios_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'usuarios_status' => $this->input->post('status')
					 );

		$result = $this->usuario_module->usuarios_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de usuario, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar usuario, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	// Check for user login process
	public function user_login_process() {

			$this->form_validation->set_rules('username', 'Nombre de Usuario', 'trim|required');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

			//var_dump($this->form_validation);
			//var_dump($this->form_validation->run());

			if ($this->form_validation->run() == FALSE) {

				//var_dump($this->session->userdata['logged_in']);

				if(isset($this->session->userdata['logged_in'])){
					//$this->load->view('admin_page');
					$this->load->view('index/header');
					$this->load->view('index/principal');
					$this->load->view('index/footer');
				}else{
					$this->load->view('login_form');
				}

			} else {
				$data = array(
								'username' => $this->input->post('username'),
								'password' => $this->input->post('password')
							 );

				$result = $this->login_database->login($data);

				if ($result == TRUE) {
					$username = $this->input->post('username');
					$result = $this->login_database->read_user_information($username);
					if ($result != false) {
						$session_data = array(
						'username' => $result[0]->usuarios_nombre_sistema,
						'password' => $result[0]->usuarios_pass_sistema,
						'email' => $result[0]->usuarios_correo_sistema,
						);
						// Add user data in session
						//var_dump($session_data);
						$this->session->set_userdata('logged_in', $session_data);
						$this->load->view('index/header');
						$this->load->view('index/principal');
						$this->load->view('index/footer');
					}
				} else {
					$data = array(
								'error_message' => 'Invalido, Nombre de Usuario ó Contraseña, Verifique...'
								);
					$this->load->view('login_form', $data);
				}
			}
	}

	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
							'username' => ''
							);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = '';
		$this->load->view('login_form', $data);
	}
		
}
?>