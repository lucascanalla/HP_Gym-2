<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

sleep(1);
include('../dbconfig.php');

if($_REQUEST) {
	 
	//CALCULAR EL LARGO DEL REQUEST, SI ES = 10, HACER UN IF  TAL QUE $dia 	= substr($cortar, 2, 2);
	$cortar = $_REQUEST['data'] ;
	$largo  = strlen($cortar);


	if($largo == 9){
			$dia 	= substr($cortar, 2, 1);
			$esp 	= substr($cortar, 6, 1);
	}else{
			$dia 	= substr($cortar, 2, 2);
			$esp 	= substr($cortar, 7, 1);
	}
	//var_dump($largo);die();

	if ($dia == ''){
		echo '<b><div id="dniNO" style="color:#8B0000">NO</div></b>';
	die();
	}

	$sql = "SELECT profesionales.id_profesional, concat(profesionales.nombre,' ',profesionales.apellido) nom from profesionales
			INNER JOIN horarios_profesionales on horarios_profesionales.id_profesional = profesionales.id_profesional 
			where horarios_profesionales.id_horariopro = '".$dia."' and profesionales.especialidad = ".$esp;
	//var_dump($sql); die();
	$query = mysqli_query($conn, $sql);
	@$results = mysqli_fetch_all($query);
	$cant = count($results);
	//var_dump($results);
	//var_dump($cant); die();
	
	if(!$results){
		echo '<b><div id="dniNO" style="color:#8B0000">Error: No hay un Profesional disponible para el Horario seleccionado</div></b>' ;?>
		<?php }else{ ?>
				<select/> <?php for ($i=0; $i < $cant; $i++) { ?>
					<option name ="id_profesional" value= "<?php echo $results[$i][0]?>" ><?php echo $results[$i][1]?> </option>
				<?php } ?> 
				</select>
			<?php }
	
}
?>



</body>

</html>