<?php

// Funcion para recibir la humedad de un sensor. Ejemplo URL: http://127.0.0.1/house/web/getdata/insert_humedad.php?sensor=2&hum=28

$sensor = htmlspecialchars( $_GET["sensor"]);
$hum = htmlspecialchars( $_GET["hum"]);

include "dbconfig.php";
$sql = "INSERT INTO humedad(sensor, valor, created) VALUES ($sensor,$hum, NOW())";
if(!$mysqli->query($sql)) {
 echo "Fallo la creacion del registro" . $mysqli->error; 
 }
?>
