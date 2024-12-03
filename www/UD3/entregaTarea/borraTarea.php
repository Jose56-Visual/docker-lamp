<?php
require 'mysqli.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID de tarea inválido.");
}

$stmt = $mysqli->prepare("DELETE FROM tareas WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Tarea borrada correctamente.";
} else {
    echo "Error al borrar la tarea.";
}

$stmt->close();
?>
