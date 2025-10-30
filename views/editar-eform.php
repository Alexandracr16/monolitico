<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar form</title>
    <link rel="stylesheet" href="../public/css/estudiante/creacionEstudiante.css">
</head>
<body>
    <?php
    require __DIR__ . "/../controllers/estudiante-controllers.php";

    use App\Controllers\EstudianteController;

    if (!empty($_GET['codigo'])) {
        $estudianteController = new EstudianteController();
        if ($estudianteController->hasNotas($_GET['codigo'])) {
            echo "<h1>No se puede editar el estudiante porque tiene notas registradas</h1>";
            echo "<br>";
            echo "<a href='estudiante.php' class='volver'> Volver a la lista de estudiantes</a>";
            exit;
        }
    }
    ?>
    <div class="contenedor">
        <h1>Editar Estudiante</h1>

        <form action="operaciones/editar-estudiante.php" method="post">
            <?php
            if (!empty($_GET['codigo'])) {
                echo '<input type="hidden" name="codigo" value="' . $_GET['codigo'] . '">';
            }
            ?>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="programa">Programa:</label>
                <select id="programa" name="programa" required>
                    <option value="">Seleccione un programa</option>
                    <?php
                    $programas = $estudianteController->getProgramas();
                    foreach ($programas as $programa) {
                        echo '<option value="' . $programa['codigo'] . '">' . $programa['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>

    <a href="estudiante.php" class="volver">← Volver a la lista de estudiantes</a>
</body>

</html>