<h2>Programas</h2>

<a href="index.php?controller=programa&action=crear">Nuevo Programa</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['codigo'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td>
                <a href="index.php?controller=programa&action=editar&codigo=<?= $row['codigo'] ?>">Editar</a> 
                <br>|
                <a href="index.php?controller=programa&action=eliminar&codigo=<?= $row['codigo'] ?>"
                   onclick="return confirm('¿Deseas eliminar este programa?')">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
