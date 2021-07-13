<?php

Class Logs_ControlPlacas_Module extends CI_Model {
	public function logs_controlplacas($result,$tipo,$modulo,$data) {
		$this->db->insert('reg_movimientos', array(
													'reg_movimientos_result'=>$result,
													'reg_movimientos_tipo'=>$tipo,
													'reg_movimientos_modulo'=>$modulo,
													'reg_movimientos_id_usuario'=>$this->session->userdata['logged_in']['idusuario'],
													'reg_movimientos_data'=>json_encode($data),
													'reg_movimientos_fechahora'=>date("Y-m-d H:i:s", time())
											      )
		);
	}	
}

?>