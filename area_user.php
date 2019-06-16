
<!-- para abrir sesion -->

<?php session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($_POST["cerrarSesion"]){
	session_destroy();
	
	header("Location: index.php");
}


if (!$_SESSION["id_usuario"]){
	header("Location: index.php");
	
}
$id = $_SESSION["id_usuario"];
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
	  echo 'Bienvenid@S: '.$_SESSION['usuario'];
	  ?>
	  <span class="glyphicon glyphicon-log-in"> <input type="submit" class="btn btn-danger" name="cerrarSesion" value="Logout"></span>
	</form> 
      </ul>
    </div>
  </div>
</nav>

 <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Cinemabase</h4>
	   
      <ul class="nav nav-pills nav-stacked">
        <li><a href="catalogo.php">Peliculas</a></li>
        <li><a href="area_user.php">Area Personal</a></li>
      </ul><br>
   
    </div>

    <div class="col-sm-9">
      <h1><small>Área usuario</small></h1>
      <hr>
	   <?php
	   $id = $_SESSION["id_usuario"];
	  include('conexion.php');
	  $conexion = conecta();
	  //$id = $_GET['id'];
	  //Preparar la consulta
		$consulta1 = "SELECT * FROM usuarios WHERE claveusuarios = '$id'  ";

		//Ejecutar la consulta
		$resultado1 = mysqli_query($conexion, $consulta1) ;
		$fila1 = mysqli_fetch_assoc($resultado1);
		?>
	  <?php if ($fila1["estado"] == 'Activo' ){
		  
		  echo '<img src="recursos/img/activo.png" width="85px" height="85px">';
	  }else{
		  echo '<img src="recursos/img/inactivo.png" width="85px" height="85px">';
	  }
		  echo utf8_encode($fila1["estado"]); ?></div>

<br>
<div class="container-fluid">
<br>
<!-- extraer datos inicio -->
	  <?php
	 
	 // $id = $_GET['id'];
	 $id = $_SESSION["id_usuario"];
	  //Preparar la consulta
		$consulta = "SELECT * FROM usuarios WHERE claveusuarios = '$id'  ";

		//Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta) ;
		?>
		<center><table id="peliculas"> <!-- Le doy el id de la tabla que ya tengo diseñada-->
	<tr>
		<th>Nombre</th>
		<th>Primer Apellido</th>
		<th>Segundo Apellido</th>
		<th>Contraseña</th>
		<th>Alias</th>
		<th>Dirección</th>
		<th>Teléfono</th>
		<th>Estado</th>
		<th>Rol</th>
		
	</tr>
		
		<?php
		//Extraer fila a fila con un búcle while
		while($fila = mysqli_fetch_assoc($resultado)){
		?>

    <tr>
		<td><?php echo utf8_encode($fila["nombre"]); ?></td>
		<td><?php echo utf8_encode($fila["apellido1"]); ?></td>
		<td><?php echo utf8_encode($fila["apellido2"]); ?> </td>
		<td><?php echo utf8_encode($fila["pass"]); ?></td>
		<td><?php echo utf8_encode($fila["nick"]); ?></td>
		<td><?php echo utf8_encode($fila["direccion"]); ?></td>
		<td><?php echo utf8_encode($fila["telefono"]); ?></td>
		<td><?php echo utf8_encode($fila["estado"]); ?></td>
		<td><?php echo utf8_encode($fila["rol"]); ?></td>
		
	</tr>	

		<?php

		}
	  ?>
</table>
<hr>

</center>
<br><br>   </div>


	</div>
	  <!-- extraer datos fin-->
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>

</body>
</html>