<?php

//session_start(); //we need to start session in order to access it through CI
Class Catalogos_VincularPermisionario extends CI_Controller {

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

		$this->load->model('catalogos_vincularpermisionario_module');		
		$this->load->model('catalogos_unidades_module');
		$this->load->model('catalogos_operadores_module');
		$this->load->model('catalogos_placas_module');	

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Catalogos/Catalogos_VincularPermisionario',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}

	public function VincularPermisionario_Buscar() {
			// Check validation for user input in SignUp form		

		   $stringTable = "";

		   $VincularPermisionarios = $this->catalogos_vincularpermisionario_module->get_buscar_permisionarios(
																										$this->input->post('id_permisionario'),
																										$this->input->post('id_unidad'),
																										$this->input->post('id_operador'),
																										$this->input->post('id_placa'),
																										$this->input->post('id_periodopago'),
																										$this->input->post('id_cobro'),
																										$this->input->post('permisionario_tabulador'),
																										//$this->input->post('reportes_permisionarioStatus'),
																										$this->input->post('vincular_fechainicio')
																						   			  );
	       if(!empty($VincularPermisionarios)){

                    foreach($VincularPermisionarios as $rowVincularPermisionarios){                                                         

                        $stringTable .= "<tr>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_permisionario_nombre."</td>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_unidades_numeconomico."</td>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_operadores_nombre."</td>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_placas_numero."</td>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_periodopago_nombre."</td>";
                        $stringTable .= "<td>$".number_format($rowVincularPermisionarios->cat_cobros_nombre,2)."</td>";
                        $stringTable .= "<td>".$rowVincularPermisionarios->cat_vincularpermisionario_fechainicio."</td>";                          
                        $stringTable .= "<td>".(($rowVincularPermisionarios->cat_vincularpermisionario_status==1)?'Activo':'Inactivo')."</td>";                
                        $stringTable .= "<td> Registro:<br><b>".$rowVincularPermisionarios->cat_vincularpermisionario_fecharegistro."</b><br>Actuali.:<br><b>".$rowVincularPermisionarios->cat_vincularpermisionario_fechaactualiza."</b></td>";                                 
                        
                        $stringTable .= "<td>".(($rowVincularPermisionarios->cat_vincularpermisionario_status==1)?"<button class='btn-Primary class-editar' onclick='javascript:limpiarVincular();verVincularPermisionario(\"".$rowVincularPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\",\"".$rowVincularPermisionarios->cat_permisionario_id_permisionario."\",\"".$rowVincularPermisionarios->cat_permisionario_nombre."\",\"".$rowVincularPermisionarios->cat_unidades_id_unidad."\",\"".$rowVincularPermisionarios->cat_unidades_numeconomico."\",\"".$rowVincularPermisionarios->cat_operadores_id_operadores."\",\"".$rowVincularPermisionarios->cat_operadores_nombre."\",\"".$rowVincularPermisionarios->cat_placas_id_placas."\",\"".$rowVincularPermisionarios->cat_placas_numero."\",\"".$rowVincularPermisionarios->cat_periodopago_id_periodopago."\",\"".$rowVincularPermisionarios->cat_periodopago_nombre."\",\"".$rowVincularPermisionarios->cat_cobros_id_cobros."\",\"".$rowVincularPermisionarios->cat_cobros_nombre."\",\"".$rowVincularPermisionarios->cat_vincularpermisionario_fechainicio."\")' title='Editar VincularPermisionario' type='button'><i class='fa fa-edit'></i></button>":'');
                        $stringTable .= "<button class='btn-".(($rowVincularPermisionarios->cat_vincularpermisionario_status==0)?"Success":"Danger")." ".(($rowVincularPermisionarios->cat_vincularpermisionario_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarVincularPermisionario(".$rowVincularPermisionarios->cat_vincularpermisionario_id_vincularpermisionario.",".(($rowVincularPermisionarios->cat_vincularpermisionario_status==0)?1:0).")' title='Editar VincularPermisionario' type='button'><i class='fa fa-".(($rowVincularPermisionarios->cat_vincularpermisionario_status==0)?"check":"close")."'></i></button></td>";                        
                        $stringTable .= "</tr>";

                    }           
	          
	       }		

		   echo $stringTable;			
		
	}		

	// Validate and store registration data in database

	public function VincularPermisionario_Nuevo() {
		// Check validation for user input in SignUp form	

		$date = date_create($this->input->post('vincular_fechainicio'));
		
		$data = array(
						'cat_vincularpermisionario_id_permisionario' => $this->input->post('id_permisionario'),
						'cat_vincularpermisionario_id_unidad' => $this->input->post('id_unidad'),
						'cat_vincularpermisionario_id_operadores' => $this->input->post('id_operador'),
						'cat_vincularpermisionario_id_placa' => $this->input->post('id_placa'),
						'cat_vincularpermisionario_id_periodopago' => $this->input->post('id_periodopago'),
						'cat_vincularpermisionario_id_cobros' => $this->input->post('id_cobro'),
						'cat_vincularpermisionario_fechainicio' => date_format($date, 'Y-m-d H:i:s'),
						'cat_vincularpermisionario_status' => 1,
					 );

		//var_dump($data);
		if($this->input->post('idVincularPermisionario')==0){

			$data['cat_vincularpermisionario_fecharegistro'] = date("Y-m-d H:i:s", time());
			$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_insert($data);
			
		}else{

			$data['cat_vincularpermisionario_fechaactualiza'] = date("Y-m-d H:i:s", time());		
			$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_update($data,$this->input->post('idVincularPermisionario'));
			
		}

		//var_dump($result);
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro ó actualización, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar, vinculación duplicada, ó sin afectación en actualización, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function VincularPermisionario_Eliminar() {
		// Check validation for user input in SignUp form
        
        if($this->input->post('status')==0){
			$data = array(						
							'cat_vincularpermisionario_status' => $this->input->post('status'),
						 );
		}else{
			$data = array(						
							'cat_vincularpermisionario_status' => $this->input->post('status'),
							'cat_vincularpermisionario_fechainicio' => date("Y-m-d H:i:s", time())
						 );

		}

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Permisionario, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Permisionario, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Data_Unidad_Get(){

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_unidad($this->input->post('id_unidad'));

		echo json_encode($result);			

	}

	public function Permisionario_Get_Permisionarios() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet($this->input->get('query'),$this->input->get('table'),$this->input->get('campos'));

		echo json_encode($result);				
					
		
	}

	public function Permisionario_Get_Permisionarios_Unidades() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_unidades($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Permisionario_Get_Permisionarios_Operadores() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_operadores($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}	

	public function Permisionario_Get_Permisionarios_Placas() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_placas($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Permisionario_Get_Permisionarios_PeriodoPago() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_periodopago($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Permisionario_Get_Permisionarios_PeriodoCobro() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularpermisionario_module->catalogos_vincularpermisionario_get_autocomplet_periodocobro($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}
		
}
?>