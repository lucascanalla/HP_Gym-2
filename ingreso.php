<html>
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Busca Socio</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
    	<meta http-equiv="refresh" content="18">
		 
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/iniciarSesion.js"></script>

        <?php include("nav.php"); ?>

		<br><br>
			<h2 align="center">Identifica socio</h1>
			<div class="row errores hide">
            <div class="medium-6 medium-centered large-4 large-centered columns">
              <div class="alert callout">
                <h5>No se ha enviado el formulario, se han detectado errores:</h5>
                <ul class="listaErrores"></ul>
              </div>
            </div>
        	</div>         
				<form action="#" method="GET">
				<div class="medium-6 medium-centered large-4 large-centered columns">
					<p align="center">
					Ingrese DNI:<br>
					</p>
					<p align="center">
			  		  <input type="number" name="dni" id="dni" autofocus autocomplete="off" align="center" >
			  		 <p align="center">  <div id="resultado" align = "center"/> </div></p><br><br> 
					 <p align="center"> <input type="submit" value="Enviar" align="center"> </p>
					</p>
				</form>
		<br>

    <?php
        $hoy = date('Y-m-d');
        @$u = $_GET["dni"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "gimnasio15";
        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM socios WHERE dni = ".$u;
        $result = $conn->query($sql);
        if (@$result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                $dni = $row['dni'];
                $estado = $row['habilitado'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $img = $row['imagen'];
                $e = true;
                $id =  $row['id_socio'];
            }
        } else {
            $existente = false;
        }

        @$sql2 = "SELECT * FROM socios join certificado_med on socios.id_socio = certificado_med.id_socio WHERE socios.id_socio = ".$id;
        $result2 = $conn->query($sql2);
        if (@$result2->num_rows > 0) {
                $cert = true;
                while($row2 = $result2->fetch_assoc()) {
                $fecha = $row2['fecha_caducidad'];
                }
            }else {
                $cert = false;
        }
        $conn->close();


        if (empty($u)) {
        }else{
            if (@$e == false){
                echo "<p align='center'><font color='red'>Socio inexistente</font> </p>";
            }else{
                echo "<p align='center'> Bienvenido: ".$nombre." ".$apellido."</font> <br><br>";    
                echo '<img align="center" height="100" width="100" src="data:image/jpeg;base64,'.base64_encode( $img ).'"/>';
                echo "</p>";
                if ($estado == 1){
                    echo "<p align='center'><font color='Green'>Socio habilitado</font> </p>";  
                }else{
                    echo "<p align='center'><font color='Orange'>Socio no habilitado por favor regularice su situaci&oacuten</font> </p>";      
                }
                if ($cert){
                    if ($hoy > $fecha){
                        echo "<p align='center'><font color='Orange'>Cert. med. vencido</font> </p>";
                    }else{
                    echo "<p align='center'><font color='Green'>Cert. med. ok. Vence en: ".$fecha."</font> </p>";
                    }
                    
                }else{
                    echo "<p align='center'><font color='Orange'>Adeuda cert. med.</font> </p>";
                    
                }
            }   
        }
        ?>

        	
        		

		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
		<script src= "js/busca.js"> </script>
		
    </body>

</html>