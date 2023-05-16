<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/login.css">

	<title>Inicio de sesion</title>
	<style>
		body {
			background-color: black;
			color: white;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.6;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		h1 {
			font-size: 32px;
			margin-top: 20px;
		}
		h5{
			color:red;
		}

		form {
			display: inline-block;
			margin-top: 50px;
			text-align: left;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type=text], input[type=password], select {
			border: none;
			border-radius: 4px;
			box-shadow: none;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}

		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			border-radius: 4px;
			color: white;
			cursor: pointer;
			font-size: 18px;
			margin-top: 20px;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	
	
	<h1>INICIA SESION</h1>
	<?php 
	session_start();

		$fail=$_GET['fail'];
		if(isset($fail)){
		echo "<h5>".$fail."</h5>";
		}
	
	include"conexion.php";
$ip_address = $_SERVER['REMOTE_ADDR'];

//$ip_address = '74.73.254.170';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apilayer.com/ip_to_location/$ip_address",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain",
    "apikey: 6FggSrxtSyZPCEOLHKLQ2ypkIxL0tqx2"
  ),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);

curl_close($curl);
$record = json_decode($response);

// Extract the location information from the record
$country = $record->country_name;
$region = $record->region_name;
$city = $record->city;
$fecha = date('Y-m-d');
$hora= date('H:i:s');
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($user_agent, 'Chrome') !== false) {
    $browser= 'Chrome';
} elseif (strpos($user_agent, 'Firefox') !== false) {
    $browser= 'FireFox';
} elseif (strpos($user_agent, 'Safari') !== false) {
    $browser= 'Safari';
} elseif (strpos($user_agent, 'Opera') !== false) {
    $browser= 'Opera';
} elseif (strpos($user_agent, 'Edge') !== false) {
    $browser= 'Edge';
} else {
    $browser= 'Navegador';
}
if (strpos($user_agent, 'iPhone') !== false) {
    $model = 'iPhone';
} elseif (strpos($user_agent, 'iPad') !== false) {
    $model = 'iPad';
} elseif (strpos($user_agent, 'Android') !== false) {
    $model = 'Android';
} elseif (strpos($user_agent, 'Windows') !== false) {
    $model = 'Windows';
} elseif (strpos($user_agent, 'Macintosh') !== false) {
    $model = 'MacOS';
} elseif (strpos($user_agent, 'Linux') !== false) {
    if (strpos($user_agent, 'Apache') !== false) {
        $model = 'Linux (Apache server)';
    } elseif (strpos($user_agent, 'nginx') !== false) {
        $model = 'Linux (nginx server)';
    } else {
        $model = 'Linux (unknown server)';
    }
} elseif (strpos($user_agent, 'Apple Watch') !== false) {
    $model = 'Apple Watch';
} elseif (strpos($user_agent, 'SM-V700') !== false || strpos($user_agent, 'SM-R720') !== false) {
    $model = 'Samsung Gear';
} elseif (strpos($user_agent, 'Fitbit') !== false) {
    $model = 'Fitbit';
} elseif (strpos($user_agent, 'Garmin') !== false) {
    $model = 'Garmin';
} elseif (strpos($user_agent, 'Kindle') !== false || strpos($user_agent, 'Silk') !== false) {
    $model = 'Kindle';
} elseif (strpos($user_agent, 'Kobo') !== false) {
    $model = 'Kobo';
} elseif (strpos($user_agent, 'Nook') !== false) {
    $model = 'Nook';
} elseif (strpos($user_agent, 'Xbox') !== false) {
    $model = 'Xbox';
} elseif (strpos($user_agent, 'PlayStation') !== false) {
    $model = 'PlayStation';
} elseif (strpos($user_agent, 'Nintendo Switch') !== false) {
    $model = 'Nintendo Switch';
} elseif (strpos($user_agent, 'SamsungSmartTV') !== false) {
    $model = 'Samsung Smart TV';
} elseif (strpos($user_agent, 'LG Smart TV') !== false) {
    $model = 'LG Smart TV';
} elseif (strpos($user_agent, 'BRAVIA') !== false) {
    $model = 'Sony BRAVIA';
} elseif (strpos($user_agent, 'Roku') !== false) {
    $model = 'Roku';
} else {
    $model = 'Unknown device';
}

       if($city=='Mountain View'){
       $who="Google";
       $pass= 'Redirigido';
header("Location: Google_give_me_a_scholarship_to_work_with_you_and_learn_to_program_please.php");
}else{
       $pass= '';
	$who="Visitante";
}
$query = "INSERT INTO logins (dia,hora,user,contrseña,localizacion,ip,causa) VALUES ('$fecha', '$hora','$who','$pass','$city, $country','$ip_address($model,$browser)','pantalla inicio sesion(login)')";
$result=mysqli_query($con,$query);
       if(!$result) {
                         die("Query failed: " . mysqli_error($con));
                     }
        //if($city=='Mountain View' || $ip_address == '66.249.92.139' || $ip_address == '66.249.92.140' ||  $ip_address=='74.125.151.190' ||  $ip_address=='74.125.151.160'  ||  $ip_address=='74.125.151.163'  ||  $ip_address=='66.249.92.140'  ||  $ip_address=='66.249.92.43'  ||  $ip_address=='66.249.92.139'  ||  $ip_address=='66.249.92.44' ||  $ip_address=='66.249.92.42'  ||  $ip_address=='74.125.151.163'  ||  $ip_address=='66.102.6.64'  ||  $ip_address=='66.102.6.94'){


	
	?>
	<form action="logincheck.php" method="post">

		<label for="usuario">Usuario:</label>
		<input type="text" id="usuario" name="user" onfocus required autofocus>

		<label for="contrasena">Contrase&ntilde;a:</label>
		<input type="password" id="contrasena" name="password" required>

		<input type="submit" value="Iniciar sesi&oacute;n ">
	</form>
</body>
</html>
