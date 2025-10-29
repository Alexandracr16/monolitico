<?php
require __DIR__ . "/../controllers/estudiante-controllers.php";

use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController();
$estudiante = $estudianteController->queryAllEstudiante();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso estudiante</title>
    <link rel="stylesheet" href="../public/css//estudiante/estudiante.css">
    <link rel="stylesheet" href="../public/css/estudiante/modals.css">
</head>

<body>
    <h1>Lista de estudiantes</h1>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudiante as $est) {
                echo "<tr>";
                echo "<td>" . $est->get('codigo') . "</td>";
                echo "<td>" . $est->get('nombre') . "</td>";
                echo "<td>" . $est->get('email') . "</td>";
                echo "<td>" . $est->get('programa') . "</td>";
                echo "<td>";
                echo '     <button class="btn-accion" onclick="onClickBorrar(' . $est->get('codigo') . ')">';
                echo '      <img src="../public/res/borrar.svg" alt="Borrar">';
                echo "     </button>";
                echo '     <a class="btn-accion" href="editar-eform.php?codigo=' . $est->get('codigo') . '">';
                echo '      <img src="../public/res/editar.svg" alt="Editar">';
                echo "     </a>";
                echo "</td>";
                echo "</tr>";
            }
            if (count($estudiante) == 0) {
                echo "<tr>";
                echo "<td colspan='5' class='sin-registros'>No hay estudiantes registrados</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div id="borrarEstudianteModal" class="modal">
        <h3>Eliminar registro</h3>
        <p>El registro se eliminara permanente</p>
        <form name="borrarEstudiante" action="operaciones/borrar-estudiante.php" method="post">
            <input type="hidden" name="codigo" value="0">
            <div>
                <button type="submit">Continuar</button>
                <button type="reset">Cancelar</button>
            </div>
        </form>
    </div>

    <script src="../public/js/estudiante.js"></script>
    <br>
    <div class="acciones">
        <a href="principal.php" class="volver">Volver al menú</a>
        <a href="estudiante-form.php" class="crear-enlace">Crear Estudiante</a>
    </div>



</body>

</html>