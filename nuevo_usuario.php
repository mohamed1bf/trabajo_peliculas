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
  <script src="js/formulario.js"></script>
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /> <!-- css propio -->
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>

  <script src="funciones.js"></script> 

</head>
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
	
    
 

	  
<!-- formulario alta de usuario -->
<div class="container">
<center><h3></h3>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Registre a nuevos usuarios</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="post" name="form" id="registration_form" action="registra.php" onsubmit="return funcion()" enctype="multipart/form-data" role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" id="form_nombre" class="form-control input-sm" placeholder="Nombre" name="nombre" required="">
        					<span class="error_form" id="nombre_error_message"></span>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" id="form_apellido1" name="apellido1"  class="form-control input-sm" placeholder="Primer Apellido" required="">
        								<span class="error_form" id="apellido1_error_message"></span>
			    					</div>
			    				</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" id="form_apellido" class="form-control input-sm" placeholder="Primer Apellido" class="form-control input-sm" placeholder="Segundo Apellido" name="apellido2" required="">
       									 <span class="error_form" id="apellido_error_message"></span>
			    					</div>
			    				</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" id="form_nick" name="nick"  class="form-control input-sm" placeholder="Alias" required="">
           								 <span class="error_form" id="nick_error_message"></span>
			    					</div>
			    				</div>

			    	
								
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						 <input type="text" id="form_telefono" name="telefono"  class="input-medium bfh-phone" placeholder="Telefono" required="">
           								 <span class="error_form" id="telefono_error_message"></span>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" id="form_password" name="pass" class="form-control input-sm" placeholder="Contraseña" required="">
        								<span class="error_form" id="password_error_message"></span>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" id="form_retype_password" name="pass" placeholder="Confirmar" required="">
        								<span class="error_form" id="retype_password_error_message"></span>
			    					</div>
			    				</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<select name="rol">
										<option value="admin">Administrador</option> 
										<option value="usuario">Usuario</option>
										</select>	
			    					</div>
			    				</div>
							
			    			</div>
			    			<input type="submit" value="Registrar" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
	</center>

	<!-- formulario alta de usuario fin-->
<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>

</body>
</html>