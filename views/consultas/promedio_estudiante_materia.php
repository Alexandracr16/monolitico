<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();
$codigoEstudiante = $_GET['estudiante'] ?? '';
$notas = [];
$promedios = [];

if ($codigoEstudiante) {
    $notas = $controller->queryNotasByEstudiante($codigoEstudiante);
    foreach ($notas as $n) {
        $promedios[$n->get('materia')] = $controller->promedioEstudiante($codigoEstudiante, $n->get('materia'));
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Promedios por Materia</title>
<link rel="stylesheet" href="../../public/css/consultas.css">
</head>
<body>
    <div class="contenedor-consulta">
        <h1>Promedio por Materia de Estudiante</h1>

    <form method="get">
    <label>Ingrese Código del Estudiante:</label>
    <input type="text" name="estudiante" value="<?= htmlspecialchars($codigoEstudiante) ?>">
    <button type="submit">Buscar</button>
    </form>

    <?php if ($codigoEstudiante && !empty($promedios)): ?>
    <h3>Resultados para <?= htmlspecialchars($codigoEstudiante) ?></h3>
    <table border="1">
        <tr><th>Materia</th><th>Promedio</th></tr>
        <?php foreach ($promedios as $materia => $prom): ?>
        <tr>
            <td><?= htmlspecialchars($materia) ?></td>
            <td><?= number_format($prom, 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php elseif ($codigoEstudiante): ?>
    <p>No hay notas registradas para este estudiante.</p>
    <?php endif; ?>

    <a href="../principal.php">Volver</a>
    </div>
    
</body>
</html>
