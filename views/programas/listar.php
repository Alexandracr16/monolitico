<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas</title>
</head>
<body>
    <h2>Lista de programas</h2>
    <table border="1" cellpadding="6" cellspacing="0">
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
                        <a href="/monolitico/controllers/programa-controller.php?action=editar&codigo=<?= urlencode($row['codigo']) ?>">Editar</a> |
                        <a href="/monolitico/controllers/programa-controller.php?action=eliminar&codigo=<?= urlencode($row['codigo']) ?>"
                           onclick="return confirm('¿Deseas eliminar este programa?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="3">No hay programas registrados.</td></tr>
        <?php endif; ?>
    </table>
         <a href="/monolitico/views/principal.php">Volver al menu</a> 
         <br>
         <br>
         <a href="/monolitico/controllers/programa-controller.php?action=crear">Nuevo Programa</a>
    <br><br>
</body>
</html>
