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
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/insertaralimentos.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        input[type="text"], select, input[type="file"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #262626;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .carne {
            display: none;
        }
        .alcohol{
            display: block;
        }

        @media screen and (max-width: 480px) {
            input[type="text"], select, input[type="file"] {
                width: 100%;
            }
            .button {
            font-size:20px;
            }
        }
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
    </style>
</head>
<body>
<a href="indexadmin.php" class="button">Atras</a>

    <form action="insertartabla.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" required>

        <label for="image">Image:</label>
        <input type="text" id="image" name="image" required>

  <label for="category">Category:</label>
  <select id="category" name="category">
      <option value="bebida">Bebida</option>
    <option value="entrante">Entrante</option>
    <option value="primerplato">Arroces</option>
    <option value="segundoplato">Carne o pescado</option>
    <option value="postre">Postre</option>
  </select>

  <div class="alcohol">
    <label for="alcoholic-checkbox">Alcoholic:</label>
    <input type="checkbox" id="alcoholic-checkbox" name="alcoholic">
  </div>

  <div class="carne">
    <label for="carne-checkbox">Carne:</label>
    <input type="checkbox" id="carne-checkbox" name="carne">
  </div>

        <input type="submit" value="A&ntilde;adir">
    </form>
<script src="../js/insertaralimentos.js"></script>
    <script>
  // Select form elements
const categoryDropdown = document.getElementById("category");

const alcoholicCheckbox = document.getElementById("alcoholic-checkbox");
const carneCheckbox = document.getElementById("carne-checkbox");

const alcoholDiv = document.querySelector(".alcohol");
const meatDiv = document.querySelector(".carne");

categoryDropdown.addEventListener("change", function() {
  if (categoryDropdown.value === "bebida") {
    alcoholDiv.style.display = "block";
    alcoholicCheckbox.style.display = "block";
    meatDiv.style.display = "none";
    carneCheckbox.style.display = "none";
  } else if (categoryDropdown.value === "segundoplato") {
    alcoholDiv.style.display = "none";
    alcoholicCheckbox.style.display = "none";
    meatDiv.style.display = "block";
    carneCheckbox.style.display = "block";
  }else {
    alcoholDiv.style.display = "none";
    alcoholicCheckbox.style.display = "none";
    meatDiv.style.display = "none";
    carneCheckbox.style.display = "none";
  }
});
  
  // Validate the form before submitting
  const form = document.getElementById("my-form");
  form.addEventListener("submit", function(event) {
    // Check that all required fields are filled
    const nameInput = document.getElementById("name");
    const priceInput = document.getElementById("price");
    const stockInput = document.getElementById("stock");
    const imageInput = document.getElementById("image");
    if (!nameInput.value || !priceInput.value || !stockInput.value || !imageInput.value || !categoryDropdown.value) {
      alert("Please fill in all required fields.");
      event.preventDefault();
      return;
    }
    
    // If bebida or segundoplato are selected, check that the appropriate checkbox is checked
  
    
    // Submit the form
    // You can add any additional logic here, such as making an AJAX request to submit the form data
  });
</script>
