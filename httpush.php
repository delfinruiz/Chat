<?php

	require_once('clases/conect.php');
	set_time_limit(0); //Establece el número de segundos que se permite la ejecución de un script.
	$fecha_ac = isset($_POST['timestamp']) ? $_POST['timestamp']:0;

	$queryTime    = "SELECT timestamp FROM mensajes ORDER BY timestamp DESC LIMIT 1";
    $con = mysqli_query($conn, $queryTime);
    $time = mysqli_fetch_array($con);

	$fecha_bd = $time['timestamp'];

	while( $fecha_bd <= $fecha_ac )
		{	
			$query3    = "SELECT timestamp FROM mensajes ORDER BY timestamp DESC LIMIT 1";
			$con       = mysqli_query($conn, $query3 );
			$ro        = mysqli_fetch_array($con);
			
			usleep(100000);//anteriormente 10000
			clearstatcache();
			$fecha_bd  = strtotime($ro['timestamp']);
		}

	$query       = "SELECT * FROM mensajes ORDER BY timestamp DESC LIMIT 1";
	$datos_query = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($datos_query))
	{
		$ar["timestamp"]        = strtotime($row['timestamp']);	
		$ar["mensaje"] 	 		= $row['mensaje'];	
		$ar["id"] 		        = $row['id'];	
		$ar["sonido"]           = $row['status'];

	}
	$dato_json   = json_encode($ar);
	echo $dato_json;

?>