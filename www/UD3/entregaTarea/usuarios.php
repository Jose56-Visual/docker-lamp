<?php
require 'pdo.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo htmlspecialchars($usuario['id']); ?></td>
        <td><?php echo htmlspecialchars($usuario['username']); ?></td>
        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
        <td><?php echo htmlspecialchars($usuario['apellidos']); ?></td>
        <td>
            <a href="editaUsuarioForm.php?id=<?php echo $usuario['id']; ?>">Editar</a>
            <a href="borraUsuario.php?id=<?php echo $usuario['id']; ?>">Borrar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

