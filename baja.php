<!-- baja de usuario -->
<?php 
 error_reporting(E_ERROR | E_PARSE); 
 include('conexion.php');
	  $conexion = conecta();
$claveusuarios = $_GET['id'];

$enviar = $_GET['id'];

if ($enviar) {
   // consulta para actualizar la tabla de usuarios baja(desactivar)
	 
   $sql = "UPDATE usuarios SET estado = 'Baja' WHERE claveusuarios = $claveusuarios";
  
   
if (mysqli_query($conexion, $sql))  {
	echo "Correcto";
	echo $sql;
	header ('Location: incidencias.php ');
} else  {
	echo $sql;
	echo "Error: " .$sql . "<br>" .mysqli_error($conexion);
}
echo '<br/>';
}
?> 