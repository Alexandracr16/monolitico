<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programa</title>
    <link rel="stylesheet" href="../public/css/programa/r.css">
</head>
<body>
    <h2>Nuevo Programa</h2>
    
    <form action="/monolitico/controllers/programa-controller.php?action=crear" method="POST">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" maxlength="4" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="50" required>

        <button type="submit">Guardar</button>
    </form>
    
    <a href="/monolitico/controllers/programa-controller.php?action=listar" class="cancelar">Cancelar</a>

</body>
</html>

