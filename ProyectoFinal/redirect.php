<?php 
setcookie("permiso", "camarero", time() + (1 * 60 * 5), "/");
header("Location: index.php");

?>