<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "camarero")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    ?>
<head>
<link rel="stylesheet" type="text/css" href="../css/facturacamarero.css">
    <style>
        .button {
  display: inline-block;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
  border-radius: 5px;
  cursor: pointer;
  position: absolute;
  top: 10px;
  left: 10px;
}
table {
 margin-top:50px;
  border-collapse: collapse;
  border-spacing: 0;
}

th, td {
  text-align: left;
  padding: 16px;
  border-bottom: 1px solid #ddd;
  font-size: 36px;
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
<a href="pedidoscamarero.php" class="button">Atras</a>

<?php
    include "conexion.php";
    $codigo=$_GET['codigo'];
    $query="SELECT * FROM factura WHERE id_pedido='$codigo'";
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
while($registro=mysqli_fetch_array($result))
{
echo "<TR  bgcolor='#fffee8'>";
echo "<TD bgcolor='#fffee8'>";
$nombre = str_replace('temporal', '',$registro[3]);
echo $nombre;

echo "</TD>";

echo "<TD>";
echo $registro[5]." &#8364;";
echo "</TD>";

echo "<TD>";
echo $registro[6];
echo "</TD>";


echo "<TD>";
echo $registro[8]." &#8364;";
echo "</TD>";




echo "<TD>";
echo $registro[7];
echo "</TD>";



echo"<td><A href='borrar.php?pedido=$registro[0]&codigo=$codigo'><input style=' background-color:#ffefe8; border-radius: 15px; width:100%; height:65%; font-size:35px;  border:none; 'type='button' value='Borrar'></A></td>";

echo "</TR>";
}


echo "</TABLE></center>";













?>