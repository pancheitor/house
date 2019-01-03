<?php
$user="house";;
$password="99887766";
$database="house";
$host="127.0.0.1";
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Funcion para recibir la temperatura de un sensor. Ejemplo URL: http://127.0.0.1/house/web/getdata/insert_temp.php?sensor=2&temp=28

//$sensor = htmlspecialchars( $_GET["sensor"]);
//$temp = htmlspecialchars( $_GET["temp"]);

$sql = "INSERT INTO temperatura(sensor, valor, created) VALUES (15,6, NOW())";
echo "SQL: $sql";
if(!$mysqli->query($sql)) {
 echo "Fallo la creacion del registro" . $mysqli->error; 
 }
?>
