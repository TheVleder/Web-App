<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "administrador")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    
include "conexion.php";
// Loop through the POST data to process each product
foreach ($_POST as $key => $value) {
    // Check if the key starts with "product_"
if (strpos($key, 'name_') === 0) {
    // Get the product ID by removing the "name_" prefix from the key
    $id = substr($key, strlen('name_'));

    // Retrieve the received data for the product
    $nombre = $_POST['name_'.$id];
    $precio = $_POST['price_'.$id];
    $stock = $_POST['stock_'.$id];
    $imagen = $_POST['image_'.$id];
    $activo = $_POST['activo_'.$id];




        // Retrieve current data from the database for the given product ID
        $query = "SELECT nombre, precio, stock,activo, imagen FROM carta WHERE nref='$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        // Compare the received data with the current data from the database
        if ($row['nombre'] != $nombre || $row['precio'] != $precio || $row['stock'] != $stock ||$row['imagen'] != $imagen || $row['activo'] != $activo) {
            // Perform an update if the received data is different from the current data in the database
            $query = "UPDATE carta SET nombre='$nombre', precio='$precio', stock='$stock', imagen='$imagen', activo='$activo' WHERE nref='$id'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($con));
            }
        }
    }
}
echo "<script>window.location.href = 'indexadmin.php'</script>";
?>
