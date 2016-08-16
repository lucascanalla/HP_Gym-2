<html>
    <head>
        <title>Login gym</title>
		
    </head>
    <body>

<h2>Ingreso de socios</h1>

<form action="accion_inscribir.php" method=post>
	<table>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" value=""></td>
		</tr>
		<tr>
			<td>Apellido</td>
			<td><input type="text" name="apellido" value=""></td>
		</tr>
		<tr>
			<td>DNI</td>
			<td><input type="text" name="dni" value=""></td>
		</tr>
		<tr>
			<td>Tipo DNI:</td>
			<td>
				<input type="radio" name="tdni" value="0" checked> L.E.
				<input type="radio" name="tdni" value="1"> D.N.I.
				<input type="radio" name="tdni" value="2"> L.C.
			</td>
		</tr>
		<tr>
			<td>Dirección</td>
			<td><input type="text" name="direccion" value=""></td>
		</tr>
		<tr>
			<td>Teléfono</td>
			<td><input type="text" name="telefono" value=""></td>
		</tr>
		<tr>
			<td>Mail</td>
			<td><input type="text" name="mail" value=""></td>
		</tr>
		<tr>
			<td>Fecha Nac</td>
			<td><input type="text" name="fec_nac" value="">*mm/dd/aaaa</td>
		</tr>		
		<tr>
		<tr>
			<td>habilitado</td>
			<td><input type="checkbox" name="habilitado" ></td>
		</tr>
		<tr>
			<td>Grupo Familiar</td>
			<td><input type="text" name="grupo" value=""></td>
		</tr>
		<tr>
			<td>Imagen</td>
			<td><input type="text" name="imagen" value=""></td>
		</tr>
		
			<td>
			<input type="submit" value="Crear socio">
			</td>
		</tr>
</table>	
<br>	

<a href="index.php"> Volver al menu principal </a>
		
	
	
  
	


</form>