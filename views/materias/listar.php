<h2>Materias</h2>

<a href="index.php?controller=materia&action=crear">Nueva Materia</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Programa</th>
        <th>Hacer</th>
    </tr>

    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['codigo']) ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['nombre_programa']) ?></td>
            <td>
                <a href="index.php?controller=materia&action=editar&codigo=<?= urlencode($row['codigo']) ?>">Editar</a>
                <br> |
                <a href="index.php?controller=materia&action=eliminar&codigo=<?= urlencode($row['codigo']) ?>"
                   onclick="return confirm('¿Deseas eliminar esta materia?')">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
