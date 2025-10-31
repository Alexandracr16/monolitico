<?php
require_once __DIR__ . "/../../controllers/programa-controller.php";
use App\Controllers\ProgramaController;

$controller = new ProgramaController();
$programas = $controller->queryAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Programas de Formación</title>
  <link rel="stylesheet" href="../../public/css/consultas.css">
</head>
<body>
    <div class="contenedor-consulta">
         <h1>Programas de Formación Registrados</h1>

  <?php if (!empty($programas)): ?>
    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre del Programa</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($programas as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['codigo']) ?></td>
            <td><?= htmlspecialchars($p['nombre']) ?></td>
            <td>
              <a href="../../controllers/programa-controller.php?action=editar&codigo=<?= urlencode($p['codigo']) ?>">Editar</a> |
              <a href="../../controllers/programa-controller.php?action=eliminar&codigo=<?= urlencode($p['codigo']) ?>"
                 onclick="return confirm('¿Seguro que deseas eliminar el programa <?= htmlspecialchars($p['nombre']) ?>?');"
                 class="btn-eliminar">
                 Eliminar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p style="text-align:center;">No hay programas registrados.</p>
  <?php endif; ?>

  <p><a href="../principal.php" class="volver">⬅ Volver</a></p>
    </div>
 

</body>
</html>