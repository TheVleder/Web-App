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
<link rel="stylesheet" type="text/css" href="../css/facturaadmin.css">

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

th, td {
  text-align: left;
  padding: 16px;
  border-bottom: 1px solid #ddd;
  font-size: 26px;
  text-align:center;
}

@media screen and (max-width: 600px) {
  input, .button{
    font-size: 20px;}
    
    table {
  width: 100%;
  max-width: 100%;}
  th, td {
    display: block;
    width: 100%;
    font-size: 20px;
  }
  
  th {
    text-align: center;
  }
}

    </style>
</head>
<a href="pedidosadmin.php" class="button">Atras</a>

<?php
    include "conexion.php";
    $codigo=$_GET['codigo'];
    $query="SELECT * FROM factura WHERE id_pedido='$codigo' order by codigo";
//$query="SELECT * FROM cliente ORDER BY id";
$result=mysqli_query($con,$query);

echo "<center><TABLE>";
echo "<TR bgcolor='lightgray'>";


echo "<TD>";
echo "NOMBRE";
echo "</TD>";

echo "<TD>";
echo "PRECIO";
echo "</TD>";

echo "<TD>";
echo "CANTIDAD";
echo "</TD>";

echo "<TD>";
echo "SUBTOTAL";
echo "</TD>";



echo "<TD>";
echo "ESTADO";
echo "</TD>";

echo "</TR>";
$last_mesa = null; // initialize variable to store the last mesa

while($registro=mysqli_fetch_array($result)) {
  $mesa = $registro[3];

  // add a line or br tag if the mesa has changed
  if ($mesa !== $last_mesa && $last_mesa !== null) {
    echo "<tr><td colspan='5'><hr></td></tr>"; // line
    // echo "<br>"; // br tag
  }

  // output the mesa data
  echo "<tr bgcolor='#fffee8'>";
  echo "<td bgcolor='#fffee8'>$mesa</td>";
  echo "<td>$registro[5]&#8364;</td>";
  echo "<td>$registro[6]</td>";
  echo "<td>$registro[8]&#8364;</td>";
  echo "<td>$registro[7]</td>";
  echo "</tr>";

  $last_mesa = $mesa; // update the last mesa
}


echo "</TABLE></center>";













?>