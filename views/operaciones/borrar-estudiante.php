<?php
require __DIR__ . "/../../controllers/estudiante-controllers.php";

use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController();

$id = empty ($_POST['codigo']) ?
"":
$_POST['codigo'];

$result = $estudianteController -> deleteEstudiante(['codigo'=> $id]);//Dentro del metodo delete se pasa una array asociativo como argumento para que lo borre

if ($result){ //dependiedo si se realizo o no la eliminacion entrara en el if 
    header('Location: ../estudiante.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>Error eliminando los malparidos datos<h1>
    <br>
    <a href = "../estudiante-form.php">Volver</a>
</body>
</html>