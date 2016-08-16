<html>
    <head>
        <title>Login gym</title>
		<meta http-equiv="refresh" content="10">
		 
    </head>
    <body>
<br><br>
<h2 align="center">Ingreso de socios</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<p align="center">
		Ingrese DNI:<br>
	</p>
	<p align="center">
		  <input type="text" name="dni" autofocus autocomplete="off" ><br><br>
		  <input type="submit" value="Enviar" >
	</p>
</form>
<br>

<?php
$hoy = date('Y-m-d');
$u = $_POST["dni"];
$servername = "localhost";
$username = "root";
$password = "";
$db = "gimnasio15";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM socios WHERE dni = ".$u;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$dni = $row['dni'];
		$estado = $row['habilitado'];
		$nombre = $row['nombre'];
		$apellido = $row['apellido'];
		$img = $row['imagen'];
		$e = true;
		$id =  $row['id_socio'];
    }
} else {
	$existente = false;
}

$sql2 = "SELECT * FROM socios join certificado_med on socios.id_socio = certificado_med.id_socio WHERE socios.id_socio = ".$id;
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
		$cert = true;
		while($row2 = $result2->fetch_assoc()) {
		$fecha = $row2['fecha_caducidad'];
		}
	}else {
		$cert = false;
}
$conn->close();


if (empty($u)) {
}else{
	if ($e == false){
		echo "<p align='center'><font color='red'>Socio inexistente</font> </p>";
	}else{
		echo "<p align='center'> Bienvenido: ".$nombre." ".$apellido."</font> <br><br>";	
		echo '<img align="center" height="100" width="100" src="data:image/jpeg;base64,'.base64_encode( $img ).'"/>';
		echo "</p>";
		if ($estado == 1){
			echo "<p align='center'><font color='Green'>Socio habilitado</font> </p>";	
		}else{
			echo "<p align='center'><font color='Orange'>Socio no habilitado por favor regularice su situaci&oacuten</font> </p>";		
		}
		if ($cert){
			if ($hoy > $fecha){
				echo "<p align='center'><font color='Orange'>Cert. med. vencido</font> </p>";
			}else{
			echo "<p align='center'><font color='Green'>Cert. med. ok. Vence en: ".$fecha."</font> </p>";
			}
			
		}else{
			echo "<p align='center'><font color='Orange'>Adeuda cert. med.</font> </p>";
			
		}
	}	
}
?>


    </body>
</html>