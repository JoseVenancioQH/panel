<?php
//session_start(); //we need to start session in order to access it through CI
Class Usuarios_Form extends CI_Controller {

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

		$this->load->model('logs_controlplacas_module');
	}

	// Show login page
	public function index() {
		$this->load->view('RegUsuario_form');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('RegUsuario_form');
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
				$this->load->view('admin_page');
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
								'perfil' => $result[0]->cat_perfiles_nombre
						);
						// Add user data in session
						//var_dump($session_data);
						$this->session->set_userdata('logged_in', $session_data);
						$this->load->view('admin_page');
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