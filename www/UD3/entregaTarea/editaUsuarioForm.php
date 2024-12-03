<?php
require 'pdo.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID de usuario inválido.");
}

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch();
    if (!$usuario) {
        die("Usuario no encontrado.");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<form action="editaUsuario.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($usuario['username']); ?>" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>"><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>"><br>

    <label for="contrasena">Nueva contraseña:</label>
    <input type="password" id="contrasena" name="contrasena"><br>

    <input type="submit" value="Actualizar Usuario">
</form>

