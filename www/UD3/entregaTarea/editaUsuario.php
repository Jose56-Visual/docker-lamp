<?php
// editaUsuario.php
require_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
$contrasena = !empty($_POST['contrasena']) ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : null;

if ($contrasena) {
    $query = "UPDATE usuarios SET username = ?, nombre = ?, apellidos = ?, contrasena = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $nombre, $apellidos, $contrasena, $id]);
} else {
    $query = "UPDATE usuarios SET username = ?, nombre = ?, apellidos = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $nombre, $apellidos, $id]);
}

if ($stmt) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error actualizando el usuario.";
}
?>
