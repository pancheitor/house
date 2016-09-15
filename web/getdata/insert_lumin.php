<?php

// Funcion para recibir la luminosidad de un sensor. Ejemplo URL: http://127.0.0.1/house/web/getdata/insert_lumin.php?sensor=2&lumin=28

$sensor = htmlspecialchars( $_GET["sensor"]);
$lumin = htmlspecialchars( $_GET["lumin"]);

include "dbconfig.php";
$sql = "INSERT INTO luminosidad(sensor, valor, created) VALUES ($sensor,$lumin, NOW())";
if(!$mysqli->query($sql)) {
 echo "Fallo la creacion del registro" . $mysqli->error; 
 }
?>
