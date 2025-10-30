<?php
require_once __DIR__ . "/../controllers/notas-controllers.php";

use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resultado = $controller->saveNewNotas($_POST);
  if ($resultado === false) {
    echo "<script>alert('Error al guardar la nota. Verifica los datos.');</script>";
  } else {
    echo "<script>alert('Nota guardada correctamente'); window.location='nota.php';</script>";
    exit;
  }
}
$notas = $controller->queryAllNotas();
?>

<!Doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión notas</title>
  <link rel="stylesheet" href="../public/css/notas/notasr.css">

</head>
  <body>

    <h1>Notas</h1>

    <div class="contenedor-principal">
      <!-- Columna del formulario -->
      <div class="contenedor-formulario">
        <form action="nota.php" method="POST">
          <label>Estudiante: <input type="text" name="estudiante" value="" required></label>
          <label>Materia: <input type="text" name="materia" value="" required></label>
          <label>Actividad: <input type="text" name="actividad" value="" required></label>
          <label>Nota: <input type="number" name="nota" min="0" max="5" step="0.01" value="3.00" required></label>
          <button type="submit">Guardar</button>
        </form>
      </div>

      <!-- Columna de la tabla -->
      <div class="contenedor-tabla">
        <h3>Lista de notas</h3>
        <table>
          <thead>
            <tr>
              <th>Estudiante</th>
              <th>Materia</th>
              <th>Actividad</th>
              <th>Nota</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($notas)): foreach ($notas as $n): ?>
                <tr>
                  <td><?= htmlspecialchars($n->get('estudiante')) ?></td>
                  <td><?= htmlspecialchars($n->get('materia')) ?></td>
                  <td><?= htmlspecialchars($n->get('actividad')) ?></td>
                  <td><?= htmlspecialchars($n->get('nota')) ?></td>
                  <td>
                    <a href="notas/editar_nota.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>&nota=<?= urlencode($n->get('nota')) ?>">Editar</a>
                    |
                    <a href="notas/eliminar.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>" onclick="return confirm('¿Eliminar?')" class="btn-eliminar">Eliminar</a>
                  </td>
                </tr>
              <?php endforeach;
            else: ?>
              <tr>
                <td colspan="5">No hay notas</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <p><a href="principal.php" class="volver">Volver</a></p>
  </body>
</html>