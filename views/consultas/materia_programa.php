<?php
require_once __DIR__ . "/../../controllers/materia-controller.php";
require_once __DIR__ . "/../../controllers/programa-controller.php";

use App\Controllers\ProgramaController;

$materiaCtrl = new MateriaController();
$programaCtrl = new ProgramaController();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Materias por Programa</title>
  <link rel="stylesheet" href="/monolitico/public/css/consultas.css">
</head>
<body>

    <?php if (!empty($programas)): ?>
      <?php foreach ($programas as $prog): ?>
        <div class="programa">
          <h2>Programa: <?= htmlspecialchars($prog['nombre']) ?> (<?= htmlspecialchars($prog['codigo']) ?>)</h2>

          <?php
          $materiasPrograma = array_filter($materias, fn($m) => $m['programa'] === $prog['codigo']);
          ?>

          <?php if (!empty($materiasPrograma)): ?>
            <table>
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombre de la Materia</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($materiasPrograma as $m): ?>
                  <tr>
                    <td><?= htmlspecialchars($m['codigo']) ?></td>
                    <td><?= htmlspecialchars($m['nombre']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
    <div class="acciones">
      <a href="../principal.php" class="volver">⬅ Volver</a>
    </div>
</body>
</html>