<html>
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pago de Cuotas GYM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-custom.js"></script>
        
    </head>

    <body>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/iniciarSesion.js"></script>
    <?php include("nav.php"); ?>
    <?php // Script 12.7 - sopping.php

        include('dbconfig.php');

        if(@$_GET['id_profesional']){
        $id = $_GET['id_profesional'];
        }else{

            $sql = "SELECT profesionales.id_profesional from profesionales where dni =".$_GET['dni'];
            $query = mysqli_query($conn, $sql);
            $r = mysqli_fetch_row($query);
            $id = intval($r['0']);
        }

       
        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM         horarios_disp_pro where id_horariopro between 1 and 11";
        $query = mysqli_query($conn, $sql_lunes);   
        $l = mysqli_fetch_all($query);

        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM horarios_disp_pro where id_horariopro between 12 and 22";
        $query = mysqli_query($conn, $sql_lunes);   
        $m = mysqli_fetch_all($query);

        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM horarios_disp_pro where id_horariopro between 23 and 33";
        $query = mysqli_query($conn, $sql_lunes);   
        $mi = mysqli_fetch_all($query);

        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM horarios_disp_pro where id_horariopro between 34 and 44";
        $query = mysqli_query($conn, $sql_lunes);   
        $j = mysqli_fetch_all($query);

        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM horarios_disp_pro where id_horariopro between 45 and 55";
        $query = mysqli_query($conn, $sql_lunes);   
        $v = mysqli_fetch_all($query);

        $sql_lunes = "SELECT horarios_disp_pro.id_horariopro, concat(horarios_disp_pro.dia_mes,' ',horarios_disp_pro.hora) FROM horarios_disp_pro where id_horariopro between 56 and 66";
        $query = mysqli_query($conn, $sql_lunes);   
        $s = mysqli_fetch_all($query);


    ?>
        <br><h1 align = "center">Horarios</h1></br>
        <form action="accion_horariopf.php" method="POST">
            <div class="medium-6 medium-centered large-3 large-centered columns">
            <input type="hidden" name="id_profesional" value="<?php echo $id; ?>"/>


            <table>
                <tr>
               
                    <?php  foreach ($l as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                                               
                            </tr>
                    <?php }; ?>
                </tr>

            <td>
                <tr>
               
                    <?php  foreach ($m as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                            </tr>
                    <?php }; ?>
                </tr>
            </td>

             <td>
                <tr>
               
                    <?php  foreach ($mi as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                               
                            </tr>
                    <?php }; ?>
                </tr>
            </td>

            <td>
                <tr>
               
                    <?php  foreach ($j as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                               
                            </tr>
                    <?php }; ?>
                </tr>
            </td>

            <td>
                <tr>
               
                    <?php  foreach ($v as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                               
                            </tr>
                    <?php }; ?>
                </tr>
            </td>

            <td>
                <tr>
               
                    <?php  foreach ($s as $row ) {?>
                            <tr>
                                <td><input type='checkbox' name="id_horario[]" value='<?php echo $row[0]?>' /></td>
                                <td><?php echo $row[1]; ?></td>
                               
                            </tr>
                    <?php }; ?>
                </tr>
            </td>
                </tr>
            </table>
                   
            <td>
                <input align = "center" type="submit" name = 'pagar' value="Registrar Horarios">
            </td>
            <td> <a href="index.php"> Cancelar </a>
            </td>
        </tr>
        </form> 
            



    </body>
</html>