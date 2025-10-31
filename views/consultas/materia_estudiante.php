<?php
require_once __DIR__ . "/../../controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();
$codigoMateria = $_GET['materia'] ?? '';
$notas = [];
$promedios = [];

if ($codigoMateria) {
   
    $notas = $controller->queryAllNotas();

    
    foreach ($notas as $n) {
        if ($n->get('materia') === $codigoMateria) {
            $estudiante = $n->get('estudiante');
            $promedios[$estudiante] = $controller->promedioEstudiante($estudiante, $codigoMateria);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes por Materia</title>
    <link rel="stylesheet" href="../../public/css/consultas.css">
</head>
<body>
    <div class="contenedor-consulta">
        <h1>Estudiantes por Materia</h1>

        <form method="get">
        <label>Ingrese Código de la Materia:</label>
        <input type="text" name="materia" value="<?= htmlspecialchars($codigoMateria) ?>" required>
        <button type="submit">Buscar</button>
        </form>

        <?php if ($codigoMateria && !empty($promedios)): ?>
        <h3>Resultados para la materia <?= htmlspecialchars($codigoMateria) ?></h3>
        <table>
            <tr>
            <th>Código Estudiante</th>
            <th>Promedio</th>
            </tr>
            <?php foreach ($promedios as $estudiante => $prom): ?>
            <tr>
                <td><?= htmlspecialchars($estudiante) ?></td>
                <td><?= number_format($prom, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php elseif ($codigoMateria): ?>
        <p>No hay notas registradas para esta materia.</p>
        <?php endif; ?>

        <a href="../principal.php">Volver</a>
    </div>
    
</body>
</html>
