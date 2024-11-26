<?php
// usuarios.php
require_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM usuarios";
$stmt = $db->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['username']; ?></td>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['apellidos']; ?></td>
                <td>
                    <a href="editaUsuarioForm.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="borraUsuario.php?id=<?php echo $usuario['id']; ?>">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
