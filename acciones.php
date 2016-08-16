<?php

function getCombo($conn , $sqlQuery, $nameCampo, $vaSeleccionado ){

	$query = mysqli_query($conn, $sqlQuery);
	echo "<select name=$nameCampo>\n";
	while ( $fila = mysqli_fetch_array($query)) {
		$id = $fila['id_especialidad'];
		$descripcion = $fila['desc_especialidad']; 
		$seleccionado = "";
		if($fila['id_especialidad'] == $vaSeleccionado){
			$seleccionado = "SELECTED";
		}
		echo "<option value=$id $seleccionado>$descripcion</option>\n";
	}
    echo "</select>\n";
}




/*function getCombo($nombreTabla, $campoValue, $campoMostrar, $valorSeleccionado ){

include ('dbconfig.php');
$respuesta="<option value=\"\">---Seleccione---</option>";
$sqlQuery = "select " . $campoMostrar . " from " . $nombreTabla . " order by " . $campoMostrar;
$query = mysqli_query($conn, $sqlQuery);
//var_dump($sqlQuery); die();
	while($fila = mysqli_fetch_array($query)){
		$valor="";
		$muestra="";
		$seleccion="";
		eval("if(trim(\$fila->" . $campoValue .  ") == trim('" . $valorSeleccionado .  "')){\$seleccion='selected=\"selected\"';}else{\$seleccion='';}");
		eval("\$valor= \$fila->" . $campoValue . ";");
		$arrCampos = split(",", $campoMostrar);
		for($i=0; $i < count($arrCampos); $i++){
			if($i == 0){
				eval("\$muestra .= \$fila->" . $arrCampos[$i] . ";");
			}else{
				eval("\$muestra .= ', ' . \$fila->" . $arrCampos[$i] . ";");
			}
		}	
		$respuesta .= "<option " . $seleccion . " value='" . $valor . "'>" . encode($muestra) . "</option>";
	}

return $respuesta;
}



function getCombo($nombreTabla, $campoValue, $campoMostrar, $valorSeleccionado){
	$MySession = new cSession();
	$MyDB = new cDataBase($MySession->Consultar("IpDB"), $MySession->Consultar("UserDB"), $MySession->Consultar("PassDB"), $MySession->Consultar("DB"));
	$respuesta="<option value=\"\">---Seleccione---</option>";
	$sql = "select " . $campoMostrar . ", " . $campoValue . " from " . $nombreTabla . " order by " . $campoMostrar;
	$res = $MyDB->EjecutarConsulta($sql);
	while($fila = $MyDB->ObtenerRegistro($res)){
		$valor="";
		$muestra="";
		$seleccion="";
		eval("if(trim(\$fila->" . $campoValue .  ") == trim('" . $valorSeleccionado .  "')){\$seleccion='selected=\"selected\"';}else{\$seleccion='';}");
		eval("\$valor= \$fila->" . $campoValue . ";");
		$arrCampos = split(",", $campoMostrar);
		for($i=0; $i < count($arrCampos); $i++){
			if($i == 0){
				eval("\$muestra .= \$fila->" . $arrCampos[$i] . ";");
			}else{
				eval("\$muestra .= ', ' . \$fila->" . $arrCampos[$i] . ";");
			}
		}	
		$respuesta .= "<option " . $seleccion . " value='" . $valor . "'>" . encode($muestra) . "</option>";
		
	}
	return $respuesta;

*/

?>





