<?php 
require_once __DIR__ . '/../../controllers/notas-controllers.php';
use App\Controllers\Notas_controllers;

// Crear controlador
$controlador = new Notas_controllers();
$notas = $controlador->queryAllNotas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Notas</title>
</head>
<body>

<h2>Listado de Notas</h2>

<a href="crear.php"> Registrar nueva nota</a>

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
                        $promedio = $controlador->promedioEstudiante(
                            $n->get('estudiante'),
                            $n->get('materia')
                        );
                        echo number_format($promedio, 2);
                        ?>
                    </td>
                    <td>
                        <a href="editar_nota.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>&nota=<?= urlencode($n->get('nota')) ?>">Editar</a> |
                        <a href="eliminar.php?estudiante=<?= urlencode($n->get('estudiante')) ?>&materia=<?= urlencode($n->get('materia')) ?>&actividad=<?= urlencode($n->get('actividad')) ?>" onclick="return confirm('¿Eliminar esta nota?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No hay notas registradas.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<p><a href="../principal.php" class="volver">⬅️ Volver</a></p>

</body>
</html>