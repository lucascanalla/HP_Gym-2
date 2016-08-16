<?php
  session_start();
  if( !isset($_SESSION['usuarioId']) ){
    header("Location: index.php");
    die();
  }

?>
