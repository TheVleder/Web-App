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
    $pedido=$_GET['id'];
    $query = "SELECT id_pedido FROM factura WHERE id='$pedido'";
             $result = mysqli_query($con, $query);
             $rowfacturaa = mysqli_fetch_assoc($result);
                $nuevoidpedido= $rowfacturaa['id_pedido'];
                
                
     $query = "SELECT cantidad,nombre,subtotal FROM factura WHERE nombre LIKE 'temporal%' and id='$pedido'";
             $result = mysqli_query($con, $query);
           
              $rowfactura = mysqli_fetch_assoc($result);
                $nuevacantidad= $rowfactura['cantidad'];
                $precioasumar= $rowfactura['subtotal'];
                $nombresss = $rowfactura['nombre'];
                $nombre = str_replace('temporal', '',$nombresss);
   $query = "SELECT cantidad,subtotal FROM factura WHERE nombre ='$nombre' and id_pedido='$nuevoidpedido'";
  // echo $nuevoidpedido.$nombre;
             $result = mysqli_query($con, $query);
            
              $rowcantidad = mysqli_fetch_assoc($result);
              $cantidad=$rowcantidad['cantidad']+$rowfactura['cantidad'];  
              $precioasumar2=$rowcantidad['subtotal'];
              $preciosubtotal=$precioasumar + $precioasumar2;      
 $query="UPDATE factura SET cantidad='$cantidad', subtotal='$preciosubtotal' WHERE id_pedido='$nuevoidpedido' and nombre='$nombre'";
$result=mysqli_query($con,$query);
 $query="UPDATE factura SET estado='entregado' WHERE id='$pedido'";
$result=mysqli_query($con,$query);
  // echo "<script>alert(". $pedido.$nombre.$nombresss.$nuevacantidad .");</script>";

 $query="DELETE FROM factura WHERE nombre LIKE 'temporal%' and id='$pedido'";
$result=mysqli_query($con,$query);

   echo "<script>window.location.href = 'servido.php'</script>";

    ?>