<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programa</title>
</head>
<body>
    <h2>Editar Programa</h2>

    <?php if (empty($programa)): ?>
        <p>No se encontró el programa.</p>
    <?php else: ?>
        <form action="/monolitico/controllers/programa-controller.php?action=editar&codigo=<?= urlencode($programa['codigo']) ?>" method="POST">
            <label>Código:</label><br>
            <input type="text" value="<?= htmlspecialchars($programa['codigo']) ?>" disabled><br><br>

            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($programa['nombre']) ?>" maxlength="50" required><br><br>

            <button type="submit">Actualizar</button>
            <a href="/monolitico/controllers/programa-controller.php?action=listar">Cancelar</a>
        </form>
    <?php endif; ?>
</body>
</html>
