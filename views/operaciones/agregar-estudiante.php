<?php
require __DIR__ . "/../../controllers/estudiante-controllers.php";
use App\controllers\EstudianteController;

$estudianteController = new EstudianteController;

$result = !empty($_POST['codigo'])? // tener en cuenta si no viene vacio o si viene vacio
$estudianteController->saveNewEstudiante($_POST):
$estudianteController->updateEstudiante($_POST);

if($result){
    header("Location: ../estudiante.php");
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
    <a href = "../estudiante-form.php">Volver</a>
</body>
</html>