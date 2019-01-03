<?php
$user="house";
$password="99887766";
$database="house";
$mysqli = new mysqli('localhost', $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
