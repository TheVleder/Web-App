<?php
session_start();

	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "administrador")) {
    $fail = "Inicia sesion de nuevo";
    header("Location: login.php?fail=".$fail."");
}

    ?>
<head>
<link rel="stylesheet" type="text/css" href="../css/usuarios.css">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuarios</title>
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
.n{left:100px}
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
	td:nth-of-type(1):before { content: "ID"; }
	td:nth-of-type(2):before { content: "NOMBRE"; }
	td:nth-of-type(3):before { content: "APELLIDO"; }
	td:nth-of-type(4):before { content: "CORREO"; }
	td:nth-of-type(5):before { content: "USER"; }
	td:nth-of-type(6):before { content: "TIPO"; }
	td:nth-of-type(7):before { content: "ALIAS"; }
	
}

    </style>
</head>
<body>
<a href="indexadmin.php" class="button">Atras</a>
<a href="log.php" class="button n">Registro</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>User</th>
            <th>Tipo</th>
            <th>Alias</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "conexion.php";
        $query = "SELECT * FROM usuarios";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $correo = $row['correo'];
            $user = $row['user'];
            $tipo = $row['tipo'];
            $alias = $row['alias'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $apellido; ?></td>
                <td><?php echo $correo; ?></td>
                <td><?php echo $user; ?></td>
                <td><?php echo $tipo; ?></td>
                <td><?php echo $alias; echo"<A href='borrar.php?user=$id'><input style=' background-color:#ffefe8; border-radius: 15px; width:80%; height:25px; font-size:20px;  border:none; 'type='button' value='Borrar'></A>"; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<center><A href='registrarusuarios.php'><input style=' background-color:#bcfaac; border-radius: 15px; width:100%; height:25px; font-size:20px;  border:none; 'type='button' value='Insertar'></A></center>

<script src="../js/usuarios.js"></script>
<script>window.setMobileTable = function(selector) {
  const tableEl = document.querySelector(selector);
  const thEls = tableEl.querySelectorAll('thead th');
  const tdLabels = Array.from(thEls).map(el => el.innerText);
  tableEl.querySelectorAll('tbody tr').forEach( tr => {
    Array.from(tr.children).forEach( 
      (td, ndx) =>  td.setAttribute('label', tdLabels[ndx])
    );
  });
}
</script>

</body>