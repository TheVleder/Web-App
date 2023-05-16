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
<link rel="stylesheet" type="text/css" href="../css/servido.css">
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
/* General styling */
/* General styling */
table {
	margin-top:50px;
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 1rem;
  box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
  overflow: hidden;
}

th,td {
  padding: 1rem;
  text-align: left;
  vertical-align: middle;
  border-top: 1px solid #dee2e6;
   font-size: 30px; 
}

/* Header styling */
thead {
  background-color: #f8f9fa;
}

th {
  font-weight: bold;
}


/* Responsive styling */
@media only screen and (max-width: 600px) {
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }
  th,
  td {
    display: inline-block;
    padding: 0.5rem; /* decrease padding */
  }
  th {
    text-align: center;
    font-weight: normal;
   
  }
}



    </style>
</head>
<a href="index.php" class="button">Atras</a>

<?php
    include "conexion.php";
    $query="SELECT pedido.mesa, factura.nombre, factura.id, pedido.camarero, factura.cantidad FROM factura inner join pedido on factura.id_pedido = pedido.id WHERE estado='preparado' ORDER BY pedido.camarero DESC";
//$query="SELECT * FROM cliente ORDER BY id";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){
echo "<center><TABLE>";
echo "<TR bgcolor='lightgray'>";


echo "<TD>";
echo "NOMBRE";
echo "</TD>";

echo "<TD>";
echo "CANTIDAD";
echo "</TD>";

echo "<TD>";
echo "MESA";
echo "</TD>";

echo "</TR>";
while($registro=mysqli_fetch_array($result))
{

if($_COOKIE['tipocamarero']==$registro[3]){
echo "<TR bgcolor='#ebffba'>";
}else{
echo "<TR  bgcolor='#fcd7d7'>";

}
echo "<TD>";
$nombre = str_replace('temporal', '',$registro[1]);
echo $nombre;

echo "</TD>";

echo "<TD>";
echo $registro[4];
echo "</TD>";

echo "<TD>";
echo $registro[0];
echo "</TD>";




echo"<td><A href='entregado.php?id=$registro[2]'><input style=' background-color:#ffefe8; border-radius: 15px; width:100%; height:65px; font-size:30px;  border:1px solid-black; 'type='button' value='Entregar'></A></td>";

echo "</TR>";
}


echo "</TABLE></center>";
}else{
    echo"<script>window.location = 'index.php'</script>;
";
}












?>