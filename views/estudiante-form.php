<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante form</title>
    <link rel="stylesheet" href="../public/css/estudiante/creacionEstudiante.css">
</head>

<body>
    <div class="contenedor">
        <h1>Guardar Estudiante</h1>
        <form action="operaciones/agregar-estudiante.php" method="post">
            <?php
            if (!empty($_GET['codigo'])) {
                echo '<input type="hidden" name="codigo" value="' . $_GET['codigo'] . '">';
            }
            ?>
            <div class="grupo-formulario">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>

            <div class="grupo-formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="grupo-formulario">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="grupo-formulario">
                <label for="programa">Programa:</label>
                <input type="text" id="programa" name="programa" required>
            </div>

            <button type="submit">Guardar</button>
        </form>
    </div>
    <a href="estudiante.php" class="volver">Volver a la lista de estudiantes</a>
</body>

</html>