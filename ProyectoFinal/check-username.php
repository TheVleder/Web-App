<?php
session_start();
include "conexion.php";
	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "administrador")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}
// establish database connection here

$username = $_POST['username'];
$query = "SELECT * FROM usuarios WHERE user = '$username'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
  echo 'taken';
} else {
  echo 'available';
}
?>