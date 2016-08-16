<?php    
    include ('dbconfig.php');
    //var_dump($_POST);die();

    if( sizeof($_GET) > 0 && isset($_GET['id_socio']) ){
        $sqlQuery = "DELETE FROM socios WHERE id_socio = ". $_GET['id_socio'];
        $query = mysqli_query($conn, $sqlQuery);
    }

    if( sizeof($_POST) > 0 && isset($_POST['accion']) && ($_POST['accion'] == 'NUEVO') ){
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$dni = $_POST["dni"];
		$tdni = $_POST["tdni"];
		$dir = $_POST["direccion"];
		$tel = $_POST["telefono"];
		$mail = $_POST["mail"];
		$fec_nac = $_POST["fec_nac"];
        $fec_reg = $_POST["fecha_registracion"];
        
        //var_dump($_POST);
		
		if ( sizeof($_POST["habilitado"]) > 0) {
			$habilitado = 1;
		} else {
			$habilitado = 0;	
		}
		
		$grupo = $_POST["grupo"];
		if (empty($grupo)){ 
			$sqlQuery = "INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `tipo_dni`, `id_grupo`,`fecha_registracion` ) 
			VALUES (NULL, '".$dni."', '".$nombre."', '".$apellido."', '".$dir."', '".$tel."', '".$mail."', '".$fec_nac."', '".$habilitado."', '".$tdni."', NULL, '".$fec_reg."' )";
		}else{
			$sqlQuery = "INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `tipo_dni`, `id_grupo`,`fecha_registracion`) 
			VALUES (NULL, '".$dni."', '".$nombre."', '".$apellido."', '".$dir."', '".$tel."', '".$mail."', '".$fec_nac."', '".$habilitado."', '".$tdni."', '".$grupo."', '".$fec_reg."')";
		}
        //var_dump($sqlQuery); die();
        $query = mysqli_query($conn, $sqlQuery);


    }

    if( sizeof($_POST) > 0  && isset($_POST['accion']) && ($_POST['accion'] == 'MODIFICAR') ){
        //var_dump($_POST);

        $id = $_POST['id_socio'];

        if(empty($_POST['grupo'])){
        $sqlQuery = "UPDATE socios SET 
        dni = '" . $_POST['dni'] . "', 
        nombre = '" . $_POST['nombre'] . "' , 
        apellido = '" . $_POST['apellido'] ."', 
        direccion = '" . $_POST['direccion'] ."',
        telefono = '" . $_POST['telefono'] ."',
        mail = '" . $_POST['mail'] ."',
        fecha_nac = '" . $_POST['fec_nac'] ."',
        habilitado = '" . $_POST['habilitado'] ."',
        id_grupo = NULL,
        tipo_dni = '" . $_POST['tdni'] ."'
        WHERE id_socio = ". $id;
            
        //var_dump($id_grupo);
        }else {        
        //comprobar esta query
        $sqlQuery = "UPDATE socios SET 
        dni = '" . $_POST['dni'] . "', 
        nombre = '" . $_POST['nombre'] . "' , 
        apellido = '" . $_POST['apellido'] ."', 
        direccion = '" . $_POST['direccion'] ."',
        telefono = '" . $_POST['telefono'] ."',
        mail = '" . $_POST['mail'] ."',
        fecha_nac = '" . $_POST['fec_nac'] ."',
        habilitado = '" . $_POST['habilitado'] ."',
        id_grupo = '" . $_POST['grupo'] ."',
        tipo_dni = '" . $_POST['tdni'] ."'
        WHERE id_socio = ". $id;
        }
       //  var_dump($sqlQuery);die();
        $query = mysqli_query($conn, $sqlQuery);
        


    }

    $orden = "socios.id_socio";
    if( sizeof($_GET) > 0  && isset($_GET['orden']) ){
        $orden = 'socios.'.$_GET['orden'];
    }

    $sqlQuery = "SELECT *
                FROM `socios` 
                ORDER BY $orden";
	//echo $sqlQuery;
    $query = mysqli_query($conn, $sqlQuery);

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
        <title>Socios - Listado</title>
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
        <div class="row">
            <div class="medium-6 medium-centered large-4 large-centered columns">
                <p><a href="socio_alta.php">ALTA</a></p>
               <table class="hover">
                    <thead>
                        <tr>
                            <td>
                                <a href="?orden=id_socio">Id</a>
                            </td>
                            <td>
                                <a href="?orden=dni">Dni</a>
                            </td>
                            <td>
                                <a href="?orden=apellido">Apellido</a>
                            </td>
                            <td>Nombre</td>
                        </tr>
                     </thead>
                     <tbody>
                    <?php while( @$fila = mysqli_fetch_array($query) ){ ?> 
                        <tr>
                        	<td><?php echo $fila['id_socio']; ?></td>  
                            <td><?php echo $fila['dni']; ?></td>
                            <td><?php echo $fila['apellido']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>  
                        	                                               
                            <td>
                                <a href="?id_socio=<?php echo $fila['id_socio']; ?>">Eliminar</a>
                                <a href="socio_modificar.php?id_socio=<?php echo $fila['id_socio']; ?>">Modificar</a>
                            </td>
                        </tr>
                    <?php }; ?>
                    </tbody>
               </table>
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
