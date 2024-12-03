<?php
require 'mysqli.php';

$result = $mysqli->query("SELECT tareas.id, tareas.titulo, tareas.descripcion, tareas.estado, usuarios.username
    FROM tareas
    JOIN usuarios ON tareas.id_usuario = usuarios.id");

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
    <?php while ($tarea = $result->fetch_assoc()): ?>
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
    <?php endwhile; ?>
</table>
