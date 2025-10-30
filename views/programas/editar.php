<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programa</title>
    <link rel="stylesheet" href="../public/css/programa/r.css">
</head>
<body>
    <h2>Editar Programa</h2>

    <?php if (empty($programa)): ?>
        <div class="mensaje-error">
            <p>No se encontró el programa.</p>
        </div>
    <?php else: ?>
        <form action="/monolitico/controllers/programa-controller.php?action=editar&codigo=<?= urlencode($programa['codigo']) ?>" method="POST">
            <label>Código:</label>
            <input type="text" value="<?= htmlspecialchars($programa['codigo']) ?>" disabled>

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($programa['nombre']) ?>" maxlength="50" required>

            <button type="submit">Actualizar</button>
<<<<<<< HEAD
            <br>
            <br>
            <a href="/monolitico/controllers/programa-controller.php?action=listar">Cancelar</a>
=======
>>>>>>> f2687d0d310176fc117e453bbf1dd3172333884d
        </form>
        
        <a href="/monolitico/controllers/programa-controller.php?action=listar" class="cancelar">Cancelar</a>
    <?php endif; ?>
</body>
</html>
