<?php
session_start();

$servername = "mysql.webcindario.com"; // Nombre/IP del servidor
$database = "carrete"; // Nombre de la BBDD
$username = "carrete"; // Nombre del usuario
$password = "carrete"; // Contrase�a del usuario
// Creamos la conexi�n
$con = mysqli_connect($servername , $username , $password , $database );
// Comprobamos la conexi�n
if (!$con) {
die("La conexi�n ha fallado: " . mysqli_connect_error());

}
?>