<form action="tareas.php" method="GET">
    <label for="usuario">Usuario:</label>
    <select id="usuario" name="usuario" required>
        <?php
        require 'pdo.php';
        $stmt = $pdo->prepare("SELECT id, username FROM usuarios");
        $stmt->execute();
        while ($usuario = $stmt->fetch()) {
            echo "<option value='" . htmlspecialchars($usuario['id']) . "'>" . htmlspecialchars($usuario['username']) . "</option>";
        }
        ?>
    </select><br>

    <label for="estado">Estado (opcional):</label>
    <input type="text" id="estado" name="estado"><br>

    <input type="submit" value="Buscar Tareas">
</form>
