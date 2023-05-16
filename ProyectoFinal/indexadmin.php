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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/indexadmin.css">

 <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=no"">
<title>Inicio</title>

<style>

  body{
    background-image: url("https://user-images.githubusercontent.com/2223602/39957159-6a881f56-55ee-11e8-8a42-6b9a227defcd.gif");
    background-size: cover,blur(14px);
    min-width: 400px;
  }

  .large{  
    top:30px;
    position: relative;
    width: 95%; 
    height: 100%;
    border: 1px solid #73AD21;
    border-radius:15px;
    justify-content:center;
    align-items: center;
  }

  .box {
    width: 100%;
    height: min-content;
    border: 0.5px solid #9c8a4f;
    display: inline-block;
    margin-left: 10px;
    margin-top: 25px;
    border-radius: 15px;
    text-shadow: 1.5px 1.5px lightgray;
    background-color: #fff;
    background-color: rgba(209, 209, 209,0.9);
    min-width: 115px;
    max-width: 250px;
  }

  .main-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .main-grid {
   
    font-size:20px;
  }
.main-grid input {
  justify-self: center;
}
  .sub-grid {
    padding: 1px;
  }

  .image-container img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .topdiv{
    position: relative;
    width: 90%;
    top: 10px;
    height: min-content;
    border: 1px solid #73AD21;
    margin:0 auto;
    text-shadow: 1.5px 1.5px lightgray;
    border-radius:15px;
    background-color: #fff;
    background-color: rgba(255,255,255,0.5);  
  }

  img {
    max-width: 95%;
    max-height: 80%;
    border-radius:15px;
    margin-top: 5px;
  }

  .lol {
    text-decoration: none;
    color: black;
    font-size: 25px;
    top:1px;
  }

  .enlace {
    width: 100%;
    height: 100%;
  }

  .norastro {
    text-decoration:none;
    color:black;
  }

  a {
    color:black;
  }

  .panes {
    bottom:2px;
    width: 70%;
    font-family: "Times New Roman", Times, serif;
    font-size: 25px;
    font-weight: 900;
    font-style:italic;
  }

  .entrada {
    border-radius:15px;
    width: 95%;
    max-width: 350px;
    height: 100%;
  }

  .entrada2 {
    border-radius:15px;
    width: 60px;
    height: 10%;
    left: 0px;
  }




.button-grid {
  display: inline-flex;
  gap: 1px;
  align-items: center;
  justify-content: center;
}




.button {
  background-color: #fff;
  border: 2px solid #999;
  padding: 2% 4%;
  font-size: 1.5vw;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.menu {
      cursor: pointer;

  color: #fff;
  background-color: #2ecc71;
  border: none;
  border-radius: 15px;
    margin: 5px;

  font-size: 1.5vw;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  transition: all 0.3s ease;
  height:100%;
  width:min-content;

}

/* Styles for phones */
@media (max-width: 700px) {
  .button {
    font-size: 1.8vw;
    padding: 2px;
  }

  .menu {
    font-size: 13px;
    letter-spacing: 1px;
        margin: 0px;

  }
    .box {
    width: 220px;
    height:400px;
  }
  
  
  
  
  
  
}

.menu.active {
  background-color: #ffaa57;
}

.button-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  justify-content: center;
  align-items: center;
}

/* Add a border radius to the first and last button */
.menu:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.menu:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}



.button:focus {
  outline: none;
  background-color: #ccc;
}

.panesh {
  height:50px;
}

.input-quantity{font-size:25px;
    width:45px;
}

.plus-button{font-size:40px;}
.minus-button{font-size:40px;}


.tamano,#mesa{font-size:30px;
     font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #4CAF50;
  color: #fff;
  border-radius: 8px;
  border: none;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}
.editable{width:50px;
    border-radius:10px;
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


<center>
<body class="fondo">

<div class="topdiv">
  <div class="button-container">
    <div class="button-grid">
      <button id="bebida" class="menu active">Bebida</button>
      <button id="entrante" class="menu">Entrante</button>
      <button id="arroces" class="menu">Arroces</button>
      <button id="carne-pescado" class="menu">Carne y pescado</button>
      <button id="postre" class="menu">Postre</button>
    </div>
  </div>
</div>
<br><br>
<form action="checkeradmin.php" method="POST">
         <a href="usuarios.php"><button  class="tamano" type="button">Usuarios</button></a>

     <a href="pedidosadmin.php"><button  class="tamano" type="button">Pedidos</button></a>
     <a href="insertaralimentos.php"><button  class="tamano" type="button">Nuevo Plato</button></a>


       <input type="submit" class="tamano" value="Actualizar">

    
<div class="large">

<div id="uno">
    <?php
    include "conexion.php";
    $query = "SELECT * FROM carta WHERE categoria='bebida' ORDER BY nombre ASC";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    while ($registro1 = mysqli_fetch_array($result)) {
        $id = $registro1[0];
        $nombre = $registro1[1];
        $precio = $registro1[2];
        $stock = $registro1[3];
        $imagen = $registro1[5];
        $activo = $registro1[6];

        ?>
        <div class='box'>
            <center>
            <div class="image-container">
                <img src='<?php echo $imagen; ?>' alt=''>
            </div>
            <br>
           <div class="panes">
                <input type="text" name="name_<?php echo $id; ?>" value="<?php echo $nombre; ?>">
                <input type="text" name="image_<?php echo $id; ?>" value="<?php echo $imagen; ?>">

            </div>
            <br>
            
            <div class='main-grid'>
                Precio: <input type="text" class="editable" name="price_<?php echo $id; ?>" value="<?php echo $precio; ?>">&#8364;
                Stock: <input type="text" class="editable"  name="stock_<?php echo $id; ?>" value="<?php echo $stock; ?>">
            </div>
           Activo: <select name="activo_<?php echo $id; ?>">
                <?php if ($activo == "si") {
                    echo "<option value='si' selected>Si</option>";
                    echo "<option value='no'>No</option>";
                } else {
                    echo "<option value='si'>Si</option>";
                    echo "<option value='no' selected>No</option>";
                } ?>
                </select>


            </center>
        </div>
        <?php
    }
    ?>
</div>


<div id="dos">
    <?php
    include "conexion.php";
    $query = "SELECT * FROM carta WHERE categoria='entrante' ORDER BY nombre ASC";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    while ($registro1 = mysqli_fetch_array($result)) {
        $id = $registro1[0];
        $nombre = $registro1[1];
        $precio = $registro1[2];
        $stock = $registro1[3];
        $imagen = $registro1[5];
        $activo = $registro1[6];

        ?>
        <div class='box'>
            <center>
            <div class="image-container">
                <img src='<?php echo $imagen; ?>' alt=''>
            </div>
            <br>
            <div class="panes">
                <input type="text" name="name_<?php echo $id; ?>" value="<?php echo $nombre; ?>">
                <input type="text" name="image_<?php echo $id; ?>" value="<?php echo $imagen; ?>">
            </div>
            <br>
            
            <div class='main-grid'>
                Precio: <input type="text" class="editable" name="price_<?php echo $id; ?>" value="<?php echo $precio; ?>">&#8364;
                Stock: <input type="text" class="editable"  name="stock_<?php echo $id; ?>" value="<?php echo $stock; ?>">
            </div>
             Activo: <select name="activo_<?php echo $id; ?>">
                <?php if ($activo == "si") {
                    echo "<option value='si' selected>Si</option>";
                    echo "<option value='no'>No</option>";
                } else {
                    echo "<option value='si'>Si</option>";
                    echo "<option value='no' selected>No</option>";
                } ?>
                </select>
            </center>
        </div>
        <?php
    }
    ?>
</div>


<div id="tres">
    <?php
    include "conexion.php";
    $query = "SELECT * FROM carta WHERE categoria='primerplato' ORDER BY nombre ASC";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    while ($registro1 = mysqli_fetch_array($result)) {
        $id = $registro1[0];
        $nombre = $registro1[1];
        $precio = $registro1[2];
        $stock = $registro1[3];
        $imagen = $registro1[5];
        $activo = $registro1[6];

        ?>
        <div class='box'>
            <center>
            <div class="image-container">
                <img src='<?php echo $imagen; ?>' alt=''>
            </div>
            <br>
            <div class="panes">
                <input type="text" name="name_<?php echo $id; ?>" value="<?php echo $nombre; ?>">
                <input type="text" name="image_<?php echo $id; ?>" value="<?php echo $imagen; ?>">
            </div>
            <br>
            
            <div class='main-grid'>
                Precio: <input type="text" class="editable" name="price_<?php echo $id; ?>" value="<?php echo $precio; ?>">&#8364;
                Stock: <input type="text" class="editable"  name="stock_<?php echo $id; ?>" value="<?php echo $stock; ?>">
            </div>
             Activo: <select name="activo_<?php echo $id; ?>">
                <?php if ($activo == "si") {
                    echo "<option value='si' selected>Si</option>";
                    echo "<option value='no'>No</option>";
                } else {
                    echo "<option value='si'>Si</option>";
                    echo "<option value='no' selected>No</option>";
                } ?>
                </select>
            </center>
        </div>
        <?php
    }
    ?>
</div>
<div id="cuatro">
    <?php
    include "conexion.php";
    $query = "SELECT * FROM carta WHERE categoria='segundoplato' ORDER BY nombre ASC";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    while ($registro1 = mysqli_fetch_array($result)) {
        $id = $registro1[0];
        $nombre = $registro1[1];
        $precio = $registro1[2];
        $stock = $registro1[3];
        $imagen = $registro1[5];
        $activo = $registro1[6];

        ?>
        <div class='box'>
            <center>
            <div class="image-container">
                <img src='<?php echo $imagen; ?>' alt=''>
            </div>
            <br>
           <div class="panes">
                <input type="text" name="name_<?php echo $id; ?>" value="<?php echo $nombre; ?>">
                <input type="text" name="image_<?php echo $id; ?>" value="<?php echo $imagen; ?>">
            </div>
            <br>
            
            <div class='main-grid'>
                Precio: <input type="text" class="editable" name="price_<?php echo $id; ?>" value="<?php echo $precio; ?>">&#8364;
                Stock: <input type="text" class="editable"  name="stock_<?php echo $id; ?>" value="<?php echo $stock; ?>">
            </div>
             Activo: <select name="activo_<?php echo $id; ?>">
                <?php if ($activo == "si") {
                    echo "<option value='si' selected>Si</option>";
                    echo "<option value='no'>No</option>";
                } else {
                    echo "<option value='si'>Si</option>";
                    echo "<option value='no' selected>No</option>";
                } ?>
                </select>
            </center>
        </div>
        <?php
    }
    ?>
</div>
<div id="cinco">
    <?php
    include "conexion.php";
    $query = "SELECT * FROM carta WHERE categoria='postre' ORDER BY nombre ASC";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    while ($registro1 = mysqli_fetch_array($result)) {
        $id = $registro1[0];
        $nombre = $registro1[1];
        $precio = $registro1[2];
        $stock = $registro1[3];
        $imagen = $registro1[5];
        $activo = $registro1[6];

        ?>
        <div class='box'>
            <center>
            <div class="image-container">
                <img src='<?php echo $imagen; ?>' alt=''>
            </div>
            <br>
            <div class="panes">
                <input type="text" name="name_<?php echo $id; ?>" value="<?php echo $nombre; ?>">
                <input type="text" name="image_<?php echo $id; ?>" value="<?php echo $imagen; ?>">
            </div>
            <br>
            
            <div class='main-grid'>
                Precio: <input type="text" class="editable" name="price_<?php echo $id; ?>" value="<?php echo $precio; ?>">&#8364;
                Stock: <input type="text" class="editable"  name="stock_<?php echo $id; ?>" value="<?php echo $stock; ?>">
            </div>
             Activo: <select name="activo_<?php echo $id; ?>">
                <?php if ($activo == "si") {
                    echo "<option value='si' selected>Si</option>";
                    echo "<option value='no'>No</option>";
                } else {
                    echo "<option value='si'>Si</option>";
                    echo "<option value='no' selected>No</option>";
                } ?>
                </select>
            </center>
        </div>
        <?php
    }
    ?>
</div>
</form>
</div>

  <a href="logout.php"> <button class="logout-button cerrarsesion" type="button">Cerrar sesion</button></a>
</center>
<script src="js/indexadmin.js"></script>
<script>
  // Get all the plus and minus buttons
  const plusButtons = document.querySelectorAll('.plus-button');
  const minusButtons = document.querySelectorAll('.minus-button');
  
  // Add click event listeners to the buttons
  plusButtons.forEach(button => {
    button.addEventListener('click', event => {
      const inputField = event.target.parentNode.querySelector('.input-quantity');
      const currentValue = parseInt(inputField.value);
      inputField.value = currentValue + 1;
    });
  });
  
  minusButtons.forEach(button => {
    button.addEventListener('click', event => {
      const inputField = event.target.parentNode.querySelector('.input-quantity');
      const currentValue = parseInt(inputField.value);
      if (currentValue > 0) {
        inputField.value = currentValue - 1;
      }
    });
  });
</script>

<script>
  // get all the buttons
  // get all the buttons
const buttons = document.querySelectorAll('.menu');

// get all the divs
const divs = document.querySelectorAll('div[id^="uno"], div[id^="dos"], div[id^="tres"], div[id^="cuatro"], div[id^="cinco"]');
    divs.forEach(div => div.style.display = 'none');
        document.getElementById('uno').style.display = 'block';

// add event listener to each button
buttons.forEach(button => {
  button.addEventListener('click', () => {
    // remove 'active' class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));

    // add 'active' class to the clicked button
    button.classList.add('active');

    // hide all the divs
    divs.forEach(div => div.style.display = 'none');

    // show the corresponding div based on the clicked button
    switch (button.id) {
      case 'bebida':
        document.getElementById('uno').style.display = 'block';
        break;
      case 'entrante':
        document.getElementById('dos').style.display = 'block';
        break;
      case 'arroces':
        document.getElementById('tres').style.display = 'block';
        break;
      case 'carne-pescado':
        document.getElementById('cuatro').style.display = 'block';
        break;
      case 'postre':
        document.getElementById('cinco').style.display = 'block';
        break;
      default:
        // show the first div by default
        document.getElementById('uno').style.display = 'block';
    }
  });
});

  
</script>


</body>
</html>
