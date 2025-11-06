<?php
require __DIR__ . "/../../controllers/estudiante-controllers.php";

use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController;

if (!empty($_POST) && !empty($_POST['codigo'])) {//asegura que lo que se envio por post no este vacio y de esa manera ejecuta la atualizacion
    $result = $estudianteController->updateEstudiante($_POST);
    if ($result) {
        header("Location: ../estudiante.php");
        exit;
    }
    // Si falla, mostramos el error específico
    $error = "No se puede modificar el estudiante porque tiene notas registradas";
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
    <h1>Error guardando los datos<h1>
            <br>
            <a href="../editar-eform.php">Volver</a>
</body>

</html>