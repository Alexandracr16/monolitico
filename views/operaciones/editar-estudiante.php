<?php
require __DIR__ . "/../../controllers/estudiante-controllers.php";

use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController;

// Si llega un POST con 'codigo' intentamos actualizar
if (!empty($_POST) && !empty($_POST['codigo'])) {
    $result = $estudianteController->updateEstudiante($_POST);
    if ($result) {
        header("Location: ../estudiante.php");
        exit;
    }
} else {
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
</head>
<body>
    <h1>Error guardando los malparidos datos<h1>
    <br>
    <a href = "../editar-eform.php">Volver</a>
</body>
</html>