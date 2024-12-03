<?php
require 'mysqli.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);

if (!$id || !$titulo || !$id_usuario) {
    die("Datos inválidos.");
}

$stmt = $mysqli->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, estado = ?, id_usuario = ? WHERE id = ?");
$stmt->bind_param("sssii", $titulo, $descripcion, $estado, $id_usuario, $id);

if ($stmt->execute()) {
    echo "Tarea actualizada correctamente.";
} else {
    echo "Error al actualizar la tarea.";
}

$stmt->close();
?>
