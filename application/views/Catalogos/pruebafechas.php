<?php 
	$tiempo=18; // numero de quincenas que queremos generar
	$i=0; //contador 
	$fec= date("d" ) ; // sacamos el dia de la fecha de hoy
	$hoy = date("Y-m-d H:i:s" ) ; //sacamos la fecha de hoy
	$hoy2= date("Y-m" ) ;// sacamos el año y mes de hoy 

	//ponemos la condicion si el dia de hoy es menor a 15 ejemplo 2017-09-12 
	//el primer pago lo programo al dia ultimo de ese mes si no se va hasta la otra quincena del siguiente mes 

	if($fec <= 15){ 

		$aux = date('Y-m-d', strtotime("{$hoy2} + 1 month" )) ;
		$last_day = date('Y-m-d', strtotime("{$aux} - 1 day" )) ;
		//aki se guarda $last_date = 2017-09-30 

	}else{ 

		$aux = date('Y-m-d', strtotime("{$hoy2} + 1 month" )) ;
		$last_day = date('Y-m-d', strtotime("{$aux} +14 day" ));
		//aki se guarda $last_date = 2017-10-15 
	} 

	echo $last_day.'<br>';// imprimimos el primer dia de pago
	//generamos el ciclo 
	while($i <= $tiempo) {

	$dayx=date('d', strtotime($last_day)) ; // sacamos el dia de $last_day 
	$hoy3=date('Y-m', strtotime($last_day)) ;// sacamos el año y mes de $last_day 

	//si el dia del primer pago es menor a quince el primer pago lo programo al dia ultimo de ese mes si no se va hasta la otra quincena del siguiente 
	if($dayx <= 15){

		$aux = date('Y-m-d', strtotime("{$hoy3} + 1 month" )) ;
		$last_day = date('Y-m-d', strtotime("{$aux} -1 day" )) ;
		echo $last_day.'<br>';//imprimo la fecha de pago 

	}else{ 

		$aux = date('Y-m-d', strtotime("{$hoy3} + 1 month" ) ) ;
		$last_day = date('Y-m-d', strtotime("{$aux} +14 day" )) ;
		echo $last_day.'<br>';//imprimo la fecha de pago 

	} 

	$i++; 
	} 
?> 