<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
    <link rel="stylesheet" href="../public/css/materia/materia.css">
</head>
<body>
    <h2>Tabla de materias</h2>
    
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Programa</th>
            <th>Acciones</th>
        </tr>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['codigo']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['programa']) ?></td>
                    <td class="acciones">
                        <a href="/monolitico/controllers/materia-controller.php?action=editar&codigo=<?= urlencode($row['codigo']) ?>">Editar</a>
                        <span class="separador">|</span>
                        <a href="#" onclick="return confirmarEliminacion('<?= $row['codigo'] ?>')" class="btn-eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="sin-registros">No hay materias registradas</td>
            </tr>
        <?php endif; ?>
    </table>
    
    <div class="acciones-container">
        <a href="/monolitico/views/principal.php" class="volver">Volver al menú</a>
        <a href="/monolitico/controllers/materia-controller.php?action=crear" class="nueva-materia">Nueva Materia</a>
    </div>

    <script>
        function confirmarEliminacion(codigo) {
            if (confirm('¿Deseas eliminar esta materia?')) {
                window.location = '/monolitico/controllers/materia-controller.php?action=eliminar&codigo=' + encodeURIComponent(codigo);
            }
            return false;
        }
    </script>
</body>
</html>

