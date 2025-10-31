<?php
require_once __DIR__ . "/../../controllers/estudiante-controllers.php";
use App\Controllers\EstudianteController;

$controller = new EstudianteController();
$estudiantes = $controller->queryAllEstudiante();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes por Programa</title>
    <link rel="stylesheet" href="../../public/css/consultas.css">
</head>
<body>
    <div class="contenedor-consulta">
        <h1>Estudiantes por Programa</h1>

        <table>
        <tr>
            <th>Programa</th>
            <th>Código Estudiante</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php foreach ($estudiantes as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e->get('programa')) ?></td>
            <td><?= htmlspecialchars($e->get('codigo')) ?></td>
            <td><?= htmlspecialchars($e->get('nombre')) ?></td>
            <td><?= htmlspecialchars($e->get('email')) ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
        <a href="../principal.php">Volver</a>
    </div>
</body>
</html>
