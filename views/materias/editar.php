<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materia</title>
    <link rel="stylesheet" href="../public/css/materia/editarM.css">
</head>
<body>
<div class="contenedor">
        <h2>Editar Materia</h2>
        <?php if (empty($materia)): ?>
            <p>No se encontró la materia</p>
        <?php else: ?>
            <form action="/monolitico/controllers/materia-controller.php?action=editar&codigo=<?= urlencode($materia['codigo']) ?>" method="POST">
                <label>Código:</label>
                <input type="text" value="<?= htmlspecialchars($materia['codigo']) ?>" disabled>

                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($materia['nombre']) ?>" required>

                <label>Programa:</label>
                <select name="programa" required>
                    <?php while ($p = $programas->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($p['codigo']) ?>"
                            <?= ($p['codigo'] == $materia['programa']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($p['nombre']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit">Guardar</button>
                
                <a href="/monolitico/controllers/materia-controller.php?action=listar">Cancelar</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
