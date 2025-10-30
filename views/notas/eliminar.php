<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

$estudiante = $_GET['estudiante'] ?? '';
$materia = $_GET['materia'] ?? '';
$actividad = $_GET['actividad'] ?? '';

if (empty($estudiante) || empty($materia) || empty($actividad)) {
    echo "<script>alert(' Faltan datos para eliminar la nota.'); window.location='nota.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'Sí') {
        $controller->deleteNotas($_POST);
        echo "<script>alert('Nota eliminada correctamente'); window.location='nota.php';</script>";
        exit;
    } else {
        header("Location: nota.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Nota</title>
</head>
<body>
    <h1>Eliminar nota</h1>

    <p>¿Seguro que deseas eliminar esta nota?</p>
    <ul>
        <li><strong>Estudiante:</strong> <?= htmlspecialchars($estudiante) ?></li>
        <li><strong>Materia:</strong> <?= htmlspecialchars($materia) ?></li>
        <li><strong>Actividad:</strong> <?= htmlspecialchars($actividad) ?></li>
    </ul>

    <form method="POST">
        <input type="hidden" name="estudiante" value="<?= htmlspecialchars($estudiante) ?>">
        <input type="hidden" name="materia" value="<?= htmlspecialchars($materia) ?>">
        <input type="hidden" name="actividad" value="<?= htmlspecialchars($actividad) ?>">
        <button type="submit" name="confirmar" value="Sí">Sí, eliminar</button>
        <button type="submit" name="confirmar" value="No">No, cancelar</button>
    </form>

</body>
</html>
