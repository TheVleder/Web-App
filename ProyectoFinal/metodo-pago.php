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
<link rel="stylesheet" type="text/css" href="../css/metodopago.css">
	<title>Pago</title>
	<style>
		body {
			background-color: #1e1e1e;
			color: #fff;
			font-family: Arial, sans-serif;
			font-size: 35px;
			margin: 0;
			padding: 0;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top:50px;
			height: 100vh;
		}
		.form {
			background-color: #333;
			border-radius: 10px;
			padding: 20px;
			width: 60%;
		}
		.form label {
			display: block;
			margin-bottom: 10px;
		}
		.form input[type="text"],
		.form input[type="number"],
		.form input[type="email"],
		.form input[type="password"] {
			background-color: #444;
			border: none;
			border-radius: 5px;
			color: #fff;
			font-size: 16px;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}
		.form input[type="submit"] {
			background-color: #007aff;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			transition: background-color 0.3s ease;
			width: 100%;
		}
		.form input[type="submit"]:hover {
			background-color: #0069d9;
		}
		.form .cash {
			display: flex;
			flex-direction: column;
		}
		.form .cash label {
			margin-top: 10px;
		}
		.form .card {
			display: none;
			flex-direction: column;
		}
		.form .card label {
			margin-top: 10px;
		}
		.form .discount {
			margin-top: 20px;
		}
		.form .discount input[type="text"] {
			width: 50px;
		}
		.hidden{
		display:none;}
		
		/* Unchecked radio button */
/* Unchecked radio button */
input[type=radio] {
  
  width: 30px;
  height: 30px;
  border: 2px solid #ccc;
  border-radius: 50%;
  outline: none;
  margin-right: 10px;
  vertical-align: middle;
}

/* Checked radio button */
input[type=radio]:checked::before {
  content: "";
  display: block;
  position: absolute;
  top: 3px;
  left: 3px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
}
input[type=checkbox] {
  
  width: 30px;
  height: 30px;
  border: 2px solid #ccc;
  border-radius: 50%;
  outline: none;
  margin-right: 10px;
  vertical-align: middle;
}

@media screen and (max-width: 760px) {
  .form {
    width: 90% !important;
  }
  body {
    font-size: 75px !important;
  }
}
.hide{display:none}
#imagen{max-width:70%;
border-radius:15px;
        box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.5); /* Aplica una sombra difuminada a los bordes */
 }
 .cantidad{max-width:10%}
	</style>
</head>
<body>
	<div class="container">
		<form class="form" method="post" action="apagar.php">
			<label>Modo de pago:</label>
			<input type="radio" name="payment_mode" id="cash" value="efectivo" checked onclick="togglePaymentOption()"> Efectivo<br>
			<input type="radio" name="payment_mode" id="card" value="tarjeta" onclick="togglePaymentOption()"> Tarjeta<br>
			<input type="text" name="idpedido" value="<?php echo $_GET['pedido']; ?>" class="hidden">
			<div class="cash" id="cashcash">
				
			</div>
			<label>Cantidad:</label>
				<input type="number" class="cantidad" name="amount_received" min="0" step="0.01" value="<?php echo $_GET['total']; ?>" placeholder="Cantidad recibida">

			<div class="hide">
				<label>Número de tarjeta:</label>
				<input type="text" name="card_number" placeholder="Número de tarjeta">
				<label>Fecha de expiración:</label>
				<input type="text" name="expiration_date" placeholder="MM/AA">
				<label>Código de seguridad:</label>
				<input type="password" name="security_code" placeholder="123">
				
			</div>
			<center>
				<imagen  class="card" id="cardcard">
				<img id="imagen" src="https://files.helpdocs.io/zqc32mkmew/articles/77ygqpmzuc/1564414767607/behavioral-contactless.gif">
				</imagen>
			</center>
			<div class="discount">
				<label>Descuento:</label>
				<input type="text" name="discount" placeholder="0%">
				<label>Sumar?:</label>
				<input type="checkbox" name="sumar" class >
			</div>
			<input type="submit" value="Pagar">
		</form>
	</div>

	

	<script src="../js/metodopago.js"></script>
	<script>
function togglePaymentOption() {
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  var cashcash = document.getElementById("cashcash");
  var cardcard = document.getElementById("cardcard");

  if (cash.checked) {
    cashcash.style.display = "block";
    cardcard.style.display = "none";
  } else if (card.checked) {
    cashcash.style.display = "none";
    cardcard.style.display = "block";
  }
}
</script>
</body>
</html>
