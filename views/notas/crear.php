<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controller->saveNewNotas($_POST);

    if ($resultado === false) {
        echo "<script>alert('Error al guardar la nota. Verifica los datos.');</script>";
    } else {
        echo "<script>alert('Nota guardada correctamente'); window.location='listar.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nueva nota</title>
</head>
<body>
    <h1>Registrar nueva nota</h1>

<form method="POST">
    <label>Estudiante:</label><br>
    <input type="text" name="estudiante" required><br><br>

    <label>Materia:</label><br>
    <input type="text" name="materia" required><br><br>

    <label>Actividad:</label><br>
    <input type="text" name="actividad" required><br><br>

    <label>Nota (0 - 5):</label><br>
    <input type="number" name="nota" min="0" max="5" step="0.01" required><br><br>

    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
</body>
</html>
