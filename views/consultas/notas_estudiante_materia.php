<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();
$codigoEstudiante = $_GET['estudiante'] ?? '';
$codigoMateria = $_GET['materia'] ?? '';
$notas = [];

if ($codigoEstudiante && $codigoMateria) {
    $notas = $controller->queryNotasByEstudiante($codigoEstudiante);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Notas por Estudiante y Materia</title>
<link rel="stylesheet" href="../../public/css/consultas.css">
</head>
<body>
    <div class="contenedor-consulta">
        <h1>Notas de un Estudiante por Materia</h1>

    <form method="get">
    <label>Código Estudiante:</label>
    <input type="text" name="estudiante" value="<?= htmlspecialchars($codigoEstudiante) ?>" required>
    <label>Código Materia:</label>
    <input type="text" name="materia" value="<?= htmlspecialchars($codigoMateria) ?>" required>
    <button type="submit">Consultar</button>
    </form>

    <?php if ($codigoEstudiante && $codigoMateria): ?>
    <h3>Notas de <?= htmlspecialchars($codigoEstudiante) ?> en <?= htmlspecialchars($codigoMateria) ?></h3>
    <table>
        <tr><th>Actividad</th><th>Nota</th></tr>
        <?php foreach ($notas as $n): ?>
        <?php if ($n->get('materia') === $codigoMateria): ?>
            <tr>
            <td><?= htmlspecialchars($n->get('actividad')) ?></td>
            <td><?= htmlspecialchars($n->get('nota')) ?></td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <a href="../principal.php">Volver</a>
    </div>
    
</body>
</html>
