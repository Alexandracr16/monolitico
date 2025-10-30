<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materia</title>
</head>
<body>
    <h2>Editar Materia</h2>
    <?php if (empty($materia)): ?>
    <?php else: ?>
        <form action="/monolitico/controllers/materia-controller.php?action=editar&codigo=<?= urlencode($materia['codigo']) ?>" method="POST">
            <label>Código:</label><br>
            <input type="text" value="<?= htmlspecialchars($materia['codigo']) ?>" disabled><br><br>

            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($materia['nombre']) ?>" required><br><br>

            <label>Programa:</label><br>
            <select name="programa" required>
                <?php while ($p = $programas->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($p['codigo']) ?>"
                        <?= ($p['codigo'] == $materia['programa']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nombre']) ?>
                    </option>
                <?php endwhile; ?>
            </select><br><br>

            <button type="submit">Guardar</button>
            <br>
            <br>
            <a href="/monolitico/controllers/materia-controller.php?action=listar">Cancelar</a>
        </form>
    <?php endif; ?>
</body>
</html>
