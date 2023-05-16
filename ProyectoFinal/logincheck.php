<?php 
session_start();
include"conexion.php";
$usuario = $_POST['user'];
$password = $_POST['password'];

$user=mysqli_real_escape_string($con,$usuario );
$pas=mysqli_real_escape_string($con,$password );
$current_date = date('Y-m-d');
$current_time = date('H:i:s');
$ip_address = $_SERVER['REMOTE_ADDR'];
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

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (strpos($user_agent, 'iPhone') !== false) {
    $model = 'iPhone';
} elseif (strpos($user_agent, 'iPad') !== false) {
    $model = 'iPad';
} elseif (strpos($user_agent, 'Android') !== false) {
    $model = 'Android device';
}else if (strpos($user_agent, 'Windows') !== false) {
     $model = 'Windows';
} else if (strpos($user_agent, 'Macintosh') !== false) {
    echo 'macOS';
} else if (strpos($user_agent, 'Linux') !== false) {
    echo 'Linux';
} else {
    $model = 'Unknown device';
}



$query = "SELECT tipo,password,alias FROM usuarios WHERE user = '$user'";
$result=mysqli_query($con,$query);
if ($result -> num_rows > 0) {
$registro=mysqli_fetch_array($result);
$hash = $registro['1'];
$tipo= $registro['0'];

if(password_verify($pas, $hash)){
setcookie("permiso", $registro['0'], time() + (1 * 60 * 60 * 6), "/");


$usuariosinnada=$_POST['user'];
$contrasenasinnada=$_POST['password'];
$query = "INSERT INTO logins (dia,hora,user,causa,ip,localizacion) VALUES ('$current_date', '$current_time', '$usuariosinnada','$tipo inicio sesion','$ip_address ($model)','$city, $country')";
$result=mysqli_query($con,$query);
	if($tipo == 'camarero'){
		
		 header("Location: index.php");
		 setcookie("tipocamarero", $registro['2'], time() + (10 * 365 * 24 * 60 * 60), "/");

	}else if($tipo == 'cocinero'){
		
		 header("Location: cocina.php");
	}else if($tipo == 'administrador'){
		
		 header("Location: indexadmin.php");
	}
}else{


$usuariosinnada=$_POST['user'];
$contrasenasinnada=$_POST['password'];
$fail="Contrasena incorrecta";

$query = "INSERT INTO logins (dia,hora,user,contrseña,causa,ip,localizacion) VALUES ('$current_date', '$current_time', '$usuariosinnada', '$contrasenasinnada','$fail','$ip_address ($model)','$city, $country')";
$result=mysqli_query($con,$query);
if (!$result) {
    echo "Error: " . mysqli_error($con);
}
 header("Location: login.php?fail=".$fail."");
}}else {$fail="El usuario no existe";
$current_date = date('Y-m-d');
$current_time = date('H:i:s');
$usuariosinnada=$_POST['user'];
$contrasenasinnada=$_POST['password'];
$query = "INSERT INTO logins (dia,hora,user,contrseña,causa,ip,localizacion) VALUES ('$current_date', '$current_time', '$usuariosinnada', '$contrasenasinnada','$fail','$ip_address($model)','$city, $country')";
$result=mysqli_query($con,$query);
if (!$result) {
    echo "Error: " . mysqli_error($con);
}
 header("Location: login.php?fail=".$fail."");

}
?>