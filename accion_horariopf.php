<!doctype html>
<html class="no-js" lang="">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registra Horario</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

     	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
      	<script src="js/vendor/modernizr-custom.js"></script>

    </head>
<?php

include('dbconfig.php');

//var_dump($_POST); die();


$id_profesional = $_POST['id_profesional'];
$hora_dia = array();
$hora_dia = $_POST['id_horario'];

/*
$sql_tbl_pagos = "INSERT INTO horarios_profesionales (id_profesional, id_horario)
				  VALUES ('".$forma_pago."','".$id_tarifa."','".$id_socio."','".$fecha_pago."','".$monto."')";
$query_pagos = mysqli_query($conn, $sql_tbl_pagos);




//Busco el último pago recién ingresado

$sql_pagos_id = "SELECT MAX(pagos.id_pago) as ult_id from pagos ";
$query = mysqli_query($conn, $sql_pagos_id);
$id_ult_pago = mysqli_fetch_array($query);
 */


	if (is_array($hora_dia)){
		$cant = count($hora_dia);
		$contador = 0;
		//var_dump($hora_dia); var_dump($cant); 
		foreach ($hora_dia as $key => $value) {
			if ($contador != $cant){
				$sql_horario_prof = "INSERT INTO horarios_profesionales (id_profesional, id_horariopro)
										VALUES ('".$id_profesional."','".$hora_dia[$contador]."')";
				$query_hp = mysqli_query($conn, $sql_horario_prof);
				$contador++;
			}
		}
		
	}
?>
<body>

    	<?php echo "Se han ingresado los Horarios Correctamente."; ?><br>
	    <a href="index.php" class="vinculo">Volver</a>
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
		<?php die(); ?>

    </body>
</html>





