<html>
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pago de Cuotas GYM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

	   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
      	<script src="js/vendor/modernizr-custom.js"></script>
      	<script type="text/javascript">
			
						function calcular(){

							var cont = 0;
							var tarifa = document.getElementById('tarifa').value;
							var descuento = document.getElementById('descuento').value;

							$('input[type=checkbox]').each(function () {
						           if (this.checked) {
						              cont = cont +1; 
						           }
						        
							});

							//si paga 3 cuotas juntas, 20% de descuento
							 if (cont>=3){
							 	descuento = 0.8;
							 	console.log(descuento);
							 }
							  

							if (document.getElementById("id_mes[]").checked){
								
							var total =  tarifa * descuento * cont;
							document.getElementById('monto').value = total;

							} else{

								var error = "Debe seleccionar un Mes para calcular.";
								document.getElementById('monto').value = error;								
							}
				   }
		</script>

		
    </head>
    <body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/iniciarSesion.js"></script>
    <?php include("nav.php"); ?>

		<h2 align = "center">Pago de Cuotas</h1>


<?php

	$hoy = date('Y-m-d');
	$u = $_GET["dni"];
	include 'dbconfig.php';
	$conn = mysqli_connect($servername, $username, $password, $db);
	$result2 = array();
	$per = array();
	$compara = array('id_periodo' =>'' , 'descripcion' => '' );
	$id_mes = array();
	//$i = $_GET["id_socio"];
	//var_dump($i); die();



	//arranco con las consultas
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	//A partir de la fecha de registracion, muestro solamente 

	$sql_socio = "SELECT concat (socios.nombre,' ',socios.apellido), socios.id_socio, socios.fecha_registracion 
					FROM socios WHERE dni =".$u;

	$query4 = mysqli_query($conn, $sql_socio);
	$socio = mysqli_fetch_row($query4);

	$fech = $socio[2];
	list($anio, $mes, $dia) = explode("-", $fech);
	$desde = intval($mes);



	//Pregunto si tiene grupo familiar para calcular el descuento.

	$sql_grupo = "SELECT * FROM socios JOIN grupo_familiar on socios.id_grupo = grupo_familiar.id_grupo WHERE dni = ".$u;
	$result = $conn->query($sql_grupo);
		if ($result->num_rows > 0) {

	   		while($row = $result->fetch_assoc()) {
			$grupo_familiar = $row['id_grupo'];
			$estado = $row['estado'];
				if ($grupo_familiar != "" and $estado = "1"){
					$existe_grupo = true;
				}
			
	    	}
				} else {
		$existe_grupo = false;
		}


			if ($existe_grupo){
						//segun RN08 descuento del 20%
						$descuento = 0.8;		
					}else {
						$descuento = 1;
						}


	//Veo los periodos pagos. REVISAR BIEN LA QUERY EN EL OR DEL WHERE. ESTA MAL ESTA CONSULTA!!!!!!!!!!!!!!!!!!!!!!!!!

	$sql_cuotaspagas = "SELECT  periodos.* 
								   FROM socios INNER JOIN pagos on socios.id_socio = pagos.id_socio 
											   INNER JOIN pagos_x_periodo on pagos.id_pago = pagos_x_periodo.id_pago
											   INNER JOIN periodos on periodos.id_periodo = pagos_x_periodo.id_periodo
											  	WHERE socios.dni = '".$u."' or periodos.id_periodo >'".$desde."'" ;

	//var_dump($sql_cuotaspagas); die();
	$sql_periodos = " SELECT * FROM periodos";

	$sql_tarifa = "SELECT tarifas.id_tarifa ,tarifas.precio FROM tarifas WHERE tarifas.estado = '1'";

	//var_dump($sql_periodos); die();

	$query = mysqli_query($conn, $sql_cuotaspagas);
	$query2 = mysqli_query($conn, $sql_periodos);
	$query3 = mysqli_query($conn, $sql_tarifa);

	$result2 = mysqli_fetch_all($query);
	$per = mysqli_fetch_all($query2);
	@$precio = mysqli_fetch_array($query3);

	//var_dump($precio);die();



	// ARRAY_DIFF(PARAM1, PARAM2): COMPARA 2 ARREGLOS Y DEJA SOLO LOS QUE ESTAN EN EL PRIMER  argumento (arreglo) Y NO EN EL SEGUNDO.

	@$compara =  array_diff_assoc($per, $result2);
	$tamanio = sizeof($compara);
	//var_dump($tamanio); die();

	//paso la tarifa a valor INTEGER
	$tar = intval($precio["precio"]);

	//var_dump($existe_grupo); var_dump($descuento); var_dump($tar);

?>

<form id="form1" action="accion_pagocuota.php" method="POST">
	<div class="medium-6 medium-centered large-4 large-centered columns">
		<p>Per&iacute;odos a Pagar por el Socio: <?php echo $socio[0] ?> </p>
			<table>
				<input type="hidden" name="id_socio" value="<?php echo $socio[1] ?>"/>
				<input type="hidden" name="id_tarifa"  value="<?php echo $precio["id_tarifa"] ?>"/>
				<input type="hidden" name="tarifa" id="tarifa"  value="<?php echo $tar ?>"/>
				<input type="hidden" name="descuento" id="descuento"  value="<?php echo $descuento ?>"/>
				
				<?php  foreach ($compara as $row ) {?>
						
						<tr>
                            <td><?php echo $row[1]; ?></td>
                            <td><input type='checkbox'  id="id_mes[]" name="id_mes[]" value='<?php echo $row[0]?>'  /></td>           
                        </tr>
                        
				<?php }; ?>
		
				</table>
	
	
			
			<td>
				<input type="radio" name="forma_pago" value="0" checked> Contado
				<input type="radio" name="forma_pago" value="1"> Tarjeta
			</td>
			<br><br>
			<td>
			<input type="button" name="calcula" id="calcula" value="Calcular" onclick="calcular()">
			<br><br>
			Monto a pagar<input type="text" name="monto" id="monto" readonly="readonly" >
			</td>
			<tr>
		<br>
		<br>	
			<td>
				<input align = "center" type="submit" name = 'pagar' value="Paga Cuotas">
			</td>
			<td> <a href="index.php"> Cancelar </a>
			</td>
		</tr>
</form>	
	
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>

			
	</h2>
</body>
