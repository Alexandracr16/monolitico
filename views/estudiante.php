<?php
require __DIR__."/../controllers/estudiante-controllers.php";

use App\Controllers\EstudianteController;

$estudianteController = new EstudianteController();
$estudiante = $estudianteController->queryAllEstudiante();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso estudiante</title>
</head>
<body>
    <h1>Lista de estudiantes</h1>
    <br>
    <a href="estudiante-form.php">Crear Estuadiante</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Programa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudiante as $est) {
                echo "<tr>";
                echo "<td>".$est->get('codigo')."</td>";
                echo "<td>".$est->get('nombre')."</td>";
                echo "<td>".$est->get('email')."</td>";
                echo "<td>".$est->get('programa')."</td>";
                echo "<td>";
                echo '     <button onclick = "onClickBorrar(' .$est->get('codigo'). ')">';
                echo "     </button>";
                echo "</td>";
                echo "<td>";
                echo '     <a href = "estudiante-form.php?codigo=' .$est->get('codigo'). '">';
                echo "     </a>";
                echo "</td>";
                echo "</tr>";
            }
            if (count($estudiante) == 0){
                echo "<tr>";
                echo "<td colspan='4'>No hay estudiantes registrados</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
         

<!--         <div id="borrarEstudianteModal" class="modal">
            <h3>Eliminar registro</h3>
            <p>El registro se eliminara permanente</p>
            <form name="borrarEstudiante" action="operaciones/borrar-estudiante.php" method="post">
                <input type="hidden" name="codigo" value="0">
                <div>
                    <button type="submit">Continuar</button>
                    <button type="reset">Cancelar</button>
                </div>  
            </form>
        </div> -->

        <script src="../public/js/estudiante.js"></script>
    </table>

       <br>
        <a href="principal.php">Volver al menu</a>
</body>
</html>