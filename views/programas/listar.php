<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas</title>
    <link rel="stylesheet" href="../public/css/programa/r.css">
</head>
<body>
    <h2>Lista de programas</h2>
    
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Hacer</th>
        </tr>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['codigo']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td>
                        <a href="/monolitico/controllers/programa-controller.php?action=editar&codigo=<?= urlencode($row['codigo']) ?>" class="btn-accion">Editar</a>
                        <span class="separador">|</span>
                        <a href="/monolitico/controllers/programa-controller.php?action=eliminar&codigo=<?= urlencode($row['codigo']) ?>"
                           class="btn-accion btn-eliminar"
                           onclick="return confirm('¿Deseas eliminar este programa?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="sin-registros">No hay programas registrados.</td>
            </tr>
        <?php endif; ?>
    </table>
    
    <div class="acciones">
        <a href="/monolitico/views/principal.php" class="volver">Volver al menú</a>
        <a href="/monolitico/controllers/programa-controller.php?action=crear" class="crear-enlace">Nuevo Programa</a>
    </div>
</body>
</html>
