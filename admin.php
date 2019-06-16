<?php session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ($_POST["cerrarSesion"]){
	session_destroy();
	
	header("Location: index.php");
}


if (!$_SESSION["id_usuario"]){
	header("Location: index.php");
	
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- enlaces a las distintas páginas.-->
<head>
  <title>CinemaBase</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /> <!-- css propio -->
  <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="funciones.js"></script> 

</head>
<!-- barra de navegación 
 --><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><img width="32px" height="32px" src="recursos/img/ejemplo.ico"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	<form action="" method="POST">
	<?php
	  echo 'Bienvenid@ administrador: '.$_SESSION['usuario'];
	  ?>
	  <span class="glyphicon glyphicon-log-in"> <input type="submit" class="btn btn-danger" name="cerrarSesion" value="Logout"></span>
	</form> 
      </ul>
    </div>
  </div>
</nav>
<!-- menu de administrador, para añadir peliculas -->
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Cinemabase</h4>
	  <h3>Panel de administrador</h3>
	   
      <ul class="nav nav-pills nav-stacked">
        <li><a href="admin.php">Usuarios</a></li>
        <li><a href="alta_pelicula.php">Peliculas</a></li>
        
      </ul><br>
	     <hr style="border:1px solid black">
	    <h3>Panel de peliculas</h3>	  
	   <ul class="nav nav-pills nav-stacked">
        <li><a href="alta_productora.php">Alta productora</a></li>
        <li><a href="alta_director.php">Alta director</a></li>
        <li><a href="alta_genero.php">Alta genero</a></li>
        <li><a href="añadir_pelicula.php">Añadir pelicula</a></li>
      </ul><br>
	  <hr style="border:1px solid black">	
	
    </div>
	<br><br>
	  <div class="container margen">
	  <h3>Panel de usuarios</h3>
	  <br>
	  <div class="well"><a href="nuevo_usuario.php">Alta de usuarios</div></a>
	<div class="well"><a href="gestion_users.php">Gestión de usuarios</div></a>
		<br><br>
	</div>
	</div>
	
	
</div>
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>

</body>
</html>