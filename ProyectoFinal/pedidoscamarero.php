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

<link rel="stylesheet" type="text/css" href="../css/pedidoscamarero.css">
<title> Pedidos </title>
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
table {d
 
  border-collapse: collapse;
  border-spacing: 0;
  margin-top:50px;
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
.opciones-pago {
  position: absolute;
  top: 50px;
  left: 0;
  right: 0;
  margin: auto;
  width: 200px;
  height: min-content;
  background-color: white;
  border: 1px solid black;
  display: none;
 
}

.opciones-pago button {
  display: block;
  margin: 10px auto;
   font-size:20px;
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
	TD:nth-of-type(5):before { content: "TOTAL"; }
	TD:nth-of-type(7):before { content: "PAGADO"; }
	
}
    </style>
</head>
<body>
<a href="index.php" class="button">Atras</a>

<?php
    include "conexion.php";
    $query="SELECT * FROM pedido WHERE pagado='no' order by mesa";
//$query="SELECT * FROM cliente ORDER BY id";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
echo "<center><TABLE class='boton'>";

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
echo "TOTAL";
echo "</TD>";

echo "<TD>";
echo "PAGADO";
echo "</TD>";

echo "</TR></thead><tbody>";
while($registro=mysqli_fetch_array($result))
{
if($_COOKIE['tipocamarero']==$registro[3]){
echo "<TR bgcolor='#ebffba'>";}

else{
echo "<TR  bgcolor='#fcd7d7'>";

}
echo "<TD>";
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
echo $registro[5]."&#8364;";
echo "</TD>";


echo "<TD>";
echo $registro[6];
echo "</TD>";



echo"<td><A href='borrar.php?idpedido=$registro[0]'><input style=' background-color:#ffefe8; border-radius: 15px; width:100%; height:35px; border:none;  font-size:30px; 'type='button' value='Borrar'></A></td>";
echo"<td><A href='facturacamarero.php?codigo=$registro[0]'><input style=' background-color:#lightgreen; border-radius: 15px; width:100%; height:35px; border:none; font-size:30px;  'type='button' value='Ver'></A></td>";
echo"<td><A href='metodo-pago.php?total=$registro[5]&pedido=$registro[0]'><input id='boton-pago' style=' background-color:#lightgreen; border-radius: 15px; width:100%; height:35px; border:none; font-size:30px; 'type='button' value='Pagar'></A>

</TR></tbody>";
}


echo "</TABLE></center>";
}else{
    echo"<script>window.location = 'index.php'</script>;";
}
?>
<script src="../js/pedidoscamarero.js"></script>

<script>const botonPago = document.getElementById('boton-pago');
const opcionesPago = document.getElementById('opciones-pago');

botonPago.addEventListener('click', function() {
  opcionesPago.style.display = 'block';
});

const pagoEfectivo = document.getElementById('pago-efectivo');
const pagoTarjeta = document.getElementById('pago-tarjeta');
const descuento = document.getElementById('descuento');
descuento.style.display = 'none';
pagoEfectivo.addEventListener('click', function() {
  
  pagoTarjeta.style.display = 'none';
  descuento.style.display = 'block';

});

pagoTarjeta.addEventListener('click', function() {
  opcionesPago.style.display = 'none';
  // Aquí puedes agregar el código para realizar el pago con tarjeta
});

</script>










</body>