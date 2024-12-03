// editaTareaForm.php
<?php
require 'mysqli.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID de tarea inválido.");
}

$stmt = $mysqli->prepare("SELECT * FROM tareas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$tarea = $result->fetch_assoc();

if (!$tarea) {
    die("Tarea no encontrada.");
}
?>

<form action="editaTarea.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($tarea['id']); ?>">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($tarea['titulo']); ?>" required><br>

    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($tarea['descripcion']); ?>"><br>

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($tarea['estado']); ?>"><br>

    <label for="id_usuario">Usuario:</label>
    <select id="id_usuario