<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "cocinero")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}else if (!isset($_COOKIE["permiso"])){
$fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    ?>
<head>
<link rel="stylesheet" type="text/css" href="css/cocina.css">
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  font-family: sans-serif;
}

thead {
  background-color: #f2f2f2;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
.logout-button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 100px;
        cursor: pointer;
      }
      
      .cerrarsesion{
      	background-color:red;
      }
    </style>
</head>
        <table>
    <thead>
        <tr>
            <th>Mesa</th>
            <th>Hora</th>
            <th>Plato</th>
            <th>Cantidad</th>

        </tr>
    </thead>
    <tbody>
        <?php
        include "conexion.php";
        $query = "SELECT pedido.mesa, pedido.hora, factura.nombre, factura.cantidad, factura.id FROM factura inner join pedido on factura.id_pedido = pedido.id where estado='pendiente' ORDER BY hora ASC";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }
     $currentMesa = null;

while ($row = mysqli_fetch_array($result)) {
    $mesa = $row['mesa'];
    $hora = $row['hora']; 
    $nombre = $row['nombre'];
    $cantidad = $row['cantidad'];

    // Check if the mesa has changed
    if ($mesa != $currentMesa) {
        // Add a line break or separator for the new mesa
        echo "<tr><td colspan='4'><hr></td></tr>";
        $currentMesa = $mesa;
    }
    ?>
    <tr>
        <td><?php echo $mesa; ?></td>
        <td><?php echo $hora; ?></td>
        <td><?php $nombre = str_replace('temporal', '',$nombre);
echo $nombre; ?></td>
        <td><?php echo $cantidad; echo " "."<a href='preparado.php?id=".$row['id']."'><button>Preparado</button></a>";   ?> </td>
    </tr>
    <?php
}
     ?>   
    </tbody>
</table>
<center>
<a href="cocina.php"><button>Actualizar</button></a>
  <a href="logout.php"> <button class="logout-button cerrarsesion" type="button">Cerrar sesion</button></a>
 </center>   
    
