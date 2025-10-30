<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

// Recibir datos desde la URL (GET)
$estudiante = $_GET['estudiante'] ?? '';
$materia = $_GET['materia'] ?? '';
$actividad = $_GET['actividad'] ?? '';
$nota = $_GET['nota'] ?? '';

if (empty($estudiante) || empty($materia) || empty($actividad)) {
    echo "<script>alert('❌ Faltan datos para editar la nota.'); window.location='listar.php';</script>";
    exit;
}

// Si se envía el formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controller->updateNotas($_POST);

    if (is_array($resultado) && isset($resultado['error'])) {
        echo "<script>alert('❌ " . $resultado['error'] . "');</script>";
    } elseif ($resultado) {
        echo "<script>alert('✅ Nota actualizada correctamente'); window.location='listar.php';</script>";
        exit;
    } else {
        echo "<script>alert('❌ Error al actualizar la nota');</script>";
    }
}
?>

<!Doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar Nota</title>
</head>
<body>
  <h1>Editar Nota</h1>

  <form method="POST">
    <input type="hidden" name="estudiante" value="<?= htmlspecialchars($estudiante) ?>">
    <input type="hidden" name="materia" value="<?= htmlspecialchars($materia) ?>">
    <input type="hidden" name="actividad" value="<?= htmlspecialchars($actividad) ?>">

    <p><b>Estudiante:</b> <?= htmlspecialchars($estudiante) ?></p>
    <p><b>Materia:</b> <?= htmlspecialchars($materia) ?></p>
    <p><b>Actividad:</b> <?= htmlspecialchars($actividad) ?></p>

    <label>Nueva Nota:
      <input type="number" name="nota" value="<?= htmlspecialchars($nota) ?>" min="0" max="5" step="0.01" required>
    </label>

    <br><br>
    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
  </form>
</body>
</html>
