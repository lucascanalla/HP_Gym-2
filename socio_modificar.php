<?php    
   include ('dbconfig.php');
    require('acciones.php');
    $sqlQuery = "SELECT * FROM socios WHERE id_socio =".$_GET['id_socio'];
	//echo $sqlQuery;
    $sqlGrupo = "SELECT * FROM grupo_familiar";
    $id = intval($id_socio = $_GET['id_socio']);
    //var_dump($id);
    
    $query = mysqli_query($conn, $sqlQuery);
    $query2 = mysqli_query($conn, $sqlGrupo);

    $fila = mysqli_fetch_array($query);
    $fila2 = mysqli_fetch_all($query2);
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/iniciarSesion.js"></script>
        <?php include("nav.php"); ?>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>-- Socio -- Modificar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="row errores hide">
            <div class="medium-6 medium-centered large-4 large-centered columns">
              <div class="alert callout">
                <h5>No se ha enviado el formulario, se han detectado errores:</h5>
                <ul class="listaErrores"></ul>
              </div>
            </div>
        </div>         
        <div class="row">
            <div class="medium-6 medium-centered large-4 large-centered columns">
            	<h3 align=center > Modificar socios </h3>
               <form action="socio_listado.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="MODIFICAR"/>
                <input type="hidden" name="id_socio" value="<?php echo $id ?>"/>
				<table>
					<tr>
						<td><label>Nombre</label></td>
						<td><input type="text" required  name="nombre" class="obligatorio" value="<?php echo $fila['nombre']?>"/></td>
					</tr>
					<tr>
						<td><label>Apellido</label></td>
						<td><input type="text" required name="apellido" class="obligatorio" value="<?php echo $fila['apellido']?>"/></td>
					</tr>
					<tr>
						<td><label>Tipo Documento</label></td>
						<td><input type="radio" name="tdni" value="DNI" checked> D.N.I <input type="radio" name="tdni" value="LE"> L.E. <input type="radio" name="tdni" value="LC"> L.C. <td>
					</tr>
					<tr>
					    <td><label>Nro Documento</label></td>
						<td><input type="number" readonly="readonly" name="dni" required class="numerico" class="obligatorio" value="<?php echo $fila['dni']?>"/>
					</tr>
					<tr>
					    <td><label>Direcci&oacute;n</label></td>
						<td><input type="text" name="direccion" value="<?php echo $fila['direccion']?>"/></td>
					</tr>
			
					
					<tr>
					    <td><label>Tel&eacute;fono</label></td>
						<td><input type="text" name="telefono" value="<?php echo $fila['telefono']?>"/></td>
					</tr>
			
					
					<tr>
					    <td><label>Mail</label></td>
						<td><input type="email" required name="mail" value="<?php echo $fila['mail']?>"/></td>
					</tr>
			
					<tr>
					    <td> <label>Fecha Nacimiento</label></td>
						<td><input type="date" name="fec_nac" required value="<?php echo $fila['fecha_nac']?>"/></td>
					</tr>
					<tr>
					    <td><label>Habilitado<label></td>
						<td><input type="checkbox" name="habilitado"  checked value=""/></td>
					</tr>					
					<tr>
					    <td><label>Grupo Familiar</label></td>
						<td> <select name="grupo" class="obligatorio" id="grupo" >
							<option value=''> Ninguno </option>
							<?php foreach ($fila2 as $row) { echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';}?> 
							</select></td>
					</tr>
					<tr>
					    <td><input type="submit" value="Modificar"/></td>
						<td><a href="index.php">Cancelar</a> </td>
					</tr>

				</table>
            





     
                
               </form>
               
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
