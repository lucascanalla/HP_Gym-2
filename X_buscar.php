<?php
include("dbconfig.php"); 

 $nombre = $_POST["buscar"];

 $buscarSocio = "SELECT * FROM socios WHERE nombre LIKE '%".$nombre."%' ";

 
 $result = mysqli_query($conn,$buscarSocio);



 ?>


