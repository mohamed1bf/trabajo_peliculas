<?php
function conecta() {
  $servidor = "localhost";
  $usuario = "root";
  $pass = "";
  $base_datos = "peliculas";

$mysqli = mysqli_connect ($servidor, $usuario,$pass);
mysqli_select_db($mysqli,$base_datos);
return $mysqli;

}

?>