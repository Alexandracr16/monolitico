<h2>Editar Programa</h2>

<form method="POST" action="index.php?controller=programa&action=editar&codigo=<?= $programa['codigo'] ?>">
    <label for="codigo">Código:</label><br>
    <input type="text" id="codigo" name="codigo" value="<?= $programa['codigo'] ?>" readonly><br><br>

    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="<?= $programa['nombre'] ?>" maxlength="30" required><br><br>

    <button type="submit">Actualizar</button>
    <a href="index.php?controller=programa&action=listar">Cancelar</a>
</form>
