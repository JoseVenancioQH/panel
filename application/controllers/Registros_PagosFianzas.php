<?php

//session_start(); //we need to start session in order to access it through CI
Class Registros_PagosFianzas extends CI_Controller {

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

		$this->load->model('registros_pagosfianzas_module');

		$this->load->model('catalogos_vincularfianza_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Registros/Registros_PagosFianzas',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}	


	public function RegistrosPagosFianzas_Buscar() {
	   // Check validation for user input in SignUp form
	   $stringTable = "";	

	   $PagosFianzas = $this->registros_pagosfianzas_module->get_registros_pagosfianzas_buscar(
		   																							$this->input->post('liststatusfianza'),
							   																	  	$this->input->post('id_operador'),
							   																	  	$this->input->post('fianza_afectado'),
							   																	  	$this->input->post('fianza_fecha'),
							   																	  	$this->input->post('fianza_tabulador'),
							   																	  	/*$this->input->post('reportes_fianzasStatus'),*/
							   																	  	$this->input->post('reportes_fianzasFechas')
	   																	  						);

       if(!empty($PagosFianzas)){  

          date_default_timezone_set('America/Tijuana');
          $datetime2 = new DateTime();            

          foreach($PagosFianzas as $rowPagosFianzas){

          		  $banfiltro = true;                      

	              $deuda = (float)$rowPagosFianzas->cat_vincularfianza_montopactado - (float)$rowPagosFianzas->reg_pagosfianzas_monto_suma;   

	              switch ($this->input->post('reportes_fianzasStatus')) {
					    case "aldia":
					    	if((int)$deuda>0){$banfiltro = false;}
					        break;
					    case "deudores":
					        if((int)$deuda<=0){$banfiltro = false;}
					        break;
				  }

				  if($banfiltro){
	              
			              $stringTable .= "<tr>";
			              $stringTable .= "<td>".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."</td>";                     
			              $stringTable .= "<td>".$rowPagosFianzas->cat_vincularfianza_noconvenio."</td>";
			              $stringTable .= "<td>".$rowPagosFianzas->cat_statusfianzas_nombre."</td>";
			              $stringTable .= "<td>$".number_format($rowPagosFianzas->cat_vincularfianza_montopactado,2)."</td>";
			              $stringTable .= "<td>".$rowPagosFianzas->cat_vincularfianza_fecharegistro."</td>";
			              $stringTable .= "<td>".$rowPagosFianzas->cat_operadores_nombre."</td>";
			              $stringTable .= "<td>".$rowPagosFianzas->cat_vincularfianza_nombreafectado."</td>";                         
			              $stringTable .= "<td>$".number_format($rowPagosFianzas->reg_pagosfianzas_monto_suma,2)." (".$rowPagosFianzas->numreg.") "."</td>";                          
			              $stringTable .= "<td>$".number_format($deuda,2)."</td>";
			              $stringTable .= "<td><button class='btn-Primary' onclick='javascript:clearform();verPagosFianzas(\"".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\")' title='Ver Pagos Fianza' data-toggle='modal' data-target='#modal-ver-pagosfianzas' type='button'><i class='fa fa-edit'></i></button></td>";                          
			              $stringTable .= "<td>
			                      <div class=\"input-group margin\">
			                        <input type=\"text\" name=\"guardar_abono_".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\" id=\"guardar_abono_".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza."\" class=\"form-control\" placeholder=\"Monto\" data-provide=\"typeahead\" autocomplete=\"off\">
			                        <span class=\"input-group-btn\">
			                            <button type=\"button\" class=\"btn btn-info btn-flat class-guardar\" data-toggle=\"modal\" data-target=\"#modal-agregar-abono\" onclick=\"guardarAbono(".$rowPagosFianzas->cat_vincularfianza_id_vincularfianza.")\">+</button>
			                        </span>
			                      </div>
			                    </td>"; 

			     }                                   

          }

       }

	   echo $stringTable;
	}

	public function PagosFianzas_VerPagos() {
		// Check validation for user input in SignUp form
		$result = $this->registros_pagosfianzas_module->ver_pagosfianzas($this->input->post('idFianza'));
		$stringTable = "";
		if($result){
			foreach($result as $data){

				$stringTable .= "<tr>".
									"<td>".$data->reg_pagosfianzas_consecutivo."</td>".
									"<td>$ ".number_format($data->reg_pagosfianzas_monto,2)."</td>".
									"<td>".$data->reg_pagosfianzas_fecharegistro."</td>".
							    "</tr>";
			}
		}else{
			$stringTable = "<tr >".
								"<td rowspan=\"3\">Sin Resultados</td>".
						    "</tr>";
		}		

		echo $stringTable;
	}	

	// Validate and store registration data in database
	public function PagosFianzas_Nuevo() {
		// Check validation for user input in SignUp form
		
		$data = array(
						'reg_pagosfianzas_id_vincularfianza' => $this->input->post('idPagosFianzas'),
						'reg_pagosfianzas_monto' => $this->input->post('monto'),
						'reg_pagosfianzas_consecutivo' => 0,
						'reg_pagosfianzas_status' => 1,
					 );		

		$data['reg_pagosfianzas_fecharegistro'] = date("Y-m-d H:i:s", time());
		$result = $this->registros_pagosfianzas_module->registros_pagosfianzas_insert($data);
		
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Pago, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Pago, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function PagosFianzas_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_pagosfianzas_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_pagosfianzas_module->catalogos_pagosfianzas_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Pago, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Pago, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
		
}
?>