<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar estudiante</title>
    <link rel="stylesheet" href="../../public/css/estudiante/estudiante.css">
</head>

<body>
    <?php
    require __DIR__ . "/../../controllers/estudiante-controllers.php";

    use App\Controllers\EstudianteController;

    $estudianteController = new EstudianteController();

    $id = empty($_POST['codigo']) ? "" : $_POST['codigo'];//asigna lo que se envio por post a la variable id

    if ($id && $estudianteController->hasNotas($id)) {
    ?>
        <h1>No se puede eliminar el estudiante porque tiene notas registradas</h1>
        <br>
        <a href="../estudiante.php" class="volver"> Volver a la lista de estudiantes</a>
    <?php
        exit;
    }

    $result = $estudianteController->deleteEstudiante(['codigo' => $id]);
    if ($result) {
        header('Location: ../estudiante.php');
        exit;
    }
    ?>
</body>

</html>