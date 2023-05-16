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
// establish database connection here

?>
   
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/registrausuarios.css">
	<title>Formulario de registro de usuarios</title>
	<style>
		body {
			background-color: black;
			color: white;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.6;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		h1 {
			font-size: 32px;
			margin-top: 20px;
		}

		form {
			display: inline-block;
			margin-top: 50px;
			text-align: left;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type=text], input[type=password], select {
			border: none;
			border-radius: 4px;
			box-shadow: none;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}

		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			border-radius: 4px;
			color: white;
			cursor: pointer;
			font-size: 18px;
			margin-top: 20px;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Formulario de registro de usuarios</h1>
	<form action="insertarusuarios.php" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" required>

		<label for="apellido">Apellido:</label>
		<input type="text" id="apellido" name="apellido" required>

		<label for="correo">Correo electrónico:</label>
		<input type="text" id="correo" name="correo" required>

		<label for="tipo">Tipo de usuario:</label>
		<select id="tipo" name="tipo" required>
			<option value="">Seleccionar tipo de usuario</option>
			<option value="administrador">Administrador</option>
			<option value="cocinero">Cocina</option>
			<option value="camarero">Camarero</option>
		</select>

		<label for="usuario">Usuario:</label>
		<input type="text" id="usuario" name="usuario" required>
		<p color="red" id="hola"></p>
		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena" required>

		<input type="submit" value="Registrar">
	</form>
<script>
$(document).ready(function() {
  alert("1");
  $('#usuario').on('input', function() {
    var username = $(this).val();
    alert("2");

    $.ajax({
      alert("3");

      url: 'check-username.php',
      type: 'POST',
      data: {username: username},
      success: function(response) {
        alert("4");

        if (response == 'taken') {
          alert("5");
          $('#hola').html('El usuario ya está en uso. Por favor, elige otro.').css('color', 'red');
        } else {
          alert("6");
          $('#hola').html('').css('color', 'black');
        }
      }
    });
  });
});
alert("7");

</script>
 
</body>
</html>
