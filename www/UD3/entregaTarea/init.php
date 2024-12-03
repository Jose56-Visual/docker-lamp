<?php
$servername = "db";
$username = "root";
$password = "test";

// Crear la conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS tareas";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada correctamente<br>";
} else {
    echo "Error creando la base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db("tareas");

// Crear la tabla usuarios si no existe
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    nombre VARCHAR(50),
    apellidos VARCHAR(100),
    contrasena VARCHAR(100)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla usuarios creada correctamente<br>";
} else {
    echo "Error creando la tabla usuarios: " . $conn->error . "<br>";
}

// Crear la tabla tareas si no existe
$sql = "CREATE TABLE IF NOT EXISTS tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(250),
    estado VARCHAR(50),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla tareas creada correctamente<br>";
} else {
    echo "Error creando la tabla tareas: " . $conn->error . "<br>";
}

$conn->close();
?>
