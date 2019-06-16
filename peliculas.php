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
<head>
  <title>Cinemabase</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /><!-- css propio --> 
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="funciones.js"></script> <!-- funciones js propio--> 

</head>
<body style="background-color:#ddf6dd">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img width="32px" height="32px" src="recursos/img/ejemplo.ico"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	<form action="" method="POST">
		  <?php
	  echo 'Bienvenid@ a la biblioteca Queipo: '.$_SESSION['usuario'];
	  ?>
	  <span class="glyphicon glyphicon-log-in"> <input type="submit" class="btn btn-danger" name="cerrarSesion" value="Logout"></span>
	</form> 
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container-fluid">
<h3><b><center>PELICULAS</b></h3></center>
<br>
<!-- extraer datos inicio -->
	  <?php
	  include('conexion.php');
	  $conexion = conecta();
	  $id = $_GET['id'];
	  //Preparar la consulta
		$consulta = "SELECT * FROM pelicula WHERE clavepelicula = $id";

		//Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta) ;
		//Extraer fila a fila con un búcle while
		while($fila = mysqli_fetch_assoc($resultado)){
		?>
<center><table id="peliculas">
	<tr>
		<th>Idioma</th>
		<th>Formato</th>
		<th>Sinopsis</th>
	</tr>
    <tr>
		<td><?php echo utf8_encode($fila["idioma"]); ?></td><br>
		<td><?php echo utf8_encode($fila["formato"]); ?></td><br>
		<td><?php echo utf8_encode($fila["sinopsis"]); ?> </td>
		
	</tr>	

		<?php
      
		?>
		<p> <img class="portada" width="250px" height="300px" onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="recursos/img/<?php echo utf8_encode($fila['portada']); ?>"></p>
		<h3 class="titulo"><?php echo utf8_encode($fila["titulo"]); ?></h3>
		<hr>
		<?php
		echo '<br>';
		}
	  ?>
</table>
<hr>
</center>
<br><br>
	</div>
	  <!-- extraer datos fin-->
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>

</body>
</html>