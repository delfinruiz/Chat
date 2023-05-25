<?php

	include("clases/conect.php");

	$id = isset($_POST['id']) ? $_POST['id']:"";

	$q = "SELECT * FROM mensajes";
	$res = mysqli_query($conn, $q) or die (mysqli_error($conn));
	
	while($timi = mysqli_fetch_array($res)){
		echo "Mensaje: ".$timi['mensaje'];
		echo "<br>";
	}

	// cambia el status a 0 para que el sonido se reprodusca una sola vez

	$sql = "UPDATE mensajes SET status = '0' WHERE id = '$id' ";
	$respuesta = mysqli_query($conn, $sql) or die (mysqli_error($conn));

?>