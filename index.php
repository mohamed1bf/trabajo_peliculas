<?php session_start(); ?>
<!---  inicio de sesion con login-->
<?php
	require_once('conexion.php');
	conecta();
	$mysqli = conecta();
	
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: index2.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		/* $sha1_pass = sha1($password); */
		/* Consulta usuario y contraseña y cnexion a la BD */
		
		$sql = "SELECT claveusuarios, nick, pass, rol, estado FROM usuarios WHERE nick='$usuario' AND pass='$password'";
		
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['claveusuarios'];
			$_SESSION['usuario'] = $row['nick'];
			$_SESSION['rol'] = $row['rol'];
			$_SESSION['estado'] = $row['estado'];
		if($row['rol'] == 'admin') {
			$_SESSION['id_usuario'] = $row['claveusuarios'];
			$_SESSION['usuario'] = $row['nick'];
			$_SESSION['rol'] = $row['rol'];
		header("Location: admin.php");
		} elseif (($row['rol'] == 'usuario') && ($row['estado'] == 'Activo')) {
			$_SESSION['id_usuario'] = $row['claveusuarios'];
			$_SESSION['usuario'] = $row['nick'];
			$_SESSION['rol'] = $row['rol'];
			$_SESSION['estado'] = $row['estado'];
		header("Location: index2.php"); 
			}else {
			$error = "El nombre o contraseña son incorrectos";
			echo '<script type="text/javascript">alert(\'Usuario de baja o bloqueado contacte administrador\');</script>';  /*alerta sobre el usuario o contraseña incorrectos*/
		}
	}
	}
?>

<!---  inicio de sesion con login FIN-->



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cinemabase</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- jquery -->
  <link rel="stylesheet" type="text/css" href="css/css.css" title="Style" /><!-- css propio -->
 <link rel="icon" type="image/png" href="recursos/img/ejemplo.ico"/>


</head>
<body> 

<nav class="navbar navbar-inverse">
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
        <li><a href="#"data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		
      </ul>
    </div>
  </div>
</nav>
<!-- modal inicio -->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cinemabase</h4>
        </div>
        <div class="modal-body">
            <form action="index.php" method="POST">
		<div>
        <label for="name">Nombre:</label>
        <input type="text"  name="usuario"/>
		</div>
		<div>
        <label for="mail">Contraseña:</label>
        <input type="password"  name="password" />
		</div>
    
    <div class="button">
        <button type="submit">Entrar</button>
    </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- modal fin-->
<!-- fondo del index -->


  
<div class="container text-center">    
  <h3>Cinemabase</h3><br>
  <center><img class="img-responsive" src="recursos/img/logo1.jpg"><br></center>
  
      <center>
        <div class="well">
       <p>Inicia sesión como administrador o como usuario para ver o añadir tus peliculas!</p>
      </div>
      <div class="well"></div></center>
</div><br><br><br><br>


<footer class="container-fluid text-center footer">
  <p>Mohamed Mohand Mimoun 2019<p>
</footer>


</body>
</html>