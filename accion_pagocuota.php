<!doctype html>
<html class="no-js" lang="">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pago Cuota</title>
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

$id_socio = $_POST['id_socio'];
$f_p = $_POST['forma_pago'];
$monto = $_POST['monto'];
$id_tarifa = $_POST['id_tarifa'];
$fecha_pago = date('Y-m-d');
$mes = array();
$mes = $_POST['id_mes'];
$valor = true;
$actualizo = false;

if ($f_p = 0){
	$forma_pago = 'Efectivo';
}
	else {$forma_pago = 'Tarjeta';	}


//Si el socio está Inhabilitado, cambio el estado.

$sql_socio = "SELECT * from socios where id_socio = ".$id_socio;
$query_socio = mysqli_query($conn, $sql_socio);
$fila = mysqli_fetch_array($query_socio);
//var_dump($fila['habilitado']); die();


if ($fila['habilitado'] != '1'){

 $sql = "UPDATE socios SET 
        habilitado = '1' 
        WHERE id_socio = ". $id_socio;
$query_habilita = mysqli_query($conn, $sql);
$actualizo = true;
 
}


//Inserto el pago

if ($valor == true){
$sql_tbl_pagos = "INSERT INTO pagos (forma_pago, id_tarifa, id_socio, fecha_pago, monto)
				  VALUES ('".$forma_pago."','".$id_tarifa."','".$id_socio."','".$fecha_pago."','".$monto."')";
$query_pagos = mysqli_query($conn, $sql_tbl_pagos);
$valor = false;
}


//Busco el último pago recién ingresado

$sql_pagos_id = "SELECT MAX(pagos.id_pago) as ult_id, pagos.recepcionista   from pagos ";
$query = mysqli_query($conn, $sql_pagos_id);
$id_ult_pago = mysqli_fetch_array($query);
 
	if (is_array($mes)){
		$cant_meses = count($mes);
		$contador = 0;
		foreach ($mes as $key => $value) {
			if ($contador != $cant_meses){
				$sql_pagos_x_periodo = "INSERT INTO pagos_x_periodo (id_periodo, id_pago)
										VALUES ('".$mes[$contador]."','".$id_ult_pago[0]."')";
				$query_ppp = mysqli_query($conn, $sql_pagos_x_periodo);
				$contador++;
			}
		}
		
	}
?>
<body>

    	<?php echo "Se ha ingresado el Pago correctamente. Nro Comprobante de Pago = $id_ult_pago[0]. Registrado por $id_ult_pago[1]. ";
    	if($actualizo){echo "El estado actual del socio es Habilitado";} ;?><br>
	    <a href="index.php" class="vinculo">Volver</a>
	    <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
         <?php die(); ?>
    </body>
</html>





