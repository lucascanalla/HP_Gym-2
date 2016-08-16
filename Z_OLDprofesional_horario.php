 <title>Shopping</title>
</head>
<body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/iniciarSesion.js"></script>
    <?php include("nav.php"); ?>
<form action='accion_horario_prof.php' method='post'>
<input type='submit' value='Submit' />
</form> 
<h1>Horarios</h1>
<?php // Script 12.7 - sopping.php

include('dbconfig.php');

$db = mysql_connect('localhost', 'root', '');
mysql_select_db('gimnasio15', $db);

$query = 'SELECT * FROM horarios_disp_pro';
$r = mysqli_query($conn, $query);

if ($r != '' ) { 
    print "<form>
    <table>";

   while ($row = mysqli_fetch_array($r)) {
        print 
        "<tr>
        <td>{$row['id_horariopro']}</td>
        <td>{$row['dia_mes']}</td>
        <td>{$row['hora']}</td>
        <td><input type='checkbox' name='buy[{$row['id_horariopro']}] value='buy' /></td>
        </tr>";
    		}


    print "</table>
    </form>";

} else { 
    print '<p style="color: blue">Error!</p>';
} 

mysql_close($db); // Close the connection.

?>
</body>
</html>