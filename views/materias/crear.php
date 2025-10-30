<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materia</title>
</head>
<body>
    <h2>Nueva Materia</h2>
    <form action="/monolitico/controllers/materia-controller.php?action=crear" method="POST">
        <label>Código:</label><br>
        <input type="text" name="codigo" maxlength="10" required><br><br>

        <label>Nombre:</label><br>
        <input type="text" name="nombre" maxlength="50" required><br><br>

        <label>Programa:</label><br>
        <select name="programa" required>
            <option value="">Ej:Sistemas</option>
            <?php while ($p = $programas->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($p['codigo']) ?>">
                    <?= htmlspecialchars($p['nombre']) ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit">Guardar</button> 
        <br>
        <br>
        <a href="/monolitico/controllers/materia-controller.php?action=listar">Cancelar</a>
    </form>
</body>
</html>
