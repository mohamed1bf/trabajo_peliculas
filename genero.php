<html>
<body>

<?php 
error_reporting(E_ERROR | E_PARSE);
 include('conexion.php');
	  $conexion = conecta();
$nombre = $_POST['nombre'];

$enviar = $_POST['nombre'];

			// HAcemos una clave nueva indicandole que coja una mas que n las filas que hay

			$sql1=mysqli_query($conexion,'SELECT nombre FROM genero');
			$suma=mysqli_num_rows($sql1);
			$clavenueva=$suma+1;
			echo $clavenueva;
			echo $genero;		
			
			

if ($enviar) {
   // generamos la consulta
	 
   $sql = "INSERT INTO genero (clavegenero, nombre) VALUES ('$clavenueva','$nombre')";
  
   
if (mysqli_query($conexion, $sql))  {
	echo "Nuevo genero añadido";
	echo $sql;
	
} else  {
	echo $sql;
	echo "Error: " .$sql . "<br>" .mysqli_error($conexion);
}
echo '<br/>';

?> 

</center>
  
<?php 
} //end if 
if ($sql == TRUE)  {
	
	header ('Location: alta_genero.php ');
} 
?> 

</body>
</html>