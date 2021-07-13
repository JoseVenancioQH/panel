<?php

//session_start(); //we need to start session in order to access it through CI
Class Reportes_Fianzas extends CI_Controller {

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

		$this->load->model('reportes_fianzas_module');

		$this->load->model('reportes_permisionarios_module');

		$this->load->model('catalogos_vincularfianza_module');	
		
		$this->load->model('catalogos_operadores_module');

		$this->load->model('logs_controlplacas_module');
		
		//$html = $this->Dom_parser->file_get_html('http://www.google.com/');
		//$rank = $html->find('b.gb1');			
		//$raw = file_get_html('http://faisalbd.com');
		//var_dump($rank);			
	}

	// Show login page
	public function index($padre=0,$statusPermiso=1,$idPermiso="") {
			$this->load->view('index/header');
			$this->load->view('Reportes/Reportes_Fianzas',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}	

	public function ReportesFianzas_ImprimirPdf() {
		// Check validation for user input in SignUp form		

		$arrayParametros = array('liststatusfianza'=>$this->input->get('liststatusfianza'),
								 'id_operador'=>$this->input->get('id_operador'),
								 'fianza_afectado'=>$this->input->get('fianza_afectado'),
								 'fianza_fecha'=>$this->input->get('fianza_fecha'),
								 'reportes_fianzasStatus'=>$this->input->get('reportes_fianzasStatus'),
								 'reportes_fianzasFechas'=>$this->input->get('reportes_fianzasFechas'),
								 'fianza_tabulador'=>$this->input->get('fianza_tabulador'));
		
		$this->load->library('Pdf');
		$this->load->view('reportes_fianzas',$arrayParametros);
	}

	public function ReportesFianzas_VerPagos() {
		// Check validation for user input in SignUp form
		$result = $this->registros_reportespermisionarios_module->ver_reportespermisionarios($this->input->post('idPermisionario'));
		$stringTable = "";

		foreach($result as $data){

			$stringTable .= "<tr>".
								"<td>".$data->reg_reportespermisionarios_consecutivo."</td>".
								"<td>".(($data->reg_reportespermisionarios_tipo==1)?'Renta':'Recargo')."</td>".
								"<td>$ ".number_format($data->reg_reportespermisionarios_monto_cobro,2)."</td>".
								"<td>".$data->reg_reportespermisionarios_fechahora."</td>".
						    "</tr>";
		}		

		echo $stringTable;
	}	


	public function ReportesFianzas_Buscar() {
	   // Check validation for user input in SignUp form
	   $stringTable = "";	   

	   $PagosFianzas = $this->reportes_fianzas_module->get_buscar_fianzas(
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
		                          $stringTable .= "<td><button class='btn-Primary' onclick='javascript:verPagosFianzas(\"".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."\")' title='Ver Pagos Fianza' type='button'><i class='fa fa-edit'></i></button></td></tr>";       

		                          foreach(json_decode("[".$rowPagosFianzas->pagos."]",true) as $key=>$pago){
		                              $stringTable .= "<tr class=\"reportes_fianzas_pagos pagos_fianzas_".$rowPagosFianzas->reg_pagosfianzas_id_pagosfianzas."\">";
		                              $stringTable .= "<td>".(isset($pago['consecutivo'])?$pago['consecutivo']:"")."</td>";                     
		                              $stringTable .= "<td>$".(is_numeric($pago['monto'])?number_format($pago['monto'],2):"")."</td>";
		                              $stringTable .= "<td>".(isset($pago['fecha'])?$pago['fecha']:"")."</td>";
		                              $stringTable .= "<td></td>";
		                              $stringTable .= "<td></td>";
		                              $stringTable .= "<td></td>";
		                              $stringTable .= "<td></td>";                              
		                              $stringTable .= "<td></td>";
		                              $stringTable .= "<td></td>";
		                              $stringTable .= "<td></td></tr>";
		                        }
		                  }

                      }

                   }		

		echo $stringTable;
	}

	// Validate and store registration data in database
	public function ReportesFianzas_Nuevo() {
		// Check validation for user input in SignUp form
		
		$data = array(
						'reg_reportespermisionarios_id_vincularpermisionario' => $this->input->post('idPagosPermisionarios'),
						'reg_reportespermisionarios_monto_cobro' => 0,
						'reg_reportespermisionarios_consecutivo' => 0,
						'reg_reportespermisionarios_status' => 1,
						'reg_reportespermisionarios_tipo' => 1,//renta 1 , recargo 0
					 );		

		$data['reg_reportespermisionarios_fechahora'] = date("Y-m-d H:i:s", time());
		if((float)$this->input->post('recargos')==(float)0){

			$data['reg_reportespermisionarios_monto_cobro'] = $this->input->post('monto');
			$result = $this->registros_reportespermisionarios_module->registros_reportespermisionarios_insert($data);
		
		}else{
			//registro renta
			$data['reg_reportespermisionarios_monto_cobro'] = $this->input->post('monto');
			$data['reg_reportespermisionarios_tipo'] = 1;
			$result = $this->registros_reportespermisionarios_module->registros_reportespermisionarios_insert($data);
			//registro recargo
			$data['reg_reportespermisionarios_monto_cobro'] = $this->input->post('recargos');
			$data['reg_reportespermisionarios_tipo'] = 0;
			$result = $this->registros_reportespermisionarios_module->registros_reportespermisionarios_insert($data);		
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

	public function ReportesFianzas_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_reportespermisionarios_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_reportespermisionarios_module->catalogos_reportespermisionarios_delete($data,$this->input->post('id'));
				
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
		
}
?>