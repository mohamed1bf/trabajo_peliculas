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
	<!-- enlaces a las distintas páginas.-->

  <title>Cinemabase</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /> <!-- css propio -->
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="js/formulario_libro.js"></script>
  <script src="funciones.js"></script> 

</head>
<!-- barra de navegación 
 -->
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
    
 

	  
<!-- formulario de nueva pelicula -->
<div class="container">
<center><h3></h3>
        <div class="row centered-form">
		
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	
        	<div class="panel panel-default">
			
        		<div class="panel-heading">
				
			    		<h3 class="panel-title">Nueva pelicula</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="post" id= "registration_form" action="alta.php" role="form" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			              <input type="text" id="form_titulo" class="form-control input-sm" placeholder="titulo" name="titulo" required="">
        				  <span class="error_form" id="titulo_error_message"></span>
			    					</div>
			    				</div>
			    			
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" id="form_formato" class="form-control input-sm" placeholder="formato" name="formato" required="">
        								<span class="error_form" id="formato_error_message"></span>
			    					</div>
			    				</div>
								
									<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><label>Idioma</label>
			    						<select name="idioma">
											<option value="Spanish">Español</option> 
											<option value="English">Inglés</option>
										</select>	
			    					</div>
			    				</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><label>Productora</label>
										<select name="productora">
										<?php
										include('conexion.php');
										$conexion = conecta();
										//Preparar la consulta
										$consulta = "SELECT * FROM productora";
										//Ejecutar la consulta
										$resultado = mysqli_query($conexion, $consulta) ;
										//Extraer fila a fila con un búcle while
										while($fila = mysqli_fetch_assoc($resultado)){
										?>
										<option value="<?php echo $fila['claveproductora']; ?>"><?php echo $fila['nombre']; ?></option> 
										<?php
										}
										?>
										</select>	
			    					</div>
			    				</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><label>Genero</label>
			    						<select name="genero">
										<?php
										
										//Preparar la consulta
										$consulta1 = "SELECT * FROM genero";
										//Ejecutar la consulta
										$resultado1 = mysqli_query($conexion, $consulta1) ;
										//Extraer fila a fila con un búcle while
										while($fila1 = mysqli_fetch_assoc($resultado1)){
										?>
										<option value="<?php echo $fila1['clavegenero']; ?>"><?php echo utf8_encode($fila1['nombre']); ?></option> 
										<?php
										}
										?>
										</select>	
			    					</div>
			    				</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><label>Director</label>
										<select name="director">
										<?php
										
										//Preparar la consulta
										$consulta2 = "SELECT * FROM director";
										//Ejecutar la consulta
										$resultado2 = mysqli_query($conexion, $consulta2) ;
										//Extraer fila a fila con un búcle while
										while($fila2 = mysqli_fetch_assoc($resultado2)){
										?>
										<option value="<?php echo $fila2['clavedirector']; ?>"><?php echo utf8_encode($fila2['nombre']); ?></option> 
										<?php
										}
										?>
										</select>	
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
								<div class="form-group">
								<label for="sinopsis">Sinopsis:</label>
								<textarea class="form-control" name="sinopsis" rows="5" id="comment"></textarea>
								</div>
			    			</div>
			    			<input name="portada" type="file" /><br>
			    			<input type="submit" value="Registrar" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</center>

	<!-- fin de formulario-->
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>

</body>
</html>