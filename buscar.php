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
	
	
	$consulta = mysqli_query($conexion, "SELECT * FROM pelicula WHERE titulo LIKE '%$consultaBusqueda%'");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay ningún pelicula con ese titulo y/o autor</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para: <strong>'. $consultaBusqueda .'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$titulo = $resultados['titulo'];
			$idioma = $resultados['idioma'];
			$formato = $resultados['formato']; 
			$portada = $resultados['portada'];
			$portada1 = '<img width="40px" height="40px" src="recursos/img/';
			$portada2 = $portada1.$portada;
			$portada3 = '">';
			$foto = $portada2.$portada3;
			$id = $resultados["clavepelicula"];
			//Output
			$mensaje .= '
			<p>
			<i><u></u></i>  ' . $titulo . '
			<i><u> </u></i><a href="peliculas.php?id= ' . $id . ' "> ' . $foto . '</a><br>
			
			</p>';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>