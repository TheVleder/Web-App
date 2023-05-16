<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "administrador")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

   
include"conexion.php";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];
$pass = $_POST['contrasena'];
$contrasena=password_hash($pass,PASSWORD_DEFAULT);

$query= "SELECT MAX(id) AS id1 FROM usuarios";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    
    $row1 = mysqli_fetch_assoc($result);
    $nuevo_id = $row1["id1"]+1;
} else {
    $nuevo_id = 1;
}
if($tipo == 'camarero'){
$query= "SELECT MAX(alias) AS alias1 FROM usuarios";
$result = mysqli_query($con, $query);
    $row2 = mysqli_fetch_assoc($result);
    $nuevo_alias = $row2["alias1"]+ 1;
// Insertar datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (id, nombre, apellido, correo, user, password, tipo, alias)
        VALUES ('$nuevo_id','$nombre', '$apellido', '$correo',  '$usuario', '$contrasena','$tipo','$nuevo_alias')";

if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}else if($tipo == 'cocinero'){
$sql = "INSERT INTO usuarios (id, nombre, apellido, correo, user, password, tipo)
        VALUES ('$nuevo_id','$nombre', '$apellido', '$correo',  '$usuario', '$contrasena','$tipo')";
if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

}else if($tipo == 'administrador'){
$sql = "INSERT INTO usuarios (id, nombre, apellido, correo, user, password, tipo)
        VALUES ('$nuevo_id','$nombre', '$apellido', '$correo', '$usuario', '$contrasena', '$tipo')";
        if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
else {
header("Location: registrausuarios.php");
}
header("Location: usuarios.php");

?>
