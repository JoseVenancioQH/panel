<?php

//session_start(); //we need to start session in order to access it through CI
Class Catalogos_VincularFianza extends CI_Controller {

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
		$this->load->view('Catalogos/Catalogos_VincularFianza',array('padre'=>$padre,'statusPermiso'=>$statusPermiso,'listPermisos'=>$idPermiso));	
		$this->load->view('index/footer',array('modulo'=>$this->uri->segment(1)));
	}

	public function findType($type) {

		if (in_array($type, array("doc","xls","ppt","docx","xlsx","pptx"))) {
				return "office";		    
		}elseif(in_array($type, array("tif","ai","eps"))){
				return "gdocs";
		}elseif(in_array($type, array("pdf"))){
				return $type;
		}elseif(in_array($type, array("txt","php","sql"))){
				return "text";
		}elseif(in_array($type, array("jpg","JPG","png","PNG","bmp","BMP","JPEG","jpeg"))){
				return "";
		}

	}

	public function Get_File() {		
		// Check validation for user input in SignUp form
		//var_dump($_FILES);
		$carpeta="file-upload-evidencia/".$this->input->post('idevidencia');
		//var_dump(is_dir($carpeta));
		
		$arrayConfigUrl = array();
		$arrayUrl = array();

		if(!is_dir($carpeta)){
			if (!file_exists($carpeta)) {
		        mkdir($carpeta, 0777, true);
		    } 
		}

        if($dir = opendir($carpeta)){
        	$count = 0;
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                	$count++;
                	$arrayTemp = array();
                	
                	$infoFile = pathinfo($carpeta.'/'.$archivo);
                	$arrayUrl['Url'][] = load_class('Config')->config['base_url'].$infoFile['dirname'].'/'.$archivo;
                	$arrayTemp['size'] = filesize($carpeta.'/'.$archivo);

                	//$arrayTemp['extension'] = $infoFile['extension'];
                	//var_dump($infoFile['extension']);

                	if(isset($infoFile['extension']))if( $this->findType($infoFile['extension']) != ""){$arrayTemp['type'] = $this->findType($infoFile['extension']);}	                	
                	$arrayTemp['url'] = '/'.$infoFile['dirname'].'/'.$archivo;
                	$arrayTemp['caption'] = $infoFile['basename'];
                	$arrayTemp['filename'] = $archivo;
                	$arrayTemp['key'] = $count;
                	$arrayTemp['downloadUrl'] = true;	                	

                	$arrayConfigUrl['ConfigUrl'][] = $arrayTemp;
                }
            }	            
            //echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'<br>'.json_encode($arrayUrl).'<br><br>'.json_encode($arrayConfigUrl).'</a></li>';
            closedir($dir);
            $arrayFileUpload[] = (!isset($arrayUrl))?$arrayUrl['Url']="[]":$arrayUrl;
            $arrayFileUpload[] = (!isset($arrayConfigUrl))?$arrayConfigUrl['ConfigUrl']="[{}]":$arrayConfigUrl;
            echo json_encode($arrayFileUpload);
        }	
	}

	public function File_Upload() {

		// Check validation for user input in SignUp form
		//var_dump($_FILES);

		$carpeta = 'file-upload-evidencia/'.$this->input->post('id');
	    if (!file_exists($carpeta)) {
	        mkdir($carpeta, 0777, true);
	    }     
		
	    $uploaddir = 'file-upload-evidencia/'.$this->input->post('id').'/';
	    foreach ($_FILES['input-pd']['error'] as $key => $error)
	    {
	        if ($error == UPLOAD_ERR_OK)
	        {
	            $tmp_name = $_FILES['input-pd']['tmp_name'][$key];
	            $name = $_FILES['input-pd']['name'][$key];
	            $uploadfile = $uploaddir . basename($name);
	 
	            if (move_uploaded_file($tmp_name, $uploadfile))
	            {
	                //echo "Success: File ".$name." uploaded.<br/>";
	                echo "[{\"S\":\"Done\"}]";
	            }
	            else
	            {
	                //echo "Error: File ".$name." cannot be uploaded.<br/>";
	                echo "[{\"S\":\"Error\"}]";
	            }
	           
	        }
	    }					
		
	}
		

	// Validate and store registration data in database

	public function VincularFianza_Nuevo() {
		// Check validation for user input in SignUp form		

		$date = date_create($this->input->post('vincular_fechafianza'));
		
		$data = array(
						'cat_vincularfianza_noconvenio' => $this->input->post('vincular_convenio'),
						'cat_vincularfianza_id_status' => $this->input->post('liststatusfianza'),
						'cat_vincularfianza_montopactado' => $this->input->post('vincular_monto'),
						'cat_vincularfianza_fecha' => date_format($date, 'Y-m-d H:i:s'),
						'cat_vincularfianza_id_operadores' => $this->input->post('id_operador'),
						'cat_vincularfianza_nombreafectado' => $this->input->post('vincular_nomafectado'),
						'cat_vincularfianza_evidencia' => "",
						'cat_vincularfianza_status' => 1
					 );

		//var_dump($data);
		if($this->input->post('idVincularFianza')==0){

			$data['cat_vincularfianza_fecharegistro'] = date("Y-m-d H:i:s", time());
			$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_insert($data);
			
		}else{

			$data['cat_vincularfianza_fechaactualiza'] = date("Y-m-d H:i:s", time());		
			$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_update($data,$this->input->post('idVincularFianza'));
			
		}
		
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro o actualizació, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar registro duplicado, o sin afectación en la actualización, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function VincularFianza_Buscar() {
	   // Check validation for user input in SignUp form
	   $stringTable = "";
	
	   $VincularFianzas = $this->catalogos_vincularfianza_module->get_buscar_vincularfianzas(
	   																		$this->input->post('liststatusfianza'),
	   																	  	$this->input->post('vincularfianza_tabulador'),
	   																	  	$this->input->post('vincular_convenio'),
	   																	  	$this->input->post('vincular_fechafianza'),
	   																	  	$this->input->post('vincular_nomafectado'),
	   																	  	$this->input->post('id_cliente')
	   																	  );
       if(!empty($VincularFianzas)){                                 

          foreach($VincularFianzas as $rowVincularFianzas){

          			  	$stringTable .= "<tr>";
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_vincularfianza_id_vincularfianza."</td>";                     
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_vincularfianza_noconvenio."</td>";
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_statusfianzas_nombre."</td>";
	                    $stringTable .= "<td>$".number_format($rowVincularFianzas->cat_vincularfianza_montopactado,2)."</td>";
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_vincularfianza_fecha."</td>";
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_operadores_nombre."</td>";
	                    $stringTable .= "<td>".$rowVincularFianzas->cat_vincularfianza_nombreafectado."</td>"; 
	                    $stringTable .= "<td><button id='button_evidencia' data-toggle='modal' data-target='#modal-evidencias' onclick='javascript:setidevidencia(".$rowVincularFianzas->cat_vincularfianza_id_vincularfianza.");' class='btn-Success' title='Subir Evidencias' type='button'><i class='fa fa-cloud-upload'></i></button></td></td>";                                                       
	                                                                    
	                    $stringTable .= "<td>".(($rowVincularFianzas->cat_vincularfianza_status==1)?'Activo':'Inactivo')."</td>";                
	                    $stringTable .= "<td> Registro:<br><b>".$rowVincularFianzas->cat_vincularfianza_fecharegistro."</b><br>Actuali.:<br><b>".$rowVincularFianzas->cat_vincularfianza_fechaactualiza."</b></td>";                                 
	                    
	                    $stringTable .= "<td><button class='btn-Primary class-editar' onclick='javascript:limpiarVincular();verVincularFianza(\"".$rowVincularFianzas->cat_vincularfianza_id_vincularfianza."\",\"".$rowVincularFianzas->cat_vincularfianza_noconvenio."\",\"".$rowVincularFianzas->cat_statusfianzas_id_statusfianzas."\",\"".$rowVincularFianzas->cat_vincularfianza_montopactado."\",\"".$rowVincularFianzas->cat_vincularfianza_fecha."\",\"".$rowVincularFianzas->cat_operadores_id_operadores."\",\"".$rowVincularFianzas->cat_operadores_nombre."\",\"".$rowVincularFianzas->cat_vincularfianza_nombreafectado."\",\"".$rowVincularFianzas->cat_vincularfianza_evidencia."\")' title='Editar VincularFianza' type='button'><i class='fa fa-edit'></i></button>";
	                    $stringTable .= "<button class='btn-".(($rowVincularFianzas->cat_vincularfianza_status==0)?"Success":"Danger")." ".(($rowVincularFianzas->cat_vincularfianza_status==0)?"class-activar":"class-desactivar")."' onclick='eliminarVincularFianza(".$rowVincularFianzas->cat_vincularfianza_id_vincularfianza.",".(($rowVincularFianzas->cat_vincularfianza_status==0)?1:0).")' title='Editar VincularFianza' type='button'><i class='fa fa-".(($rowVincularFianzas->cat_vincularfianza_status==0)?"check":"close")."'></i></button></td>";                        
	                    $stringTable .= "</tr>";
          	                           
          }
       }		

	   echo $stringTable;
	}

	public function VincularFianza_Eliminar() {
		// Check validation for user input in SignUp form

		$data = array(						
						'cat_vincularfianza_status' => $this->input->post('status'),
					 );

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_delete($data,$this->input->post('id'));
				
		if ($result == true) {

			$dataMessaje['status'] = 'ok';			
			$dataMessaje['class_message'] = 'messageAlertTable';
			$dataMessaje['time_message'] = '7000';	
			$dataMessaje['short_message'] = 'Información!';
			$dataMessaje['long_message'] = 'Registro de Fianza, realizado exitosamente...';			
			$dataMessaje['type_message'] = 'info';
			echo json_encode($dataMessaje);

		} else {			

			$dataMessaje['status'] = 'fail';
			$dataMessaje['class_message'] = 'messageAlertModal';
			$dataMessaje['time_message'] = '7000';
			$dataMessaje['short_message'] = 'Alerta!';
			$dataMessaje['long_message'] = 'Imposible registrar Fianza, verifique...';			
			$dataMessaje['type_message'] = 'danger';
			echo json_encode($dataMessaje);

		}			
		
	}

	public function Fianza_Get_Fianzas() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet($this->input->get('query'),$this->input->get('table'),$this->input->get('campos'));

		echo json_encode($result);				
					
		
	}

	public function Fianza_Get_Fianzas_Unidades() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet_unidades($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Fianza_Get_Fianzas_Operadores() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet_operadores($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Fianza_Get_Fianzas_Placas() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet_placas($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Fianza_Get_Fianzas_PeriodoPago() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet_periodopago($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}

	public function Fianza_Get_Fianzas_PeriodoCobro() {
		// Check validation for user input in SignUp form	

		$result = $this->catalogos_vincularfianza_module->catalogos_vincularfianza_get_autocomplet_periodocobro($this->input->get('query'),$this->input->get('table'));

		echo json_encode($result);				
					
		
	}
		
}
?>