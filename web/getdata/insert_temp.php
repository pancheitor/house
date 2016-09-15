<?php

// Funcion para recibir la temperatura de un sensor. Ejemplo URL: http://127.0.0.1/house/web/getdata/insert_temp.php?sensor=2&temp=28

$sensor = htmlspecialchars( $_GET["sensor"]);
$temp = htmlspecialchars( $_GET["temp"]);

include "dbconfig.php";
$sql = "INSERT INTO temperatura(sensor, valor, created) VALUES ($sensor,$temp, NOW())";
if(!$mysqli->query($sql)) {
 echo "Fallo la creacion del registro" . $mysqli->error; 
 }
?>
