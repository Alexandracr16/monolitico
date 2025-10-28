<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programa</title>
</head>
<body>
    <h2>Nuevo Programa</h2>
    
    <form action="/monolitico/controllers/programa-controller.php?action=crear" method="POST">
        <label for="codigo">Código:</label><br>
        <input type="text" name="codigo" maxlength="4" required><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" maxlength="50" required><br><br>

        <button type="submit">Guardar</button>
        <br>
        <a href="/monolitico/controllers/programa-controller.php?action=listar">Cancelar</a>
    </form>
</body>
</html>

