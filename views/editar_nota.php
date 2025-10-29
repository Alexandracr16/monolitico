<?php
require_once __DIR__ . "/../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$estudiante = $_GET["estudiante"] ?? "";
$materia = $_GET["materia"] ?? "";
$actividad = $_GET["actividad"] ?? "";
$nota = $_GET["nota"] ?? "";
?>

<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Editar Nota</title></head>
<body>
  <h1>Editar Nota</h1>

  <form action="../index.php?action=editar" method="POST">
    <input type="hidden" name="estudiante" value="<?=htmlspecialchars($estudiante)?>">
    <input type="hidden" name="materia" value="<?=htmlspecialchars($materia)?>">
    <input type="hidden" name="actividad" value="<?=htmlspecialchars($actividad)?>">

    <p><strong>Estudiante:</strong> <?=htmlspecialchars($estudiante)?></p>
    <p><strong>Materia:</strong> <?=htmlspecialchars($materia)?></p>
    <p><strong>Actividad:</strong> <?=htmlspecialchars($actividad)?></p>

    <label>Nueva Nota:
      <input type="number" name="nota" value="<?=htmlspecialchars($nota)?>" min="0" max="5" step="0.01" required>
    </label><br><br>

    <button type="submit">Guardar Cambios</button>
    <a href="nota.php">Cancelar</a>
  </form>
</body>
</html>