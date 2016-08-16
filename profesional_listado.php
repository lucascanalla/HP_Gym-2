<?php    
    include ('dbconfig.php');
    //var_dump($_POST);die();

    if( sizeof($_GET) > 0 && isset($_GET['id_profesional']) ){

        $sql2 = "DELETE FROM horarios_profesionales WHERE id_profesional = ". $_GET['id_profesional'];
        $sqlQuery = "DELETE FROM profesionales WHERE id_profesional = ". $_GET['id_profesional'];
        $query = mysqli_query($conn, $sql2);
        $query = mysqli_query($conn, $sqlQuery);
        
    }

    if( sizeof($_POST) > 0 && isset($_POST['accion']) && ($_POST['accion'] == 'NUEVO') ){
        $sqlQuery = "INSERT INTO profesionales (dni,nombre,apellido,direccion,telefono,mail,fecha_nac,cuil,especialidad,tipo_dni) VALUES ('". $_POST['dni']. "','". $_POST['nombre'] . "','". $_POST['apellido']. "','". $_POST['direccion']. "',
        			'". $_POST['telefono']. "','". $_POST['mail']. "','". $_POST['fecha_nac']. "','". $_POST['cuil']. "',
        			'". $_POST['especialidad'] . "','". $_POST['tipo_dni']. "')";
        //var_dump($sqlQuery); die();
        $query = mysqli_query($conn, $sqlQuery);

     /*   $sqlQuery = "SELECT MAX(id) AS ultId FROM profesionales";
        $query = mysqli_query($conn, $sqlQuery);
        $fila = mysqli_fetch_array($query);

        $ultId = $fila['ultId'];
        $ind= "imagen";
        $hayArchivos = ( sizeof( $_FILES ) > 0 );
        $noHayError =  ( $_FILES[$ind]['error'] == UPLOAD_ERR_OK );
        if( $hayArchivos && $noHayError ) {
            $ext = explode('.', $_FILES[$ind]['name']);
            //$name = $name[ sizeof($name) - 1 ];
            $ext = array_pop($ext);
            $nombre = "$ultId.$ext";
            $errorMov = @move_uploaded_file ( $_FILES[$ind]['tmp_name'] , IMAGENES_PRODUCTOS . $nombre );
        }*/
    }

    if( sizeof($_POST) > 0  && isset($_POST['accion']) && ($_POST['accion'] == 'MODIFICAR') ){
        //var_dump($_POST);
        $id = $_POST['id_profesional'];
        
        $sqlQuery = "UPDATE profesionales SET 
        dni = '" . $_POST['dni'] . "', 
        nombre = '" . $_POST['nombre'] . "' , 
        apellido = '" . $_POST['apellido'] ."', 
        direccion = '" . $_POST['direccion'] ."',
        telefono = '" . $_POST['telefono'] ."',
        mail = '" . $_POST['mail'] ."',
        fecha_nac = '" . $_POST['fecha_nac'] ."',
        cuil = '" . $_POST['cuil'] ."',
        especialidad = '" . $_POST['id_especialidades'] ."',
        tipo_dni = '" . $_POST['tipo_dni'] ."'
        WHERE id_profesional = ". $id;
        //var_dump($sqlQuery);die();
        $query = mysqli_query($conn, $sqlQuery);

      /*  $ind= "imagen";
        $hayArchivos = ( sizeof( $_FILES ) > 0 );
        $noHayError =  ( $_FILES[$ind]['error'] == UPLOAD_ERR_OK );
        if( $hayArchivos && $noHayError ) {            
            $ext = explode('.', $_FILES[$ind]['name']);
            $ext = array_pop($ext);
            $nombre = IMAGENES_PRODUCTOS . $id ;

            if(file_exists ( "$nombre.jpg" )) {
                unlink("$nombre.jpg");
            }
            if(file_exists ( "$nombre.png" )) {
                unlink("$nombre.png");
            }
            if(file_exists ( "$nombre.gif" )) {
                unlink("$nombre.gif");
            }

            $errorMov = @move_uploaded_file ( $_FILES[$ind]['tmp_name'] , "$nombre.$ext" );
        }*/
    }

    $orden = "profesionales.id_profesional";
    if( sizeof($_GET) > 0  && isset($_GET['orden']) ){
        $orden = 'profesionales.'.$_GET['orden'];
    }

    $sqlQuery = "SELECT *
                FROM `profesionales` 
                ORDER BY $orden";

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
            <div class="medium-8 large-4 large-centered columns">
                <p><a href="profesional_alta.php">ALTA</a></p>
               <table class="hover">
                    <thead>
                        <tr>
                            <td>
                                <a href="?orden=id_profesional">Id</a>
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
                        	<td><?php echo $fila['id_profesional']; ?></td>  
                            <td><?php echo $fila['dni']; ?></td>
                            <td><?php echo $fila['apellido']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>  
                        	                                               
                            <td>
                                <a href="?id_profesional=<?php echo $fila['id_profesional']; ?>">Eliminar</a>
                                <a href="profesional_modificar.php?id_profesional=<?php echo $fila['id_profesional']; ?>">Modificar</a>
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
