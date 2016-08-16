<?php

    include('dbconfig.php');

    $errores = array(); $fila = array(); $pases = false;

    if(isset($_COOKIE['recordar'])){

        $recordado = $_COOKIE['recordar'];
    }

    if( sizeof($_POST) > 0 ){
        
        //var_dump($_COOKIE);
        $nombre_usuario = strtolower( trim( $_POST['nombre_usuario'] ) );
        $contrasena = $_POST['contrasena'];


        $sqlQuery = "SELECT *
                    FROM usuarios
                    WHERE ( nombre_usuario LIKE '" . $nombre_usuario . "' AND
                        contrasena LIKE MD5('" . $contrasena . "')";
        //echo $sqlQuery; die();
        $query = mysqli_query($conexionODBC, $sqlQuery);
        $cantRegistros = mysqli_num_rows($query);

        if(isset($_POST['recordar'])){

            setcookie('recordar', $nombre_usuario, time()+(60*60*24*30));
        }

        if($cantRegistros == 0 ){
            $errores[] = "El nombre_usuario o la contrase&ntilde;a es INCORRECTA";
            $pases = false;
        }else{
            // Identificación Correcta
            $fila = mysqli_fetch_array($query);
            session_start();
            $_SESSION['usuarioId'] = $fila['id_usuario'];
            $_SESSION['datosUsuario'] = $fila;
            header("Location: listado.php");
            die();
        }
    }

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Clase 09 - MySQL</title>
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
        <?php if( sizeof($fila) > 0 ) { ?>
        <div class="row">
            <div class="medium-6 medium-centered large-4 large-centered columns">
                <h2>Bienvenido <?php echo $fila['nombre_usuario']; ?></h2>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="medium-6 medium-centered large-4 large-centered columns">
                <?php
                    $cantErrores = sizeof($errores);
                    if( $cantErrores > 0 ){
                ?>
                    <div class="callout alert">
                      <?php
                        for ($i=0; $i < $cantErrores ; $i++) { ?>
                            <p><?php echo $errores[$i];?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <form method="POST" action="login.php">
                    <div class="row column log-in-form">
                    <h4 class="text-center">Ingrese con su Usuario</h4>
                    <label>Nombre de Usuario
                            <?php 
                            //Checkbox recordad activo
                            if (isset($recordado) && !isset($nombre_usuario)) {?> 
                            <input type="text"
                                name="nombre_usuario"
                                placeholder="alguien"
                                value="<?php echo $recordado ; ?>">
                           <?php } ?>
                            
                            <?php 
                            //La misma sesión
                            if (isset($nombre_usuario)) {?> 
                            <input type="text"
                                name="nombre_usuario"
                                placeholder="alguien"
                                value="<?php echo  $nombre_usuario ; ?>">
                           <?php } ?>
                            
                            <?php 
                            // Primera vez
                            if (!isset($nombre_usuario) && !isset($recordado)) {?> 
                            <input type="text"
                                name="nombre_usuario"
                                placeholder="alguien"
                                value="">
                           <?php } ?>
                    </label>
                    <label>Contrase&ntilde;a
                        <input type="password"
                                name="contrasena"
                                placeholder="Contraseña">
                    </label>
                    <label><input type="checkbox"
                                name="recordar">
                                Recordar mi usuario
                    </label>
                    <p><input type="submit" class="button expanded"/></p>
                    <?php if (isset($_POST)  && $cantErrores == 0) {
                                if($pases = true){
                                    header ("Location: index.php ");
                                }
                        }?>
                    </div>
                </form>
            </div>
        </div>


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
