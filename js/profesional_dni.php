<?php
sleep(1);
include(@'../dbconfig.php');
if($_REQUEST) {
	$dni 	= $_REQUEST['dni'];
	$sql = "SELECT * from socios where dni = ".$dni;
	$query = mysqli_query($conn, $sql);
	$results = mysqli_num_rows($query);
	//var_dump($results);  

		if($results > 0)
			echo '<div id="Error">Usuario ya existente</div>';
		else
			echo '<div id="Success"  style="color:#0000FF" >Disponible</div>';
}


?>



<?php
/*if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root','');
            mysql_select_db('gimnasio15', $con);
       
            $sql = mysql_query("SELECT * FROM profesionales WHERE dni = '".$b."'",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
            }
      }     

	
*/
?>

