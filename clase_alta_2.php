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

    <?php
        include ('acciones.php');
        include ('dbconfig.php');
        //include ('js/main.js');

      
        $esp = $_POST['especialidad'];

        $sql_prof = "SELECT distinct(hdp.id_horariopro), hdp.dia_mes, hdp.hora FROM profesionales p
                     INNER JOIN horarios_profesionales hp  
                     ON p.id_profesional = hp.id_profesional
                     INNER JOIN horarios_disp_pro hdp
                     ON hdp.id_horariopro = hp.id_horariopro  where especialidad = ".$esp;

        $query = mysqli_query($conn, $sql_prof);
        $fila = mysqli_fetch_all($query);
        $cant_reg = count($fila);

        
    ?>

   
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
                <h3 align=center > Seleccione el Horario </h3>
               <form action="accion_registraclase.php" method="POST" >
                <input type="hidden" id="esp" value="<?php echo $esp ?>"/>
                    <table>
                    <?php                             
                            for ($i=0; $i < $cant_reg ; $i++) { ?>
                             <tr>
                              <td><input type="radio" id="dia[]" name="dia" value= '<?php echo $fila[$i][0]?>' /></td>
                                <td><?php echo $fila[$i][1];   echo $fila[$i][2]; ?></td> 
                            </tr>
                    <?php   }; ?>
                    </table>
                    <input type = "button" id = "boton" value = "Buscar Profesionales"/> <br><br>
                    <div align="center" id="loader" /> </div>
                    <label>Seleccione Profesional</label>
                    <select id="resultado"/>
                    <option id="resultado"></option>
                    </select>

                    <input type="submit" value="Guardar"/>
               </form>
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/valida3.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
      </body>
</html>
