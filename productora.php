<html>
<body>

<?php 
error_reporting(E_ERROR | E_PARSE);
 include('conexion.php');
	  $conexion = conecta();
$nombre = $_POST['nombre'];
$pais = $_POST['pais'];
$cif = $_POST['cif'];

$enviar = $_POST['nombre'];

			// HAcemos una nueva clave indicandole que coja una mas que nlas filas que hay

			$sql1=mysqli_query($conexion,'SELECT nombre FROM productora');
			$suma=mysqli_num_rows($sql1);
			$clavenueva=$suma+1;
			echo $clavenueva;
			echo $tema;		
			
			

if ($enviar) {
   // process form
	 
   $sql = "INSERT INTO productora (claveproductora, nombre, pais, cif) VALUES ('$clavenueva','$nombre', '$pais', '$cif')";
  
   
if (mysqli_query($conexion, $sql))  {
	echo "Nueva editorial añadida";
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
	
	header ('Location: alta_productora.php ');
} 
?> 

</body>
</html>