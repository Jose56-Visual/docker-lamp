<?php
require_once 'database.php';

$database = new database();
$db = $database->getConnection();

// Reemplazar FILTER_SANITIZE_STRING con FILTER_SANITIZE_SPECIAL_CHARS
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_SPECIAL_CHARS);

// Verificar si el campo contrasena está definido y no es nulo
if (isset($_POST['contrasena'])) {
    $contrasena = $_POST['contrasena'];
    // Validar que la contraseña no sea nula antes de usar password_hash
    if (!empty($contrasena)) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    } else {
        echo "La contraseña no puede estar vacía.";
        exit;
    }
} else {
    echo "La clave 'contrasena' no está definida.";
    exit;
}

$query = "INSERT INTO usuarios (username, nombre, apellidos, contrasena) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($query);

if ($stmt->execute([$username, $nombre, $apellidos, $contrasena])) {
    echo "Usuario creado correctamente.";
} else {
    echo "Error creando el usuario.";
}
?>

