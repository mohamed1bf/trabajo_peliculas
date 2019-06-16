
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
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="recursos/jquery-1.9.1.min.js"></script> <!-- Jquery -->
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /><!-- css propio -->
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="funciones.js"></script>
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
	  echo 'Bienvenido: '.$_SESSION['usuario'];
	  ?>
	  <span class="glyphicon glyphicon-log-in"> <input type="submit" class="btn btn-danger" name="cerrarSesion" value="Logout"></span>
	  </form> 
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Cinemabase</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="catalogo.php">Peliculas</a></li>
        <li><a href="area_user.php">Area Personal</a></li>
      </ul><br>
      <div class="input-group">
	  <form accept-charset="utf-8" method="POST">
        
		<input type="text" name="busqueda" id="busqueda" value="" placeholder="Busca en nuestro catálogo" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
        <span class="input-group-btn">
          
        </span>
		</form>
		<div id="resultadoBusqueda"></div>
      </div>
    </div>

    <div class="col-sm-9" >
      <center><h1 class="titulo2">Nuestras peliculas</h1></center>
      <hr>

	  <center>
	  	
	  	<table id="catalogo">
	  <tr>
			<th>Portada</th>
			<th>Título</th>
			<th>Idioma</th>
			<th>Formato</th>
	  </tr>
	 
      <!-- extraer datos inicio -->
	  <?php
	  include('conexion.php');
	  $conexion = conecta();
	  //Preparar la consulta
		$consulta = "SELECT * FROM pelicula ORDER BY clavepelicula DESC";

		//Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta) ;


      //Extraer fila a fila con un búcle while
		while($fila = mysqli_fetch_assoc($resultado)){
		?>
			<tr>
		
		
			<td><a href="peliculas.php?id=<?php echo $fila["clavepelicula"]; ?>"><img class="portada1" src="recursos/img/<?php echo utf8_encode($fila['portada']); ?>"></a></td>
			<td><?php echo utf8_encode($fila["titulo"]); ?></td>
			<td><?php echo utf8_encode($fila["idioma"]); ?></td>
			<td><?php echo utf8_encode($fila["formato"]); ?></td>
			 </tr>
		<?php
	
		}
	  ?>
	    </table>
	  </center>
	 </div>
	 </div>
	 </div> 
	  <!-- extraer datos fin-->

      

<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>


</body>
</html>
