<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "cocinero")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    
    include "conexion.php";
    $id=$_GET['id'];
     $query="UPDATE factura SET estado='preparado' WHERE id='$id'";
$result=mysqli_query($con,$query);

    echo "<script>window.location.href = 'cocina.php'</script>";

    ?>