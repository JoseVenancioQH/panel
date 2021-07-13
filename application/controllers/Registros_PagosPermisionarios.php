<?php

//session_start(); //we need to start session in order to access it through CI
Class Registros_PagosPermisionarios extends CI_Controller {

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

		$this->load->model('registros_pagospermisionarios_module');
		
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
			$this->load->view('Registros/Registros_PagosPermisionarios',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
			$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
			
	}	

	public function PagosPermisionarios_VerPagos() {
		// Check validation for user input in SignUp form
		$result = $this->registros_pagospermisionarios_module->ver_pagospermisionarios($this->input->post('idPermisionario'));
		$stringTable = "";
		if($result)
			foreach($result as $data){

				$stringTable .= "<tr>".
									"<td>".$data->reg_pagospermisionarios_consecutivo."</td>".
									"<td>".(($data->reg_pagospermisionarios_tipo==1)?'Renta':'Recargo')."</td>".
									"<td>$ ".number_format($data->reg_pagospermisionarios_monto_cobro,2)."</td>".
									"<td>".$data->reg_pagospermisionarios_fechahora."</td>".
							    "</tr>";
			}		



		echo $stringTable;
	}

	public function RegistrosPagosPermisionarios_Buscar(){		

	   $stringTable = "";

	   $PagosPermisionarios = $this->registros_pagospermisionarios_module->get_buscar_permisionarios(																							
																										$this->input->post('id_permisionario'),
																										$this->input->post('id_unidad'),
																										$this->input->post('id_cliente'),
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

          foreach($PagosPermisionarios as $rowPagosPermisionarios){

          	$banfiltro = true;

            $datetime1 = new DateTime($rowPagosPermisionarios->cat_vincularpermisionario_fechainicio);                
            $interval = $datetime1->diff($datetime2);

            //validar los dias de condono /////////////////////////////////////////////
            $intervalFecha = explode('-',$interval->format('%m-%d'));

            $intervalMes = $intervalFecha[0];
            $intervalDias = $intervalFecha[1];                            

            if($intervalMes>0){///meses completos
                $intervaloReal = $coeficiente = 0;
                $pagoReal = (float)$rowPagosPermisionarios->cat_cobros_nombre*(float)$rowPagosPermisionarios->cat_periodopago_periodo;

                if($rowPagosPermisionarios->cat_periodopago_periodo<1){//si es menor a un mes
                    $intervaloReal = (int)$coeficiente = ($intervalDias/($diasMes*$rowPagosPermisionarios->cat_periodopago_periodo));                                    
                }

                $intervaloReal += ((int)($intervalMes / $rowPagosPermisionarios->cat_periodopago_periodo));
            }else{//dias, antes de un mes completo                                
                $pagoReal = (float)$rowPagosPermisionarios->cat_cobros_nombre*(float)$rowPagosPermisionarios->cat_periodopago_periodo;
                $intervaloReal = ((float)($intervalMes / $rowPagosPermisionarios->cat_periodopago_periodo));                                

                $intervaloReal  += (int)$coeficiente = ($intervalDias/($diasMes*$rowPagosPermisionarios->cat_periodopago_periodo));
            }

            //obtengo la parte fraccionaria del coeficiente//////////////
            $fracc=explode('.',(string)$coeficiente); 
            $numFracc = "0.".(isset($fracc[1])?$fracc[1]:"0");
            /////////////////////////////////////////////////////////////

            $diasSobrantes = (int)($numFracc*($diasMes*(float)$rowPagosPermisionarios->cat_periodopago_periodo));
            
            if(($diasSobrantes<=$rowPagosPermisionarios->cat_periodopago_diascondonados)){
                $intervaloReal = ($intervaloReal!=0)?$intervaloReal - 1:0;
            }
            ///////////////////////////////////////////////////////////////////////////

            $pagoPrint = $pagoReal*(((int)$intervaloReal==0)?(((float)$rowPagosPermisionarios->cat_periodopago_periodo<=0.03)?1:$intervaloReal):$intervaloReal);
            $deuda = (float)$pagoPrint - (float)$rowPagosPermisionarios->reg_pagospermisionarios_monto_cobro;
            $recargos = $deuda * (float)$rowPagosPermisionarios->cat_cobros_porcentajedecimal;
            $deudaPeriodo = $intervaloReal-$rowPagosPermisionarios->numreg;
          
            /*echo "<tr>";
            echo "<td>".$rowPagosPermisionarios->cat_pagospermisionarios_id_pagospermisionarios."</td>";                     
            echo "<td>".$rowPagosPermisionarios->cat_pagospermisionarios_nombre."</td>";                          
            echo "<td>".(($rowPagosPermisionarios->cat_pagospermisionarios_status==1)?'Activo':'Inactivo')."</td>";                
            echo "<td> Registro:<br><b>".$rowPagosPermisionarios->cat_pagospermisionarios_fecharegistro."</b><br>Actuali.:<br><b>".$rowPagosPermisionarios->cat_pagospermisionarios_fechaactualiza."</b></td>";                                 
            
            echo "<td><button class='btn-Primary class-editar' onclick='javascript:clearform();verPagosPermisionarios(\"".$rowPagosPermisionarios->cat_pagospermisionarios_id_pagospermisionarios."\",\"".$rowPagosPermisionarios->cat_pagospermisionarios_nombre."\",\"".$rowPagosPermisionarios->cat_pagospermisionarios_status."\",\"".$rowPagosPermisionarios->cat_pagospermisionarios_fecharegistro."\",\"".$rowPagosPermisionarios->cat_pagospermisionarios_fechaactualiza."\")' title='Editar PagosPermisionarios' data-toggle='modal' data-target='#modal-agregar-pagospermisionarios' type='button'><i class='fa fa-edit'></i></button>";
            echo "<button class='btn-".(($rowPagosPermisionarios->cat_pagospermisionarios_status==0)?"Success":"Danger")." ".(($rowPagosPermisionarios->cat_pagospermisionarios_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarPagosPermisionarios(".$rowPagosPermisionarios->cat_pagospermisionarios_id_pagospermisionarios.",".(($rowPagosPermisionarios->cat_pagospermisionarios_status==0)?1:0).")' title='Editar PagosPermisionarios' type='button'><i class='fa fa-".(($rowPagosPermisionarios->cat_pagospermisionarios_status==0)?"check":"close")."'></i></button></td>";                        
            echo "</tr>";*/

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
		            $stringTable .= "<td>".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."</td>";                     
		            $stringTable .= "<td>".$rowPagosPermisionarios->cat_permisionario_nombre."</td>";
		            $stringTable .= "<td>".$rowPagosPermisionarios->cat_unidades_numeconomico."<br>".$rowPagosPermisionarios->cat_operadores_nombre."</td>";
		            //$stringTable .= "<td>".$rowPagosPermisionarios->cat_operadores_nombre."</td>";
		            $stringTable .= "<td>".$rowPagosPermisionarios->cat_placas_numero."</td>";
		            $stringTable .= "<td>".$rowPagosPermisionarios->cat_periodopago_nombre."<br>Dias Condonados: ".$rowPagosPermisionarios->cat_periodopago_diascondonados."</td>";
                    $stringTable .= "<td>Inicio: ".$rowPagosPermisionarios->cat_vincularpermisionario_fechainicio."<br>Transcurrido:<br> Meses: ".$intervalMes.", Dias:".$intervalDias."<br><br>Actual:".date("Y-m-d H:i:s", time())."</td>";
		            $stringTable .= "<td>$".number_format($rowPagosPermisionarios->cat_cobros_nombre,2)."</td>";
		            $stringTable .= "<td>$".number_format($rowPagosPermisionarios->reg_pagospermisionarios_monto_cobro,2)." (".$rowPagosPermisionarios->numreg." Pagos) "."</td>";
		            $stringTable .= "<td>$".number_format($pagoPrint,2)." (".$intervaloReal." ".$rowPagosPermisionarios->cat_periodopago_nombre.")</td>";
		            $stringTable .= "<td>$".number_format($deuda,2)."</td>";
		            $stringTable .= "<td>$".number_format($recargos,2)."</td>";
		            $stringTable .= "<td><button class='btn-Primary' onclick='javascript:clearform();verPagosPermisionarios(\"".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\")' title='Ver Pagos Permisionario' data-toggle='modal' data-target='#modal-ver-pagospermisionarios' type='button'><i class='fa fa-edit'></i></button></td>";                        
		            $stringTable .= "<td>
		                    <div class=\"input-group margin\">
		                      <input type=\"text\" name=\"guardar_abono_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" id=\"guardar_abono_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" class=\"form-control\" placeholder=\"Renta\" data-provide=\"typeahead\" autocomplete=\"off\">
		                      <input type=\"text\" name=\"guardar_recargos_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" id=\"guardar_recargos_".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\" class=\"form-control\" placeholder=\"Recargos\" data-provide=\"typeahead\" autocomplete=\"off\">
		                      <span class=\"input-group-btn\">
		                          <button type=\"button\" class=\"btn btn-info btn-flat class-guardar\" data-toggle=\"modal\" data-target=\"#modal-agregar-abono\" onclick=\"guardarAbono(".$rowPagosPermisionarios->cat_vincularpermisionario_id_vincularpermisionario.",".$recargos.",".$deuda.")\">+</button>
		                      </span>
		                    </div>
		                  </td></tr>";

		    }                       

          }

       }

       echo $stringTable;
       
	}	

	// Validate and store registration data in database
	public function PagosPermisionarios_Nuevo() {
		// Check validation for user input in SignUp form
		
		$data = array(
						'reg_pagospermisionarios_id_vincularpermisionario' => $this->input->post('idPagosPermisionarios'),
						'reg_pagospermisionarios_monto_cobro' => 0,
						'reg_pagospermisionarios_consecutivo' => 0,
						'reg_pagospermisionarios_status' => 1,
						'reg_pagospermisionarios_tipo' => 1,//renta 1 , recargo 0
					 );		

		$data['reg_pagospermisionarios_fechahora'] = date("Y-m-d H:i:s", time());
		if((float)$this->input->post('recargos')==(float)0){

			$data['reg_pagospermisionarios_monto_cobro'] = $this->input->post('monto');
			$result = $this->registros_pagospermisionarios_module->registros_pagospermisionarios_insert($data);
		
		}else{
			//registro renta
			$data['reg_pagospermisionarios_monto_cobro'] = $this->input->post('monto');
			$data['reg_pagospermisionarios_tipo'] = 1;
			$result = $this->registros_pagospermisionarios_module->registros_pagospermisionarios_insert($data);
			//registro recargo
			$data['reg_pagospermisionarios_monto_cobro'] = $this->input->post('recargos');
			$data['reg_pagospermisionarios_tipo'] = 0;
			$result = $this->registros_pagospermisionarios_module->registros_pagospermisionarios_insert($data);		
		}
		
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Pagos, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Pagos, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function PagosPermisionarios_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_pagospermisionarios_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_pagospermisionarios_module->catalogos_pagospermisionarios_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Pagos, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Pagos, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}
		
}
?>