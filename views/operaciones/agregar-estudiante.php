<?php
require __DIR__ . "/../../controllers/estudiante-controllers.php";
use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController;

$result = !empty($_POST['codigo'])? // tener en cuenta si no viene vacio o si viene vacio
$estudianteController->saveNewEstudiante($_POST):
"";

if($result){
    header("Location: ../estudiante.php");
}
?>

<!DOCTYPE html> <!-- creo que basicamente esto nunnca se ejecutaria, pero lo mantenemos por el css -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error al guardar estudiante</title>
    <link rel="stylesheet" href="../../public/css/estudiante/estudiante.css">
</head>
<body>
    <div class="mensaje-error">Error: El código de programa ingresado no existe. Por favor, ingrese un código de programa válido.</div>
    <a href="../estudiante-form.php" class="enlace-volver">← Volver al formulario</a>
</body>
</html>