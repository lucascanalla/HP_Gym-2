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
        <title>-- Profesional -- Alta</title>
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
               <form action="profesional_listado.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="NUEVO"/>
                <h3 align=center > Alta Profesional </h3>
                <label>Tipo Documento</label>
               
                <input type="radio" name="tipo_dni" value="0"> L.E.
                <input type="radio" name="tipo_dni" value="1" checked> D.N.I.
                <input type="radio" name="tipo_dni" value="2"> L.C. <br>
                
                <label>Nro Documento *</label>
                <input type="number" name="dni" id="dni" min="1111111" max="99999999" class="numerico" class="obligatorio" value=""/>
                <div id="resultado"/></div>
                <label>Cuil</label>
                <input type="number" name="cuil"  class="numerico" value="" placeholder="Solo números sin guiones" />
                <label>Nombre *</label>
                <input type="text" name="nombre" class="obligatorio" value=""/>
                <label>Apellido *</label>
                <input type="text" name="apellido" class="obligatorio" value=""/>
                <label>Direcci&oacute;n</label>
                <input type="text" name="direccion" value=""/>
                <label>Tel&eacute;fono</label>
                <input type="number" name="telefono" class="numerico" required value=""/>
                <label>Mail *</label>
                <input type="text" name="mail" class="obligatorio" value=""/>
                <label>Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" value=""/>
                <label>Especialidad *</label>
                <select name="especialidad" class="obligatorio" id="especialidad" >
                        <?php 
                            
                            foreach ($fila as $row) {
                            echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
                        }
                        ?> 
                </select>
                <input type="submit" value="Guardar"/>
                <a href="index.php">Cancelar</a>
               
               </form>
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/valida.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
      </body>
</html>
