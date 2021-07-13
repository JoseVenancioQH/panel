<?php
//session_start(); //we need to start session in order to access it through CI
Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		$this->load->model('login_database');

		// Load menu_view
		$this->load->model('menu_view');

		// Load usuario_module
		$this->load->model('usuario_module');

		$this->load->model('logs_controlplacas_module');

	}

	// Show login page
	public function index() {
		$this->load->view('login_form');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

	// Validate and store registration data in database
	public function new_user_registration() {
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
				$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
			}else{
				$this->load->view('login_form');
			}

		} else {
			$data = array(
							'username' => $this->input->post('username'),
							'password' => base64_encode($this->input->post('password'))
						 );

			$result = $this->login_database->login($data);

			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) {

					$session_data = array(
						'idusuario' => $result[0]->usuarios_id_usuarios,
						'usernamecomplet' => $result[0]->usuarios_nombre_completo,
						'username' => $result[0]->usuarios_nombre_sistema,
						'password' => $result[0]->usuarios_pass_sistema,
						'email' => $result[0]->usuarios_correo_sistema,
						'permisos' => $result[0]->usuarios_permisos,
						'perfil' => $result[0]->cat_perfiles_nombre,
						'fecharegistro' => $result[0]->usuarios_fechaalta,	
						'menu_view'=>  $this->menu_view->get_content_menu()		
					);

					// Add user data in session
					//var_dump($session_data);
					$this->session->set_userdata('logged_in', $session_data);
					
					$this->load->view('index/header');
					$this->load->view('index/principal');
					$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
				
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