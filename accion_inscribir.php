<?php
include 'dbconfig.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$tdni = $_POST["tdni"];
$dir = $_POST["direccion"];
$tel = $_POST["telefono"];
$mail = $_POST["mail"];
$fec_nac = $_POST["fec_nac"];

if ($_POST["habilitado"] == 'on') {
	$habilitado = 1;
} else {
    $habilitado = 0;
}

$grupo = $_POST["grupo"];


 


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_test = "INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `tipo_dni`, `id_grupo`) 
	VALUES (NULL, '32539742	', 'Ignacio', 'Geli', 'Rioja552 7a', '155031757', 'ignacio_geli@gmail.com', '2016-07-20', '1', 'DNI', '2')";
	
if (empty($grupo)){
	$sql = "INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `tipo_dni`) 
	VALUES (NULL, '".$dni."', '".$nombre."', '".$apellido."', '".$dir."', '".$tel."', '".$mail."', '".$fec_nac."', '".$habilitado."', '".$tdni."')";
}else{
	$sql = "INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `tipo_dni`, `id_grupo`) 
	VALUES (NULL, '".$dni."', '".$nombre."', '".$apellido."', '".$dir."', '".$tel."', '".$mail."', '".$fec_nac."', '".$habilitado."', '".$tdni."', '".$grupo."')";
}
	
	
	echo "<br><br><br>";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?>





