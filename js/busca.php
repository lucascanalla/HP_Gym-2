<?php
sleep(1);
include('../dbconfig.php');
if($_REQUEST) {
	$dni 	= $_REQUEST['dni'];
	if ($dni == ''){
		echo '<b><div id="dniNoEncontrado" style="color:#8B0000">El DNI no puede ser vacío</div></b>';
	die();
	}

	$sql = "SELECT * from socios where dni = ".$dni;
	$query = mysqli_query($conn, $sql);
	@$results = mysqli_fetch_array($query);
	//var_dump($results); die();
	
	if(!$results)
		echo '<b><div id="dniNoEncontrado" </div></b>';
	
		
}
?>