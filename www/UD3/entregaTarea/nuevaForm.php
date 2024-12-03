<!-- nuevaForm.php -->
<form action="nueva.php" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="descripcion"><br>

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado"><br>

    <label for="id_usuario">Usuario:</label>
    <select id="id_usuario" name="id_usuario" required>
        <?php
        require 'pdo.php';
        $stmt = $pdo->prepare("SELECT id, username FROM usuarios");
        $stmt->execute();
        while ($usuario = $stmt->fetch()) {
            echo "<option value='" . htmlspecialchars($usuario['id']) . "'>" . htmlspecialchars($usuario['username']) . "</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Crear Tarea">
</form>
