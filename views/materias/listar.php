<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
</head>
<body>
    <h2>Tabla de materias</h2>
    <table border="1" cellpadding="6">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Programa</th>
            <th>Hacer</th>
        </tr>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['codigo']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['programa']) ?></td>
                    <td>
                        <a href="/monolitico/controllers/materia-controller.php?action=editar&codigo=<?= urlencode($row['codigo']) ?>">Editar</a> |
                        <a href="/monolitico/controllers/materia-controller.php?action=eliminar&codigo=<?= urlencode($row['codigo']) ?>"
                           onclick="return confirm('¿Deseas eliminar esta materia?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">No hay materias registradas</td></tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="/monolitico/controllers/materia-controller.php?action=crear">Nueva Materia</a>
    <br>
    <br>
    <a href="/monolitico/views/principal.php">Volver al menú</a>
    
</body>
</html>
