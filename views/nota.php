<?php
require __DIR__ . "/../controllers/notas-controllers.php";

use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();
$notas = $controller->queryAllNotas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Notas</title>
</head>
<body>
    <h1>Gestión de Notas</h1>

    <h3>Registrar notas</h3>
    <form action="../index.php?action=guardar" method="POST">
        <label>Estudiante: </label>
        <input type="text" name="estudiante" required>

        <label>Materia: </label>
        <input type="text" name="materia" required>

        <label>Actividad: </label>
        <input type="text" name="actividad" required>

        <label>Nota: </label>
        <input type="number" name="nota" min="0" max="5" step="0.1" required>

        <button type="submit">Guardar</button>
    </form>

    <hr>

    <h3>Lista de notas</h3>
    <table border="1" cellpadding="5">
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
                <?php foreach ($notas as $nota): ?>
                    <tr>
                        <td><?= htmlspecialchars($nota->get('estudiante')) ?></td>
                        <td><?= htmlspecialchars($nota->get('materia')) ?></td>
                        <td><?= htmlspecialchars($nota->get('actividad')) ?></td>
                        <td><?= htmlspecialchars($nota->get('nota')) ?></td>
                        <td>
                            <a href="../index.php?action=editar&estudiante=<?=urlencode($nota->get('estudiante'))?>&materia=<?=urlencode($nota->get('materia'))?>&actividad=<?=urlencode($nota->get('actividad'))?>&nota=<?=urlencode($nota->get('nota'))?>
                            ">Editar</a>
                            |
                            <a href="../index.php?action=eliminar&estudiante=<?=urlencode($nota->get('estudiante'))?>&materia=<?=urlencode($nota->get('materia'))?>
                            ">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay notas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="principal.php">Volver al menú</a>
</body>
</html>