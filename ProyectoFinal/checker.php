<?php
session_start();

if (isset($_COOKIE["permiso"]) && $_COOKIE["permiso"] != "camarero") {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=" . $fail . "");
} elseif (!isset($_COOKIE["permiso"])) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=" . $fail . "");
}

include "conexion.php";
$date = date('Y-m-d');
$mesa = $_POST['mesa'];
//$hora = date('H:i:s', strtotime('+2 hours'));
$hora = date('H:i:s');
// $hora=  strtotime('+2 hours', strtotime($hora));
$total = 0;
//$id_pedido=$date.$hora;
$id_pedido_nuevo = $date . $hora;
$numbers_only = preg_replace("/[^0-9]/", "", $id_pedido_nuevo);
$id_pedido_nuevo = str_replace("0", "", $numbers_only);
foreach ($_POST as $key => $value) {
    // Check if the key starts with "quantity_"
    if (strpos($key, 'quantity_') === 0) {
        // Get the item ID by removing the "quantity_" prefix from the key
        $quantity = $value;
        if ($quantity > 0) {
            $id = substr($key, strlen('quantity_'));
            $query = "SELECT * FROM carta WHERE nref='$id'";
            $result = mysqli_query($con, $query);
            $row1 = mysqli_fetch_assoc($result);
		/*if (isset($_POST['cocinado'])) {
                $cocinado = $_POST['cocinado'];
                // Use $cocinado variable as needed
            }*/
            $result = mysqli_query($con, "SELECT MAX(id) as max_id FROM factura");
            $row2 = mysqli_fetch_assoc($result);
            $highest_id = $row2["max_id"];
            $id_factura = $highest_id + 1;

            $total = $total + $quantity * $row1["precio"];
            $total_factura = $quantity * $row1["precio"];

            $query = "SELECT id FROM pedido WHERE mesa='$mesa' and pagado='no'";
            $resulta = mysqli_query($con, $query);
            $row4 = mysqli_fetch_assoc($resulta);

            if (mysqli_num_rows($resulta) > 0) {
                //meter que si existe que se sume al producto que ya esta, y no se cree uno nuevo.
                $query = "SELECT cantidad FROM factura WHERE id_pedido='$row4[id]' and codigo='$id'";
                $result = mysqli_query($con, $query);
                $row5 = mysqli_fetch_assoc($result);

                if (mysqli_num_rows($result) > 0) {
                    // echo "El pruducto para ese pedido existe y actualiza cantidad y subtotal de factura;";
                    $cantidad = $row5['cantidad'] + $quantity;
                    $subtotal = $row1["precio"] * $cantidad;
                    // $query = "UPDATE factura SET cantidad='$cantidad', subtotal='$subtotal' where id_pedido= '$row4[id]' and codigo='$id' ";
                    //  $result = mysqli_query($con, $query);
                    /* $query = "SELECT max(id) as idmaximo from factura";
                  $result = mysqli_query($con, $query);
                  $rowfactura = mysqli_fetch_assoc($result);
                  $nuevoid = $rowfactura['idmaximo']+1;
                  $nuevisimo = $nuevoid*1000;
                  */

                    $idid = $row4['id'];
                    $nombrenombre = temporal . $row1['nombre'];
                    $categoriacategoria = $row1['categoria'];
                    $precioprecio = $row1['precio'];
                    $query = "INSERT INTO factura(id_pedido,codigo,nombre,categoria,precio,cantidad,estado,subtotal) 
                            VALUES('$idid','$id','$nombrenombre','$categoriacategoria','$precioprecio','$quantity','pendiente','$total_factura')";
                    $result = mysqli_query($con, $query);
                    if (!$result) {
                        die("Query failed: " . mysqli_error($con));
                    }

                    $query = "SELECT stock FROM carta WHERE nref='$id'";
                    $result = mysqli_query($con, $query);
                    $row7 = mysqli_fetch_assoc($result);
                    $stock = $row7['stock'] - $quantity;
                    $query = "UPDATE carta SET stock='$stock' where nref='$id' ";
                    $result = mysqli_query($con, $query);
                } else {
                    // echo "Se crea una factura con un pedido con mesa no pagada y se resta stock;";
                    //    echo $row4['id'].$row1['nombre'];
                    $idid = $row4['id'];
                    $nombrenombre = $row1['nombre'];
                    $categoriacategoria = $row1['categoria'];
                    $precioprecio = $row1['precio'];
                    $query = "INSERT INTO factura(id_pedido,codigo,nombre,categoria,precio,cantidad,estado,subtotal) 
                            VALUES('$idid','$id','$nombrenombre','$categoriacategoria','$precioprecio','$quantity','pendiente','$total_factura')";
                    $result = mysqli_query($con, $query);

                    $query = "SELECT stock FROM carta WHERE nref='$id'";
                    $result = mysqli_query($con, $query);
                    $row7 = mysqli_fetch_assoc($result);
                    $stock = $row7['stock'] - $quantity;
                    $query = "UPDATE carta SET stock='$stock' where nref='$id' ";
                    $result = mysqli_query($con, $query);
                }
            } else {
                //crea la factura
                //  echo "Se crea nueva factura y se resta stock;";

                $query = "INSERT INTO factura(id_pedido,codigo,nombre,categoria,precio,cantidad,estado,subtotal) VALUES('$id_pedido_nuevo','$id','$row1[nombre]','$row1[categoria]','$row1[precio]','$quantity','pendiente','$total_factura')";
                $result = mysqli_query($con, $query);
                if (!$result) {
                    die(mysqli_error($con));
                }

                $query = "SELECT stock FROM carta WHERE nref='$id'";
                $result = mysqli_query($con, $query);
                $row7 = mysqli_fetch_assoc($result);
                $stock = $row7['stock'] - $quantity;
                $query = "UPDATE carta SET stock='$stock' where nref='$id' ";
                $result = mysqli_query($con, $query);
            }

            // Get the quantity value

            // Process the item with the given ID and quantity as needed
            // ...
        }
    }
}

$query = "SELECT id,total FROM pedido WHERE mesa='$mesa' and pagado='no'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row3 = mysqli_fetch_assoc($result);
    $id_pedido = $row3['id'];
    $total_pedido = $row3['total'] + $total;
    $query = "UPDATE pedido SET total='$total_pedido' WHERE id='$id_pedido'";
    $result = mysqli_query($con, $query);
    // echo "Se añade precio al pedido;";
} else {
    // echo "Se crea nuevo pedido";
    $camarero = $_COOKIE['tipocamarero'];
    $query = "INSERT INTO pedido(id,fecha,hora,camarero,mesa,total,pagado) VALUES('$id_pedido_nuevo','$date','$hora','$camarero','$mesa','$total','no')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die(mysqli_error($con));
    }
}

echo "<script>window.location.href = 'index.php';</script>";
?>
