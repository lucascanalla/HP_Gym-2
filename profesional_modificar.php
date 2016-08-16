<?php    
    include ('dbconfig.php');
    require('acciones.php');
    $sqlQuery = "SELECT * FROM profesionales WHERE id_profesional =".$_GET['id_profesional'];
    $sqlEspecialidades = "SELECT * FROM especialidades";
    $id = intval($id_profesional = $_GET['id_profesional']);
    var_dump($id);
    
    $query = mysqli_query($conn, $sqlQuery);
    $query2 = mysqli_query($conn, $sqlEspecialidades);

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
        <title>-- Profesional -- Modificar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    
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
                <h3 align=center > Modificar Profesional </h3>
               <form action="profesional_listado.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="MODIFICAR"/>
                <input type="hidden" name="id_profesional" value="<?php echo $id ?>"/>
                <label>Tipo Documento</label>
               
                <input type="radio" name="tipo_dni" value="<?php if($fila['tipo_dni'] === '0'){echo $fila['tipo_dni'];}?>">  L.E.
                <input type="radio" name="tipo_dni" value="<?php if($fila['tipo_dni'] === '1'){echo $fila['tipo_dni'];}?>"> D.N.I.
                <input type="radio" name="tipo_dni" value="<?php if($fila['tipo_dni'] === '2'){echo $fila['tipo_dni'];}?>"> L.C. <br>
                

                <label>Tipo Documento</label>
                <input type="text" name="tipo_dni" value="<?php echo $fila['tipo_dni']?>"/>
                <label>Nro Documento *</label>
                <input type="number" name="dni" readonly="readonly" id= "dni" class="obligatorio" value="<?php echo $fila['dni']?>"/>
                <div id="resultado"/></div>
                <label>Cuil</label>
                <input type="number" name="cuil" placeholder="Solo números sin guiones" value="<?php echo $fila['cuil']?>"/>
                <label>Nombre *</label>
                <input type="text" name="nombre" class="obligatorio" value="<?php echo $fila['nombre']?>"/>
                <label>Apellido *</label>
                <input type="text" name="apellido" class="obligatorio" value="<?php echo $fila['apellido']?>"/>
                <label>Direcci&oacute;n</label>
                <input type="text" name="direccion" value="<?php echo $fila['direccion']?>"/>
                <label>Tel&eacute;fono</label>
                <input type="number" name="telefono" value="<?php echo $fila['telefono']?>"/>
                <label>Mail *</label>
                <input type="text" name="mail" class="obligatorio" value="<?php echo $fila['mail']?>"/>
                <label>Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" value="<?php echo $fila['fecha_nac']?>"/>
                <label>Especialidad *</label>
                            <?php 
                                getCombo($conn , $sqlEspecialidades, "id_especialidades", $fila['especialidad'] ); 
                            ?>
                            

               <!-- <label>Categoria:</label>
                <?php 
                /*
                    $sqlCategorias = "SELECT * FROM categorias";
                    genera_combo($conexionODBC , $sqlCategorias, "id_categoria", $fila['id_categoria'] );
                */ ?>
                -->

                <input type="submit" value="Modificar"/>
                 <a href="index.php">Cancelar</a>
                 <a href="profesional_horario.php?id_profesional=<?php echo $id ?> ">Horarios Disponibles</a>
               </form>
               
            </div>
        </div>            


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
