<?php
session_start();

// Destroy the session
session_destroy();

// Delete the permiso and tipocamarero cookies
setcookie("permiso", "", time() - 3600, "/");
setcookie("tipocamarero", "", time() - 3600, "/");

// Redirect to index.php
 $fail = "";
    header("Location: login.php?fail=".$fail."");
exit;
?>
