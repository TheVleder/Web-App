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
<link rel="stylesheet" type="text/css" href="../css/pedidosadmin.css">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
}
table {
 
  border-collapse: collapse;
  border-spacing: 0;
}

TH, TD{
  text-align: left;
  padding: 16px;
  border-bottom: 1px solid #ddd;
  font-size: 26px;
  text-align:center;
}


@media only screen and (max-width: 760px),
(min-device-width: 760px) and (max-device-width: 1024px)  {
table{
	margin-top:50px
		#height:min-content;
	}
	/* Force table to not be like tables anymore */
	table, thead, tbody, TH, TD, TR{ 
		display: block; 
		font-size:18px;
		margin-top:50px
		height:20px;
	}
	
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead TR{ 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	TR{ border: 1px solid #ccc; }
	
	TD{ 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	TD:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	 tr+ tr{
    margin-top: 10px;
  }
	/*
	Label the data
	*/
	TD:nth-of-type(1):before { content: "FECHA"; }
	TD:nth-of-type(2):before { content: "HORA"; }
	TD:nth-of-type(3):before { content: "CAMARERO"; }
	TD:nth-of-type(4):before { content: "MESA"; }
	TD:nth-of-type(5):before { content: "TOTAL + DESC"; }
	TD:nth-of-type(6):before { content: "PAGADO"; }
	
}
    </style>
</head>
<body>
<a href="indexadmin.php" class="button">Atras</a>

<?php
    include "conexion.php";
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : date('Y-m-d');
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date('Y-m-d');

// Consulta SQL con filtro de rango de fechas
$query = "SELECT * FROM pedido WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY fecha DESC, hora DESC";

//$query="SELECT * FROM cliente ORDER BY id";
$result=mysqli_query($con,$query);
echo "<center><table class='abajo'>";
echo "<thead><TR bgcolor='lightgray'>";


echo "<TD>";
echo "FECHA";
echo "</TD>";

echo "<TD>";
echo "HORA";
echo "</TD>";

echo "<TD>";
echo "CAMARERO";
echo "</TD>";

echo "<TD>";
echo "MESA";
echo "</TD>";

echo "<TD>";
echo "TOTAL + DESC";
echo "</TD>";

echo "<TD>";
echo "PAGADO";
echo "</TD>";

echo "</TR></thead><tbody>";
while($registro=mysqli_fetch_array($result))
{
echo "<TR  bgcolor='#fffee8'>";
echo "<TD bgcolor='#fffee8'>";
echo $registro[1];

echo "</TD>";

echo "<TD>";
echo $registro[2];
echo "</TD>";

echo "<TD>";
echo $registro[3];
echo "</TD>";


echo "<TD>";
echo $registro[4];
echo "</TD>";


echo "<TD>";
echo $registro[5]."&#8364; -> ".$registro[7]."&#8364;" ;
echo "</TD>";

echo "<TD>";
echo $registro[6];
echo "</TD>";



echo"<td><A href='borrar.php?idpedido=$registro[0]&admin=si'><input style=' background-color:#ffefe8; border-radius: 15px; width:100%; height:25px; border:none;  font-size:20px; 'type='button' value='Borrar'></A></td>";
echo"<td><A href='facturaadmin.php?codigo=$registro[0]'><input style=' background-color:#lightgreen; border-radius: 15px; width:100%; height:25px; border:none; font-size:20px;  'type='button' value='Ver'></A></td>";

echo "</TR></tbody>";
}
?>
<!-- Formulario para seleccionar el rango de fechas -->
<form method="POST">
    <label for="fecha_inicio">Filtrar desde:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
    <label for="fecha_fin">hasta:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>">
    <input type="submit" value="Filtrar">
</form>
<?php

echo "</table></center>";

?></body>