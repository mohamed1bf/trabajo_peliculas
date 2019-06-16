<html>
<body>

<?php // creamos las variables.
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$pass = $_POST['pass'];
$nick = $_POST['nick'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];




	

$enviar = $_POST['nombre'];
if ($enviar) {
   // creamos la consulta
	  include('conexion.php');
	  $conexion = conecta();
   $sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, pass, nick, telefono, rol, estado ) VALUES ('$nombre', '$apellido1', '$apellido2', '$pass', '$nick', '$telefono', '$rol', 'Activo' )";
   $result = mysqli_query($conexion,$sql);
   echo '<script >alert("Datos enviados");
    window.history.go(-2);
</script>';
}else
  echo'<font color="#FF0000"><p align="center">no funciona</p></font>';

{
?> 

  
<?php 
} //end if 
?> 

</body>
</html>