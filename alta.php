<html>
<body>

<?php 
error_reporting(E_ERROR | E_PARSE);
 include('conexion.php');
	  $conexion = conecta();
	  $titulo = $_POST['titulo'];
	  $formato = $_POST['formato'];
	  $idioma = $_POST['idioma'];
	  $productora = $_POST['productora'];
	  $genero = $_POST['genero'];
	  $sinopsis = $_POST['sinopsis'];
	 $director = $_POST['director'];
//$portada = $_POST['portada'];
$enviar = $_POST['titulo'];

			// creamos una nueva clave

			$sql1=mysqli_query($conexion,'SELECT titulo FROM pelicula');
			$suma=mysqli_num_rows($sql1);
			$clavenueva=$suma+1;
			echo $clavenueva;
			echo $genero;		
			
			// foto para el libro

			
			$uploadedfileload = $_POST['portada'];
			$uploadedfileload="true";
			$uploadedfile_size=$_FILES['portada'][size];
			echo $_FILES[portada][name];
			if ($_FILES[portada][size]>9990000000000)
			{$msg=$msg."El archivo es mayor que 200KB, debes reducirlo antes de subirlo<BR>";
			$uploadedfileload="false";}

			if (!($_FILES[portada][type] =="image/jpeg" OR $_FILES[portada][type] =="image/gif" OR $_FILES[portada][type] =="image/png"))
			{$msg=$msg." Tu archivo solo puede ser JPG o GIF<BR>";
			$uploadedfileload="false";}

			$file_name=$_FILES[portada][name];
			$add="recursos/img/$file_name";
			if($uploadedfileload=="true"){

			if(move_uploaded_file ($_FILES[portada][tmp_name], $add)){
			echo " Ha sido subido satisfactoriamente";
			}else{echo "Error al subir el archivo";}

			}else{echo $msg;}
			
			// subir foto fin

if ($enviar) {
   // consultas para insertar en las cuatro tablas
	 
   $sql = "INSERT INTO pelicula (clavepelicula, titulo, idioma, formato, claveproductora, portada, sinopsis ) VALUES ('$clavenueva','$titulo', '$idioma', '$formato', '$productora', '$file_name', '$sinopsis' )";
   $sql3 = "INSERT INTO trata (clavepelicula, clavegenero ) VALUES ('$clavenueva', '$genero' )";
   $sql4 = "INSERT INTO dirigido_por (clavepelicula, clavedirector ) VALUES ('$clavenueva', '$director' )";
   //$result = mysqli_query($conexion,$sql);
   
if (mysqli_query($conexion, $sql))  {
	echo "Nuevo registro añadido";
	echo $sql;
	
} else  {
	echo $sql;
	echo "Error: " .$sql . "<br>" .mysqli_error($conexion);
}
echo '<br/>';
if (mysqli_query($conexion, $sql2))  {
	echo "Nuevo registro añadido";
	echo $sql2;
} else  {
	echo $sql2;
	echo "Error: " .$sql2 . "<br>" .mysqli_error($conexion);
}
echo '<br/>';
if (mysqli_query($conexion, $sql3))  {
	echo "Nuevo registro añadido";
	echo $sql3;
} else  {
	echo $sql3;
	echo "Error: " .$sql3 . "<br>" .mysqli_error($conexion);
}
echo '<br/>';
if (mysqli_query($conexion, $sql4))  {
	echo "Nuevo registro añadido";
	echo $sql4;
} else  {
	echo $sql4;
	echo "Error: " .$sql4 . "<br>" .mysqli_error($conexion);
}
echo '<br/>';
   echo "¡Gracias! Hemos recibido sus datos.\n"; 
}else{
?> 
<?php 
} //end if 
if ($sql == TRUE)  {
	
	header ('Location: añadir_pelicula.php ');
} 

  ?>
</body>
</html>