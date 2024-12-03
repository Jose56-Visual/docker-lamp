// nueva.php
<?php
require 'mysqli.php';

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);

if (!$titulo || !$id_usuario) {
    die("Datos inválidos.");
}

$stmt = $mysqli->prepare("INSERT INTO tareas (titulo, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $titulo, $descripcion, $estado, $id_usuario);

if ($stmt->execute()) {
    echo "Tarea creada correctamente.";
} else {
    echo "Error al crear la tarea.";
}

$stmt->close();
?>
