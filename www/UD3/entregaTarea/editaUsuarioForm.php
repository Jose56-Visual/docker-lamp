<?php
// editaUsuarioForm.php
require_once 'Database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}
?>

<form action="editaUsuario.php" method="post">
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $usuario['username']; ?>" required><br>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required><br>
    <label for="contrasena">Nueva Contraseña (dejar en blanco para mantener actual):</label>
    <input type="password" id="contrasena" name="contrasena"><br>
    <input type="submit" value="Actualizar Usuario">
</form>
