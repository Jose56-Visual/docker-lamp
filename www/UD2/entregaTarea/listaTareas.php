<?php
include 'utils.php';

// Recuperar las tareas
$tareas = obtenerListadoTareas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="table">
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>Identificador</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?php echo $tarea['id']; ?></td>
                    <td><?php echo $tarea['descripcion']; ?></td>
                    <td><?php echo $tarea['estado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>