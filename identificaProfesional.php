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
			<h2 align="center">Buscador de Profesional</h1>
			<div class="row errores hide">
            <div class="medium-6 medium-centered large-4 large-centered columns">
              <div align="center" class="alert callout">
                <h5 align="center">No se ha enviado el formulario, se han detectado errores:</h5>
                <ul align="center" class="listaErrores"></ul>
              </div>
            </div>
        	</div>         
				<form action="profesional_horario.php" method="GET">
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
	
		

		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.min.js"></script>
		<script src= "js/busca2.js"> </script>
		<script src= "js/main3.js"> </script>
		

    </body>

</html>