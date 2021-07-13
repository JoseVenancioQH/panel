<?php

//session_start(); //we need to start session in order to access it through CI
Class Reportes_Permisionarios extends CI_Controller {

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

		$this->load->model('reportes_permisionarios_module');

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
			$this->load->view('Reportes/Reportes_Permisionarios',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}	

	public function ReportesPermisionarios_ImprimirPdf() {
		
		// Check validation for user input in SignUp form		
		$this->load->library('Pdf');
	
		$arrayParametros = array('id_permisionario'=>$this->input->get('id_permisionario'),
								 'id_unidad'=>$this->input->get('id_unidad'),
								 'id_operador'=>$this->input->get('id_operador'),
								 'id_placa'=>$this->input->get('id_placa'),
								 'reportes_permisionarioStatus'=>$this->input->get('reportes_permisionarioStatus'),
								 'reportes_permisionarioFechas'=>$this->input->get('reportes_permisionarioFechas'),
								 'permisionario_tabulador'=>$this->input->get('permisionario_tabulador'),
								 'permisionario_fecha'=>$this->input->get('permisionario_fecha'));
        //var_dump($arrayParametros);
		$this->load->view('reportes_permisionarios',$arrayParametros);

	}	

	public function ReportesPermisionarios_Buscar() {
	   // Check validation for user input in SignUp form
	   $stringTable = "";

	   $PagosPermisionarios = $this->reportes_permisionarios_module->get_buscar_permisionarios(
																					$this->input->post('id_permisionario'),
																					$this->input->post('id_unidad'),
																					$this->input->post('id_operador'),
																					$this->input->post('id_placa'),
																					$this->input->post('permisionario_tabulador'),
																					//$this->input->post('reportes_permisionarioStatus'),
																					$this->input->post('reportes_permisionarioFechas'),
																					$this->input->post('permisionario_fecha')
																				   );
       if(!empty($PagosPermisionarios)){  

          date_default_timezone_set('America/Tijuana');
          $datetime2 = new DateTime();     

          $diasMes = 30;//date('t');//dias del Mes       

          foreach($PagosPermisionarios as $rowReportesPermisionarios){

          	$banfiltro = true;

            $datetime1 = new DateTime($rowReportesPermisionarios->cat_vincularpermisionario_fechainicio);                
            $interval = $datetime1->diff($datetime2);

            //validar los dias de condono /////////////////////////////////////////////
            $intervalFecha = explode('-',$interval->format('%m-%d'));

            $intervalMes = $intervalFecha[0];
            $intervalDias = $intervalFecha[1];                            

            if($intervalMes>0){///meses completos
                $intervaloReal = 0;
                $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;

                if($rowReportesPermisionarios->cat_periodopago_periodo<1){//si es menor a un mes
                    $intervaloReal = (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));                                    
                }

                $intervaloReal += ((int)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));
            }else{//dias, antes de un mes completo                                
                $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;
                $intervaloReal = ((float)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));                                

                $intervaloReal  += (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));
            }

            //obtengo la parte fraccionaria del coeficiente//////////////
            $fracc=explode('.',(string)$coeficiente); 
            $numFracc = "0.".(isset($fracc[1])?$fracc[1]:"0");
            /////////////////////////////////////////////////////////////

            $diasSobrantes = (int)($numFracc*($diasMes*(float)$rowReportesPermisionarios->cat_periodopago_periodo));
            
            if(($diasSobrantes<=$rowReportesPermisionarios->cat_periodopago_diascondonados)){
                $intervaloReal = $intervaloReal - 1;
            }
            ///////////////////////////////////////////////////////////////////////////

            $pagoPrint = $pagoReal*(((int)$intervaloReal==0)?(((float)$rowReportesPermisionarios->cat_periodopago_periodo<=0.03)?1:$intervaloReal):$intervaloReal);
            $deuda = (float)$pagoPrint - (float)$rowReportesPermisionarios->reg_pagospermisionarios_monto_cobro;
            $recargos = $deuda * (float)$rowReportesPermisionarios->cat_cobros_porcentajedecimal;
            $deudaPeriodo = $intervaloReal-$rowReportesPermisionarios->numreg;

            switch ($this->input->post('reportes_permisionarioStatus')) {
			    case "aldia":
			    	if((int)$deuda>0){$banfiltro = false;}
			        break;
			    case "deudores":
			        if((int)$deuda<=0){$banfiltro = false;}
			        break;
			}

			if($banfiltro){

		            $stringTable .= "<tr>";
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_permisionario_nombre."</td>";
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_unidades_numeconomico."</td>";
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_operadores_nombre."</td>";
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_placas_numero."</td>";
		            $stringTable .= "<td>".$rowReportesPermisionarios->cat_periodopago_nombre."<br>Dias Condonados: ".$rowReportesPermisionarios->cat_periodopago_diascondonados."</td>";
                    $stringTable .= "<td>Inicio: ".$rowReportesPermisionarios->cat_vincularpermisionario_fechainicio."<br>Transcurrido:<br> Meses: ".$intervalMes.", Dias:".$intervalDias."<br><br>Actual:".date("Y-m-d H:i:s", time())."</td>";
		            $stringTable .= "<td>$".number_format($rowReportesPermisionarios->cat_cobros_nombre,2)."</td>";
		            $stringTable .= "<td>$".number_format($rowReportesPermisionarios->pagorenta,2)." (".$rowReportesPermisionarios->numreg." Pagos) "."</td>";
		            $stringTable .= "<td>$".number_format($pagoPrint,2)." (".$intervaloReal." ".$rowReportesPermisionarios->cat_periodopago_nombre.")</td>";
		            $stringTable .= "<td>$".number_format($deuda,2)."</td>";
		            $stringTable .= "<td>$".number_format($recargos,2)."</td>";
		            $stringTable .= "<td><button class='btn-Primary' onclick='javascript:verPagosPermisionarios(\"".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\")' title='Ver Pagos Permisionario' type='button'><i class='fa fa-edit'></i></button></td></tr>";     

		            foreach(json_decode("[".$rowReportesPermisionarios->pagos."]",true) as $key=>$pago){
		                  $stringTable .= "<tr class=\"reportes_permisionarios_pagos pagos_permisionarios_".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\">";
		                  $stringTable .= "<td>".(isset($pago['consecutivo'])?$pago['consecutivo']:"")."</td>";                     
		                  $stringTable .= "<td>$".(is_numeric($pago['monto'])?number_format($pago['monto'],2):"")."</td>";
		                  $stringTable .= "<td>".(isset($pago['fecha'])?$pago['fecha']:"")."</td>";
		                  $stringTable .= "<td>".(isset($pago['tipo'])?$pago['tipo']:"")."</td>";
		                  $stringTable .= "<td></td>";
		                  $stringTable .= "<td></td>";
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

	public function ReportesPermisionarios_VerPagos() {
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

	// Validate and store registration data in database
	public function ReportesPermisionarios_Nuevo() {
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

	public function ReportesPermisionarios_Eliminar() {
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