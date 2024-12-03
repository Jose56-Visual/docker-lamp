<?php
require 'pdo.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
$contrasena = $_POST['contrasena'] ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : null;

if (!$id || !$username) {
    die("Datos inválidos.");
}

try {
    $sql = "UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos";
    if ($contrasena) {
        $sql .= ", contrasena = :contrasena";
    }
    $sql .= " WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    if ($contrasena) {
        $stmt->bindParam(':contrasena', $contrasena);
    }
    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

