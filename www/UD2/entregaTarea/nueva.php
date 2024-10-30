<?php
include 'utils.php';

$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

if (guardarTarea($descripcion, $estado)) {
    $mensaje = "Tarea guardada correctamente.";
} else {
    $mensaje = "Error al guardar la tarea. Revise los campos.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Nueva Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'menu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Resultado de la Nueva Tarea</h2>
                </div>
                <div class="container">
                    <p><?php echo $mensaje; ?></p>
                </div>
            </main>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
