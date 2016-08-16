<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "gimnasio15";

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn){
		echo "Hubo problemas para conectarse a la base de datos. Intente mas tarde."; die();
	}

?>

