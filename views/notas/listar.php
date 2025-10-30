<?php
require_once __DIR__ . '/../../controllers/notas-controllers.php';;

use App\Controllers\Notas_controllers;


// Controlador
$controlador = new Notas_controllers();
$notas = $controlador->queryAllNotas();

$mensaje = "";

// Mensaje de confirmación (opcional si vienes desde eliminar.php o editar.php)
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'deleted') {
        $mensaje = "<div class='alert alert-success'>✅ Nota eliminada correctamente.</div>";
    } elseif ($_GET['msg'] === 'updated') {
        $mensaje = "<div class='alert alert-success'>✅ Nota actualizada correctamente.</div>";
    } elseif ($_GET['msg'] === 'error') {
        $mensaje = "<div class='alert alert-danger'>❌ Ocurrió un error al procesar la acción.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de notas</title>
</head>
<body>
<div class="container">
    <h2>Gestión de Notas</h2>

    <?= $mensaje ?>

    <a href="crear.php" class="nuevo">Registrar</a>

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
        <?php if (!empty($notas)): ?>
            <?php foreach ($notas as $n): ?>
                <tr>
                    <td><?= htmlspecialchars($n->get('estudiante')) ?></td>
                    <td><?= htmlspecialchars($n->get('materia')) ?></td>
                    <td><?= htmlspecialchars($n->get('actividad')) ?></td>
                    <td><?= htmlspecialchars($n->get('nota')) ?></td>
                    <td class="acciones">
                        <a class="btn editar"
                           href="editar_nota.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>">
                           Editar
                        </a>

                        <a class="eliminar"
                           href="eliminar.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">No hay notas registradas.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <p>
        <a href="../principal.php" class="btn volver">⬅ Volver al menú principal</a>
    </p>
</div>
</body>
</html>