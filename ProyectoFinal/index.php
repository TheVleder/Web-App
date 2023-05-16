<?php

   header('Content-Type: text/html; charset=UTF-8');
   
   session_start();
   	if (isset($_COOKIE["permiso"])&&($_COOKIE["permiso"] != "camarero")) {
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
   <link rel="stylesheet" type="text/css" href="css/index.css">

      <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=0.7, user-scalable=no">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="shortcut icon" href="https://media-cdn.tripadvisor.com/media/photo-m/1280/1a/ca/10/8c/fork-logo.jpg" />
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
         height: max-content;
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
         .button-container {
         display: flex;
         justify-content: center;
         }
         .main-grid {
         display: grid;
         grid-template-rows: auto;
         font-size:20px;
         }
         .sub-grid {
         padding: 1px;
         font-size:25px;
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
         margin-bottom:auto;
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
         display: flex;
         justify-content: center;
        // align-items: center;
         }
         .button-grid button {
         margin: 0 10px;
         }
         .button-container button {
         width: 180px;
         margin: 0 10px;
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
         .menu:hover {
         color: #fff;
         background-color: #2ecc71;
         border: none;
         border-radius: 15px;
         }
         /* Styles for phones */
         @media (max-width: 700px) {
         .sub-grid {
         font-size:20px;
         }
         .topdiv{width:100%;}
         .button-container button {
         width: 90px;
         margin: 0 5px;
         }
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
         height:min-content;
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
         margin-bottom: 15px;
         text-overflow: ellipsis; /* add an ellipsis (...) to the end of the name if it overflows */
         }
         .input-quantity{font-size:25px;
         width:45px;
         text-align:center;
         }
         /* Default styles for the buttons */
         .plus-button {
         margin-top: auto;
         font-size: 40px;
         max-width: 50px;
         max-height: 50px;
         }
         .minus-button {
         margin-top: auto;
         font-size: 40px;
         max-width: 50px;
         max-height: 50px;
         }
         /* Safari-specific styles for iOS devices */
         .tamano,#mesa, .mesita{font-size:30px;
         font-weight: bold;
         text-align: center;
         text-decoration: none;
         background-color: #4CAF50;
         color: #fff;
         margin-top:5px;
         border-radius: 8px;
         border: none;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
         transition: all 0.3s ease;
         }
         #esconder{
         display:none;
         }
         .miBanner {
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 190px;
         font-size:30px;
         background-color: #6fbd00;
         color: #fff;
         padding: 10px;
         z-index: 9999;
         border-radius:15px;
         }
         .cerrarBanner {
         position: absolute;
         top: 0;
         right: 0;
         margin: 10px;
         cursor: pointer;
         color:black;
         }
         .mesa-highlight {
         color: red;
         }
         .mesa-highlight2 {
         color: orange;
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
         .espacio{margin-bottom:10px;}
         .button-container {
         margin-top: 5px; /* add some space between the name and the button */
         }
         .imagen{width:20px;
         height:20px;}
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
         <form action="checker.php" method="POST">
            <button type="button" class="mesita" id="generamesas" onclick="generarBanner()">Mesas</button>
            <a href="pedidoscamarero.php"><button  class="tamano" type="button">Pedidos</button></a>
            <label for="mesa"></label>
            <select name="mesa" id="mesa" required>
               <option disabled selected value="">Selecciona Mesa</option>
               <option value="1" id="Mesa 1">Mesa 1</option>
               <option value="2" id="Mesa 2">Mesa 2</option>
               <option value="3" id="Mesa 3">Mesa 3</option>
               <option value="4" id="Mesa 4">Mesa 4</option>
               <option value="5" id="Mesa 5">Mesa 5</option>
               <option value="6" id="Mesa 6">Mesa 6</option>
               <option value="7" id="Mesa 7">Mesa 7</option>
               <option value="8" id="Mesa 8">Mesa 8</option>
               <option value="9" id="Mesa 9">Mesa 9</option>
               <option value="10" id="Mesa 10">Mesa 10</option>
               <option value="11" id="Mesa 11">Mesa 11</option>
               <option value="12" id="Mesa 12">Mesa 12</option>
               <option value="13" id="Mesa 13">Mesa 13</option>
               <option value="14" id="Mesa 14">Mesa 14</option>
               <option value="15" id="Mesa 15">Mesa 15</option>
            </select>
            <input type="submit" class="tamano" value="Hacer pedido">
            <br>
            <a href="servido.php"><input type="button" class="tamano" id="esconder" value="Listo para entregar"></a>
            <div class="large">
               <div id="uno">
                  <?php
                     $camarero = $_COOKIE["tipocamarero"];
                     include "conexion.php";
                     //include('http://thevleder3.000webhostapp.com/conexion.php');
                     
                     $query = "SELECT * FROM carta WHERE categoria='bebida' and activo='si' ORDER BY Alcohol ASC, nombre ASC";
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
                     $alcohol = $registro1[7];
                     ?>
                  <div class='box'>
                     <center>
                        <div class="image-container">
                           <img src='<?php echo $imagen; ?>' alt='' >
                        </div>
                        <br>
                        <div class="panes">
                           <div class="panesh"><?php echo $nombre; if ($alcohol == 1) { echo "<img class='imagen' src='https://cdn-0.emojis.wiki/emoji-pics/twitter/no-one-under-eighteen-twitter.png'>"; } ?></div>
                        </div>
                        <div class="button-container">
                           <button type="button" class="minus-button">-</button>
                           <input type="number" class="input-quantity" name="quantity_<?php echo $id; ?>" value="0" max="<?php echo $stock; ?>" readonly>
                           <button type="button" class="plus-button">+</button>
                        </div>
                        <div class='main-grid espacio'>
                           <div class='sub-grid'>Precio: <?php echo $precio; ?>&#8364;</div>
                           <div class='sub-grid espacio'>Stock: <?php echo $stock; ?></div>
                        </div>
                     </center>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <div id="dos">
                  <?php
                     $query = "SELECT * FROM carta WHERE categoria='entrante' and activo='si' ORDER BY nombre ASC";
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
                           <div class="panesh"><?php echo $nombre; ?></div>
                        </div>
                        <div class="button-container">
                           <button type="button" class="minus-button">-</button>
                           <input type="number" class="input-quantity" name="quantity_<?php echo $id; ?>" value="0" max="<?php echo $stock; ?>" readonly>
                           <button type="button" class="plus-button">+</button>
                        </div>
                        <div class='main-grid espacio'>
                           <div class='sub-grid'>Precio: <?php echo $precio; ?>&#8364;</div>
                           <div class='sub-grid espacio'>Stock: <?php echo $stock; ?></div>
                        </div>
                     </center>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <div id="tres">
                  <?php
                     $query = "SELECT * FROM carta WHERE categoria='primerplato' and activo='si'  ORDER BY nombre ASC";
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
                           <div class="panesh"><?php echo $nombre; ?></div>
                        </div>
                        <div class="button-container">
                           <button type="button" class="minus-button">-</button>
                           <input type="number" class="input-quantity" name="quantity_<?php echo $id; ?>" value="0" max="<?php echo $stock; ?>" readonly>
                           <button type="button" class="plus-button">+</button>
                        </div>
                        <div class='main-grid espacio'>
                           <div class='sub-grid'>Precio: <?php echo $precio; ?>&#8364;</div>
                           <div class='sub-grid espacio'>Stock: <?php echo $stock; ?></div>
                        </div>
                     </center>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <div id="cuatro">
                  <?php
                     $query = "SELECT * FROM carta WHERE categoria='segundoplato' and activo='si'  ORDER BY nombre ASC";
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
                     	 $alcohol = $registro1[7];
                         ?>
                  <div class='box'>
                     <center>
                        <div class="image-container">
                           <img src='<?php echo $imagen; ?>' alt=''>
                        </div>
                        <br>
                        <div class="panes">
                           <div class="panesh"><?php echo $nombre; ?></div>
                        </div>
                        <div class="button-container">
                           <button type="button" class="minus-button">-</button>
                           <input type="number" class="input-quantity" name="quantity_<?php echo $id; ?>" value="0" max="<?php echo $stock; ?>" readonly>
                           <button type="button" class="plus-button">+</button>
                        </div>
                        <?php
                           if($alcohol == 1){
                          echo" 
			   <select id='cocinado' name='cocinado'>
			     <option value='pocohecho' disabled selected >Como lo quieres?</option>
			     <option value='pocohecho'>Poco Hecho</option>
			     <option value='alpunto'>Al Punto</option>
			     <option value='bienhecho'>Bien Hecho</option>
			     <option value='muyhecho'>Muy Hecho</option>
			  </select>
				";
				
                           
                           }else{echo"<br>";}
                        
                        ?>
                        <div class='main-grid espacio'>
                           <div class='sub-grid'>Precio: <?php echo $precio; ?>&#8364;</div>
                           <div class='sub-grid espacio'>Stock: <?php echo $stock; ?></div>
                       
                        </div>
                        
                     </center>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <div id="cinco">
                  <?php
                     $query = "SELECT * FROM carta WHERE categoria='postre' and activo='si'  ORDER BY nombre ASC";
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
                           <div class="panesh"><?php echo $nombre; ?></div>
                        </div>
                        <div class="button-container">
                           <button type="button" class="minus-button">-</button>
                           <input type="number" class="input-quantity" name="quantity_<?php echo $id; ?>" value="0" max="<?php echo $stock; ?>" readonly>
                           <button type="button" class="plus-button">+</button>
                        </div>
                        <div class='main-grid espacio'>
                           <div class='sub-grid'>Precio: <?php echo $precio; ?>&#8364;</div>
                           <div class='sub-grid espacio'>Stock: <?php echo $stock; ?></div>
                        </div>
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
   <script src="js/index.js"></script>
   <script>
      function checkForNewData() {
          $.ajax({
              url: "comprobarpreparado.php", // replace with the URL of your PHP script
              success: function(result) {
                  if (result == "1") {
                      // new data is available, show the element
                      $("#esconder").show();
                      document.getElementById('esconder').style.display='block';
                  } else {
                      // no new data, hide the element
                      $("#esconder").hide();
                      document.getElementById('esconder').style.display='none';    
                  }
              },
              error: function() {
              }
          });
      }
      
      // call the function every 1 second
      setInterval(checkForNewData, 500);
      
   </script>
   <script>
      var select = document.getElementById("mesa");
      
      // Creamos una lista ul
      var lista = document.createElement("ul");
      // Get the mesa value from your database
      // Get the mesa and camarero values from your database
      <?php
         $mesa_array = array();
         $camareroarray = array();
         $query = "SELECT mesa,camarero FROM pedido WHERE pagado='no'";
         $result = mysqli_query($con, $query);
         while ($row = mysqli_fetch_assoc($result)) {
             $mesa_array[] = "Mesa ".$row['mesa'];
             $camareroarray[] = $row['camarero'];
         }
         ?>
      
      
      // Convert PHP array to JavaScript array
      var mesa_array = <?php echo json_encode($mesa_array); ?>;
      var camarero_array = <?php echo json_encode($camareroarray); ?>;
      
      // Loop over the select options
      for (var i = 1; i < select.options.length; i++) {
      // Creamos un elemento li para cada opción
      var opcion = document.createElement("li");
      var mesas = document.getElementById("Mesa "+i);
      
      // Agregamos el texto de la opción al elemento li
      opcion.textContent = select.options[i].text;
      
      // Check if the current option is in the mesa array
      if (mesa_array.includes(opcion.textContent)) {
        // Get the index of the mesa in the array
        var index = mesa_array.indexOf(opcion.textContent);
        
        // Add a class to the opcion element to change its color based on the assigned waiter
        if (camarero_array[index] == <?php echo $camarero; ?>) {
            opcion.classList.add("mesa-highlight2");
           mesas.style.color="orange";
      
        } else {
            opcion.classList.add("mesa-highlight");
             mesas.style.color="red";
      
        }
      }
      
      // Agregamos el elemento li a la lista ul
      lista.appendChild(opcion);
      }
      
      
      
      
        // Creamos el banner y agregamos la lista generada
        var banner = document.createElement("div");
        banner.classList.add("miBanner");
        banner.id = "miBanner"; // Add the ID here
        //banner.innerHTML = "<span class='cerrarBanner' onclick='cerrarBanner()'>XXXXXXXXX</span>";
        banner.setAttribute("onclick", "cerrarBanner()");
        banner.appendChild(lista);
        
        // Agregamos el banner al body
        document.body.appendChild(banner);
            banner.style.display = "none";
      
      function generarBanner() {
      
        banner.style.display = "block";
      
      }
      
      function cerrarBanner() {
      // Ocultamos el banner al hacer clic en el botón de cerrar
      banner.style.display = "none";
      }
      
      
      
   </script>
   <script>
      // Get all the plus and minus buttons
      const plusButtons = document.querySelectorAll('.plus-button');
      const minusButtons = document.querySelectorAll('.minus-button');
      
      // Add click event listeners to the buttons
      plusButtons.forEach(button => {
        button.addEventListener('click', event => {
          const inputField = event.target.parentNode.querySelector('.input-quantity');
          let currentValue = parseInt(inputField.value);
          const maxValue = parseInt(inputField.getAttribute('max'));
          
          if (currentValue >= maxValue) {
            currentValue = maxValue;
          } else {
            currentValue += 1;
          }
          
          inputField.value = currentValue;
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