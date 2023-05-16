<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "camarero")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}
    
// connect to database
include"conexion.php";
// check for errors


// check for new data
$query = "SELECT * FROM factura WHERE estado='preparado' ORDER BY nombre ASC";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // new data is available
    echo "1";
} else {
    // no new data
    echo "0";
}

// close database connection
mysqli_close($con);
?>
