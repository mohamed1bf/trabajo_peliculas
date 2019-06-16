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
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /> <!-- css propio -->
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="funciones.js"></script> <!-- js propio -->

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
      <a class="navbar-brand" href="admin.php"><img width="32px" height="32px" src="recursos/img/ejemplo.ico"/></a>
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
	
    
 

	  
<div class="container-fluid" >
  <div class="row content">
  

    <div class="col-sm-9" >
      <center><h1 class="titulo2">Usuarios</h1>
      <hr>
	  <div class="alert alert-info">
		<strong>Leyenda: </strong> 
		Bloquear usuario:<img width="32px" height="32px" src="recursos/img/lock.png"/>
		Dar de baja usuario:<img width="32px" height="32px" src="recursos/img/uncheck.png"/>
		Desbloquear usuario:<img width="32px" height="32px" src="recursos/img/unlock.png"/>
		Activar usuario:<img width="32px" height="32px" src="recursos/img/check.png"/>
	  </div>
      	<input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar usuario" maxlength="30" autocomplete="off" onKeyUp="buscar2();" />	
		<div id="resultadoBusqueda"></div>
      <br>
	  </center>
	  <center><table id="peliculas">
	  <tr>
			<th>Nombre</th>
			<th>Primer Apellido</th>
			<th>Segundo Apellido</th>
			<th>Alias</th>
			<th>Rol</th>
			<th>Estado</th>
			<th>Opciones</th>
	  </tr>
	 
      <!-- extraer datos inicio -->
	  <?php
	  include('conexion.php');
	  $conexion = conecta();
	  //Preparar la consulta
		$consulta = "SELECT * FROM usuarios ORDER BY estado ASC";

		//Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta) ;


      //Extraer fila a fila con un búcle while
		while($fila = mysqli_fetch_assoc($resultado)){
		?>
			<tr>
		
		
			
			<td><?php echo utf8_encode($fila["nombre"]); ?></td>
			<td><?php echo utf8_encode($fila["apellido1"]); ?></td>
			<td><?php echo utf8_encode($fila["apellido2"]); ?></td>
			<td><?php echo utf8_encode($fila["nick"]); ?></td>
			<td><?php echo utf8_encode($fila["rol"]); ?></td>
			<td><?php echo utf8_encode($fila["estado"]); ?></td>
			
			<td>
			<?php if ($fila["estado"] == 'Activo') { ?>
			<a href="bloquear.php?id=<?php echo $fila["claveusuarios"]; ?>"><img width="32px" height="32px" src="recursos/img/lock.png"/></a>
			<a href="baja.php?id=<?php echo $fila["claveusuarios"]; ?>"><img width="32px" height="32px" src="recursos/img/uncheck.png"/></a>
			<?php }elseif  ($fila["estado"] == 'Bloqueado'){ ?>
			<a href="desbloquear.php?id=<?php echo $fila["claveusuarios"]; ?>"><img width="32px" height="32px" src="recursos/img/unlock.png"/></a>
			<?php }elseif  ($fila["estado"] == 'Baja'){ ?>
			<a href="desbloquear.php?id=<?php echo $fila["claveusuarios"]; ?>"><img width="32px" height="32px" src="recursos/img/check.png"/></a>
			<?php }else{ ?>
			
			<?php } ?>
			</td>
			 </tr>
		<?php
	
		}
	  ?>
	    </table>
		
	  </center>
	  <br><br><br>
	 </div>
	 </div>
	 </div> 
	  <!-- extraer datos fin-->
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>


</body>
</html>