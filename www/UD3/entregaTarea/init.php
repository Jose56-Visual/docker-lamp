<?php
$servername = "db";
$username = "root";
$password = "test";  // Asegúrate de usar la contraseña correcta para tu servidor MySQL
$dbname = "tareas";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada correctamente<br>";
} else {
    echo "Error creando la base de datos: " . $conn->error;
}

// Seleccionar base de datos
$conn->select_db($dbname);

// Crear tabla usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    nombre VARCHAR(50),
    apellidos VARCHAR(100),
    contrasena VARCHAR(100)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada correctamente<br>";
} else {
    echo "Error creando la tabla 'usuarios': " . $conn->error;
}

// Crear tabla tareas
$sql = "CREATE TABLE IF NOT EXISTS tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50),
    descripcion VARCHAR(250),
    estado VARCHAR(50),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'tareas' creada correctamente<br>";
} else {
    echo "Error creando la tabla 'tareas': " . $conn->error;
}

$conn->close();
?>
