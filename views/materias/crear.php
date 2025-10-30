<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materia</title>
    <link rel="stylesheet" href="../public/css/materia/nuevamateria.css">
</head>
<body>
       <div class="contenedor">
        <h2>Nueva Materia</h2>
        <form action="/monolitico/controllers/materia-controller.php?action=crear" method="POST">
            <label>Código:</label>
            <input type="text" name="codigo" maxlength="10" required>

            <label>Nombre:</label>
            <input type="text" name="nombre" maxlength="50" required>

            <label>Programa:</label>
            <select name="programa" required>
                <option value="">Ej: Sistemas</option>
                <?php while ($p = $programas->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($p['codigo']) ?>">
                        <?= htmlspecialchars($p['nombre']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Guardar</button>
            
            <a href="/monolitico/controllers/materia-controller.php?action=listar">Cancelar</a>
        </form>
    </div>
</body>
</html>
