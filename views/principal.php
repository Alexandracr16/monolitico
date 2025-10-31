<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../public/css/principal.css">

</head>
<body>
<div class="contenedor">
    <h1>Universidad Y. J. and D.</h1>
    <p>Sistema de gestión académica</p>
    <div class="contenedor-enlaces">
        <a href="estudiante.php" class="enlace-navegacion"><span>Estudiante</span></a>
        <a href="nota.php" class="enlace-navegacion"><span>Notas</span></a>
        <a href="/monolitico/controllers/materia-controller.php?action=listar" class="enlace-navegacion">Materias</a>
        <a href="/monolitico/controllers/programa-controller.php?action=listar" class="enlace-navegacion"><span>Programas</span></a>
    </div>
    <br>
    <br>
    <hr>
    <hr>

    <h2>Consultas</h2>
    <div class="contenedor-enlaces">
        <a href="consultas/programas.php" class="enlace-navegacion"><span>Programas y Materias</span></a>
        <a href="consultas/estudiante_programa.php" class="enlace-navegacion"><span>Estudiantes por Programa</span></a>
        <a href="consultas/materia_estudiante.php" class="enlace-navegacion"><span>Estudiantes por Materia (promedio)</span></a>
        <a href="consultas/promedio_estudiante_materia.php" class="enlace-navegacion"><span>Materias por Estudiante (promedio)</span></a>
        <a href="consultas/notas_estudiante_materia.php" class="enlace-navegacion"><span>Notas por Estudiante y Materia</span></a>
        <a href="consultas/materia_programa.php" class="enlace-navegacion"><span>Materia por programa</span></a>
    </div>
</div>
</body>
</html>
