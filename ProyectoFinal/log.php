<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "administrador")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    ?>
<head>
<link rel="stylesheet" type="text/css" href="css/log.css">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro</title>
    <style>
    .button {
  display: inline-block;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  position: absolute;
  top: 10px;
  left: 10px;
  margin-bottom:20px;
}
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:50px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

th {
  background-color: #4CAF50;
  color: white;
}

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	 tr + tr {
    margin-top: 1.5em;
  }
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "DIA"; }
	td:nth-of-type(2):before { content: "HORA"; }
	td:nth-of-type(3):before { content: "USER"; }
	td:nth-of-type(4):before { content: "PASS"; }
	td:nth-of-type(5):before { content: "IP"; }
	td:nth-of-type(6):before { content: "CAUSA"; }
	td:nth-of-type(7):before { content: "GEO"; }
	
}
.over{
width:40px;´
  overflow: scroll;
}

    </style>
</head>
<body>
<a href="usuarios.php" class="button">Atras</a>

<table>
    <thead>
        <tr>
            <th>DIA</th>
            <th>HORA</th>
            <th>USER</th>
            <th>PASS</th>
            <th>IP</th>
            <th>CAUSA</th>
            <th>LUGAR</th>
        </tr>
    </thead>
    <tbody>
<?php
include "conexion.php";

// Obtener el rango de fechas
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date('Y-m-d');
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date('Y-m-d');

// Consulta SQL con filtro de rango de fechas
$query = "SELECT * FROM logins WHERE dia BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY dia DESC, hora DESC";

$result = mysqli_query($con, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
while ($row = mysqli_fetch_array($result)) {
    $dia= $row['dia'];
    $hora= $row['hora'];
    $user= $row['user'];
    $ip= $row['ip'];
    $causa= $row['causa'];
    $pass=$row['contrseña'];
    $geo= $row['localizacion'];
    ?>
    <tr>
        <td><?php echo $dia; ?></td>
        <td><?php echo $hora; ?></td>
        <td><?php echo $user; ?></td>
        <td class='over'><?php echo $pass; ?></td>
        <td ><?php echo $ip; ?></td>
        <td><?php echo $causa; ?></td>
        <td><?php echo $geo; ?></td>
    </tr>
    <?php
}
?>
<center>
<!-- Formulario para seleccionar el rango de fechas -->
<form method="POST">
    <label for="fecha_inicio">Filtrar desde:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
    <label for="fecha_fin">hasta:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>">
    <input type="submit" value="Filtrar">
</form>
</center>
    </tbody>
</table>



</body>