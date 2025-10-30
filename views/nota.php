<?php
require_once __DIR__ . "/../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();
$notas = $controller->queryAllNotas();
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Notas debug</title></head>
<body>
  <h1>Notas</h1>

  <!-- Formulario: Nombres exactos: estudiante, materia, actividad, nota -->
  <form action="../index.php?action=guardar" method="POST">
    <label>Estudiante: <input type="text" name="estudiante" value="" required></label><br>
    <label>Materia:    <input type="text" name="materia"    value="" required></label><br>
    <label>Actividad:  <input type="text" name="actividad"  value="" required></label><br>
    <label>Nota:       <input type="number" name="nota" min="0" max="5" step="0.01" value="3.00" required></label><br>
    <button type="submit">Guardar</button>
  </form>

  <hr>

  <h3>Lista</h3>
  <table border="1" cellpadding="6">
    <thead><tr><th>Estudiante</th><th>Materia</th><th>Actividad</th><th>Nota</th><th>Acciones</th></tr></thead>
    <tbody>
      <?php if (!empty($notas)): foreach ($notas as $n): ?>
        <tr>
          <td><?=htmlspecialchars($n->get('estudiante'))?></td>
          <td><?=htmlspecialchars($n->get('materia'))?></td>
          <td><?=htmlspecialchars($n->get('actividad'))?></td>
          <td><?=htmlspecialchars($n->get('nota'))?></td>
          <td>
            <!-- enlaces en UNA LINEA, sin saltos de línea -->
            <a href="../index.php?action=editar&estudiante=<?=urlencode($n->get('estudiante'))?>&materia=<?=urlencode($n->get('materia'))?>&actividad=<?=urlencode($n->get('actividad'))?>&nota=<?=urlencode($n->get('nota'))?>">Editar</a>
            |
            <a href="../index.php?action=eliminar&estudiante=<?=urlencode($n->get('estudiante'))?>&materia=<?=urlencode($n->get('materia'))?>&actividad=<?=urlencode($n->get('actividad'))?>" onclick="return confirm('Eliminar?')">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; else: ?>
        <tr><td colspan="5">No hay notas</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <p><a href="principal.php">Volver</a></p>
</body>
</html>