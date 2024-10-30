<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!--header-->
    <?php require_once 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php require_once 'menu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Sobre mí</h2>
                </div>
                <div class="container">
                    <p>Hola, soy Jose Manuel Iglesias Castro, un apasionado del desarrollo web y la programación. Me encanta aprender nuevas tecnologías y aplicarlas en proyectos interesantes. En esta aplicación, encontrarás información sobre mis tareas y proyectos. ¡Gracias por visitar!</p>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php require_once 'footer.php'; ?>
</body>
</html>
