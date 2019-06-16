<?php
//Archivo de conexión a la base de datos
require('conexion.php');
$conexion = conecta();

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];



//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está activo
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla pelicula 
	//donde el titulo sea igual a $consultaBusqueda, 
	
	
	$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre LIKE '%$consultaBusqueda%' OR apellido1 LIKE '%$consultaBusqueda%' OR apellido2 LIKE '%$consultaBusqueda%' OR nick LIKE '%$consultaBusqueda%'");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay ningún usuario con ese nombre, apellido o alias</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para: <strong>'. $consultaBusqueda .'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados['nombre'];
			$ape1 = $resultados['apellido1'];
			$ape2 = $resultados['apellido2'];
			$nick = $resultados['nick'];
			$estado = $resultados['estado'];
			$portada = $resultados['foto'];
			$portada1 = '<img width="40px" height="40px" src="recursos/foto_perfil/';
			$portada2 = $portada1.$portada;
			$portada3 = '">';
			$foto = $portada2.$portada3;
			$id = $resultados["claveusuarios"];
			//Output
			$mensaje .= '
			<p>
			<i><u>Nombre: </u></i> ' . $nombre . '<br>
			<i><u>Primer Apellido: </u></i> ' . $ape1 . '<br>
			<i><u>Segundo apellido: </u></i> ' . $ape2 . '<br>
			<i><u>Alias: </u></i> ' . $nick . '<br>
			<i><u>Estado: </u></i> ' . $estado . '<br>
			<i><u>Foto: </u></i> ' . $foto . '<br>
			
			</p>';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>