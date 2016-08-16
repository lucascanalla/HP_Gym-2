<?php
include ('acciones.php');
include ('dbconfig.php');
//include ('js/main.js');

$sqlEspecialidades = "SELECT * FROM especialidades";
$query = mysqli_query($conn, $sqlEspecialidades);
$fila = mysqli_fetch_all($query);
//var_dump($fila); die();
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
        <title>-- Clase -- Alta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="row errores hide">
            <div class="medium-8 medium-centered large-4 large-centered columns">
              <div class="alert callout">
                <h5>No se ha enviado el formulario, se han detectado errores:</h5>
                <ul class="listaErrores"></ul>
              </div>
            </div>
        </div>        
        <div class="row">
            <div class="medium-8  large-4 large-centered columns">
               <form action="clase_alta_2.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="NUEVO"/>
                <h3 align=center > Alta Clase </h3>
                
               
                
                <label>Seleccione Especialidad</label>
                <select name="especialidad" class="obligatorio" id="especialidad" >
                        <?php 
                            
                            foreach ($fila as $row) {
                            echo '<option id = "esp" value="'.$row['0'].'">'.$row['1'].'</option>';
                        }
                        ?> 
                </select>
                <input type="submit" value="Continuar"/>
                <td><a align = "left" href="index.php">Cancelar</a></td>
               
               </form>
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
      </body>
</html>
