<?php
	$conexionDB = array(
		'direccionIP' => '127.0.0.1', 
		'usuario' => 'root',
		'contrasena' => '',
		'baseDeDatos' => 'gimnasio15' );

	$conexionODBC =  @mysqli_connect( $conexionDB['direccionIP'],
									$conexionDB['usuario'],
									$conexionDB['contrasena'],
									$conexionDB['baseDeDatos']);

	if(!$conexionODBC){
		echo "Hubo problemas para conectarse a la base de datos. Intente mas tarde."; die();
	}
?>