<?php
		// Procesar datos del formulario si se ha enviado
			include"conexion.php";
			$pedido=$_POST['idpedido'];
			if($_POST['discount'] != ""){
			
			$descuento=$_POST['amount_received'] * $_POST['discount'] / 100;
			$off= $_POST['discount'];
			if(isset($_POST['sumar'])){
			$precio=$_POST['amount_received'] + $descuento;
			$descuento='+'.round($descuento,2);
			}else{
			$precio=$_POST['amount_received'] - $descuento;
			$descuento='-'.round($descuento,2);
			}
			$precio=round($precio,2);
			
			
			}else{$precio = $_POST['amount_received'];}

			if ($_POST['payment_mode'] === 'efectivo') {
				// Obtener la cantidad recibida si se ha seleccionado el pago en efectivo
				
					    
					     $query="UPDATE pedido SET pagado='si, efectivo ($descuento&#8364; | $off%)', preciodescuento='$precio' WHERE id='$pedido'";
					$result=mysqli_query($con,$query);
					if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
					 $query="UPDATE factura SET estado='finalizado' WHERE id_pedido='$pedido'";
					$result=mysqli_query($con,$query);
					if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
					    echo "<script>window.location.href = 'pedidoscamarero.php?efectivo'</script>";
					
			} elseif ($_POST['payment_mode'] === 'tarjeta') {
				// Obtener los datos de la tarjeta si se ha seleccionado el pago con tarjeta
				$card_number = $_POST['card_number'];
				$expiration_date = $_POST['expiration_date'];
				$security_code = $_POST['security_code'];
					    //$pedido=$_GET['codigo'];
					     $query="UPDATE pedido SET pagado='si, tarjeta ($descuento&#8364; | $off%)' , preciodescuento='$precio' WHERE id='$pedido'";
					$result=mysqli_query($con,$query);
					if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
					 $query="UPDATE factura SET estado='finalizado' WHERE id_pedido='$pedido'";
					$result=mysqli_query($con,$query);
					if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
					    echo "<script>window.location.href = 'pedidoscamarero.php?tarjeta'</script>";
			}