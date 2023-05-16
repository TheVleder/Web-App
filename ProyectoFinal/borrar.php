<?php
if (!isset($_COOKIE["permiso"])) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=" . $fail . "");
}

include "conexion.php";

//Restar pedido
if (isset($_GET['pedido'])) {
    $codigo = $_GET['pedido'];
    $codiga = $_GET['codigo'];

    $query = "SELECT subtotal,cantidad,precio,codigo,id_pedido FROM factura WHERE id='$codigo'";
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);
    $cantidad = $row['cantidad'] - 1;
    $subtotal = $row['precio'] * $cantidad;
    if ($cantidad < 1) {
        $nref = $row['codigo'];
        $query = "SELECT stock FROM carta WHERE nref='$nref'";
        $result = mysqli_query($con, $query);
        $row7 = mysqli_fetch_assoc($result);
        $stock = $row7['stock'] + 1;

        $query = "UPDATE carta SET stock='$stock' where nref='$nref' ";
        $result = mysqli_query($con, $query);
        $query = "DELETE FROM factura WHERE id='$codigo'";
        $result = mysqli_query($con, $query);
    } else {
        $query = "UPDATE factura SET cantidad='$cantidad', subtotal='$subtotal' WHERE id='$codigo'";
        $result = mysqli_query($con, $query);

        $nref = $row['codigo'];
        $query = "SELECT stock,precio FROM carta WHERE nref='$nref'";
        $result = mysqli_query($con, $query);
        $row7 = mysqli_fetch_assoc($result);
        $stock = $row7['stock'] + 1;
        $query = "UPDATE carta SET stock='$stock' where nref='$nref' ";
        $result = mysqli_query($con, $query);

        $idpedido = $row['id_pedido'];
        $query = "SELECT total FROM pedido WHERE id='$idpedido'";
        $result = mysqli_query($con, $query);
        $row8 = mysqli_fetch_assoc($result);
        $totaltotal = $row8['total'] - $row7['precio'];

        $query = "UPDATE pedido SET total='$totaltotal' where id='$idpedido' ";
        $result = mysqli_query($con, $query);
    }
    $idpedido = $row['id_pedido'];
    $query = "SELECT cantidad,codigo FROM factura WHERE id_pedido='$idpedido'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die(mysqli_error($con));
    }

    if (mysqli_num_rows($result) == 0) {
        $query = "DELETE FROM pedido WHERE id ='$idpedido'";
        $result = mysqli_query($con, $query);
        echo "<script>window.location.href = 'pedidoscamarero.php'</script>";
    }
    echo "<script>window.location.href = 'facturacamarero.php?codigo=$codiga'</script>";
} elseif (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
    $query = "SELECT cantidad,codigo FROM factura WHERE id_pedido='$idpedido'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $cantidad = $row['cantidad'];
        $codigo = $row['codigo'];
        $query = "SELECT stock FROM carta WHERE nref='$codigo'";
        $result2 = mysqli_query($con, $query);
        $row1 = mysqli_fetch_assoc($result2);
        $stockactual = $row1['stock'];
        $stock = $stockactual + $cantidad;
        // echo "el stock actual es de: ".$stockactual." la cantidad a sumar es de: ".$cantidad.", la suma total es de: ".$stock;
        $query = "UPDATE carta SET stock='$stock' WHERE nref='$codigo'";
        mysqli_query($con, $query);
    }

    $query = "DELETE FROM pedido WHERE id='$idpedido'";
    $result = mysqli_query($con, $query);
    $query = "DELETE FROM factura WHERE id_pedido='$idpedido'";
    $result = mysqli_query($con, $query);
    if (isset($_GET['admin'])) {
        echo '<script>window.location.href = "pedidosadmin.php";</script>';
    } else {
        echo '<script>window.location.href = "pedidoscamarero.php";</script>';
    }
} elseif (isset($_GET['user'])) {
    $id_user = $_GET['user'];
    $query = "DELETE FROM usuarios WHERE id='$id_user'";
    $result = mysqli_query($con, $query);
    echo '<script>window.location.href = "usuarios.php";</script>';
}

?>
