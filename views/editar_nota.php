<?php
require __DIR__."/../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

$estudiante = $_GET['estudiante'] ?? '';
$materia = $_GET['materia'] ?? '';
$actividad = $_GET['actividad'] ?? '';
$nota = $_GET['nota'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Nota</title>
</head>
<body>
    <h1>Editar Nota</h1>

    <form action="../index.php?action=actualizar" method="POST">
        <input type="hidden" name="estudiante" value="<?= htmlspecialchars($estudiante) ?>">
        <input type="hidden" name="materia" value="<?= htmlspecialchars($materia) ?>">
        <input type="hidden" name="actividad" value="<?= htmlspecialchars($actividad) ?>">

        <label>Nota actual:</label>
        <input type="number" name="nota" value="<?= htmlspecialchars($nota) ?>" min="0" max="5" step="0.01" required>

        <button type="submit">Actualizar</button>
    </form>

    <br><a href="nota.php">Cancelar</a>
</body>
</html>