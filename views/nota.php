<?php
require_once __DIR__ . "/../controllers/notas-controllers.php";

use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resultado = $controller->saveNewNotas($_POST);

  if (isset($resultado['error'])) {
    echo "<script>alert('{$resultado['error']}');</script>";
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

  <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'eliminada'): ?>
    <script>alert('Nota eliminada correctamente');</script>
  <?php endif; ?>

  <div class="contenedor-principal">

    <!-- Formulario -->
    <div class="contenedor-formulario">
      <form action="nota.php" method="POST">
        <label>Estudiante:<br><input type="text" name="estudiante" required></label><br>
        <label>Materia:<br><input type="text" name="materia" required></label><br>
        <label>Actividad:<br><input type="text" name="actividad" required></label><br>
        <label>Nota:<br><input type="number" name="nota" min="0" max="5" step="0.01" required></label><br>
        <button type="submit">Guardar</button>
      </form>
    </div>

    <!-- Tabla -->
    <div class="contenedor-tabla">
      <h3>Lista de notas</h3>
      <table>
        <thead>
          <tr>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Actividad</th>
            <th>Nota</th>
            <th>Promedio (Materia)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($notas)): ?>
            <?php foreach ($notas as $n): ?>
              <tr>
                <td><?= htmlspecialchars($n->get('estudiante')) ?></td>
                <td><?= htmlspecialchars($n->get('materia')) ?></td>
                <td><?= htmlspecialchars($n->get('actividad')) ?></td>
                <td><?= htmlspecialchars($n->get('nota')) ?></td>
                <td>
                  <?php
                    $promedio = $controller->promedioEstudiante(
                      $n->get('estudiante'),
                      $n->get('materia')
                    );
                    echo number_format($promedio, 2);
                  ?>
                </td>
                <td>
                  <a href="notas/editar_nota.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>&nota=<?= urlencode($n->get('nota')) ?>">Editar</a>
                  |
                  <a href="notas/eliminar.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>" onclick="return confirm('¿Eliminar esta nota?')" class="btn-eliminar">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="6">No hay notas registradas.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <p><a href="principal.php" class="volver">Volver</a></p>

</body>
</html>