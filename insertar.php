<?php
include("clases/conect.php");
$mensaje = $_POST['mensaje'];


$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO mensajes values ('', '$mensaje', '$timestamp', '1')";

$res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
header("Location: form.php");
?>