<?php
$mysqli = new mysqli("localhost", "root", "test", "tareas");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>
