<?php
session_start();

$servername = "mysql.webcindario.com"; // Nombre/IP del servidor
$database = "carrete"; // Nombre de la BBDD
$username = "carrete"; // Nombre del usuario
$password = "carrete"; // Contraseña del usuario
// Creamos la conexión
$con = mysqli_connect($servername , $username , $password , $database );
// Comprobamos la conexión
if (!$con) {
die("La conexión ha fallado: " . mysqli_connect_error());

}
?>