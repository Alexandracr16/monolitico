<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante form</title>
</head>
<body>
    <h1>Guardar Estudiante</h1>
    <br>
    <form action="operaciones/agregar-estudiante.php" method="post">
        <?php
        if(!empty($_GET['codigo'])){
            echo '<input type="hidden" name="codigo" value="'.$_GET['codigo'].'">';
        }
        ?>
        <div>
            <label for="codigo">Codigo:</label>
            <input type="text" id="codigo" name="codigo" required>
        </div>

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="programa">Programa:</label>
            <input type="text" id="programa" name="programa" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
    <a href="estudiante.php">Volver a la lista de estudiantes</a>
</body>
</html>