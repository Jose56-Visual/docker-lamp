<?php
require 'pdo.php';

$usuario = filter_input(INPUT_GET, 'usuario', FILTER_VALIDATE_INT);
$estado = filter_input(INPUT_GET, 'estado', FILTER_SANITIZE_STRING);

$query = "SELECT tareas.id, tareas.titulo, tareas.descripcion, tareas.estado, usuarios.username
    FROM tareas
    JOIN usuarios ON tareas.id_usuario = usuarios.id";

$params = [];
if ($usuario) {
    $query .= " WHERE tareas.id_usuario = :usuario";
    $params['usuario'] = $usuario;
}

if ($estado) {
    if (!empty($params)) {
        $query .= " AND";
    } else {
        $query .= " WHERE";
    }
    $query .= " tareas.estado = :estado";
    $params['estado'] = $estado;
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$tareas = $stmt->fetchAll();
?>

<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Usuario</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($tareas as $tarea): ?>
    <tr>
        <td><?php echo htmlspecialchars($tarea['id']); ?></td>
        <td><?php echo htmlspecialchars($tarea['titulo']); ?></td>
        <td><?php echo htmlspecialchars($tarea['descripcion']); ?></td>
        <td><?php echo htmlspecialchars($tarea['estado']); ?></td>
        <td><?php echo htmlspecialchars($tarea['username']); ?></td>
        <td>
            <a href="editaTareaForm.php?id=<?php echo $tarea['id']; ?>">Editar</a>
            <a href="borraTarea.php?id=<?php echo $tarea['id']; ?>">Borrar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
