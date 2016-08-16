

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menú</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a href="index.php" class="brand"><img class="brand" src="/HP-Gym/imagenes/logo.jpg"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li><a href="profesional_listado.php">Alta Profesional<span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gesti&oacute;n de Socio <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="socio_alta.php">Nuevo</a></li>
            <li><a href="socio_listado.php">Listado</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="identificaSocio.php">Pago de Cuota</a></li>
           </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gesti&oacute;n de Profesionales <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profesional_alta.php">Nuevo</a></li>
            <li><a href="profesional_listado.php">Listado</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="identificaProfesional.php">Horarios Profesionales</a></li>
           </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gesti&oacute;n de Clases <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="clase_alta.php">Crear Clase</a></li>
          </ul>
        </li>
         <li><a href="contacto.php">Contacto</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="muestraProductos.php" method="POST" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="buscar" placeholder="Socio">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
     
		
    </div><!-- /.navbar-collapse -->	
  </div><!-- /.container-fluid -->
</nav>