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

    
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $price = $_POST["price"];
  $stock = $_POST["stock"];
  $image = $_POST["image"];
  $category = $_POST["category"];
  $activo = "si"; // Set the activo field to "si"
  if($category =='bebida'){
  if(isset($_POST["alcoholic"])){
  $alcoholic=1;
  }}
  if($category== 'segundoplato'){
  if(isset($_POST["carne"])){
  $alcoholic = 1;
  }else{
    $alcoholic = 0;

  }}
  

  // Get the max nref value from the carta table
 $query = "SELECT MAX(CAST(nref AS UNSIGNED)) as max_nref FROM carta WHERE categoria='$category'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$codigo = $row["max_nref"];
if ($category == "bebida") {
    // Extraer el número y convertirlo a entero
    $numera = intval($codigo);
    $numero = $numera+1;
    // Sumar 1 al número y convertirlo a cadena con ceros a la izquierda
    $nref = str_pad($numero, 3, "0", STR_PAD_LEFT);
    // Agregar el cero delante si la categoría es "bebida"
} else {
    // Sumar 1 al valor numérico de max_nref
    $nref = strval($codigo+1);
}


// Insert the form data into the carta table
$query = "INSERT INTO carta (nref, nombre, precio, stock,imagen,categoria, activo, alcohol) VALUES ('$nref', '$name', '$price', '$stock', '$image', '$category', '$activo', '$alcoholic')";
if (mysqli_query($con, $query)) {
  echo "New record created successfully.";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($con);
}

   header("Location: insertaralimentos.php");
  // Close the database connection
}
?>
