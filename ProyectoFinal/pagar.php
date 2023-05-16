<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "camarero")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    
    include "conexion.php";
    $pedido=$_GET['codigo'];
     $query="UPDATE pedido SET pagado='si' WHERE id='$pedido'";
$result=mysqli_query($con,$query);
 $query="UPDATE factura SET estado='finalizado' WHERE id_pedido='$pedido'";
$result=mysqli_query($con,$query);
    echo "<script>window.location.href = 'pedidoscamarero.php'</script>";

    ?>