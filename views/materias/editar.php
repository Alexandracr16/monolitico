<h2>Editar Materia</h2>

<form action="index.php?controller=materia&action=editar&codigo=<?= urlencode($materia['codigo']) ?>" method="POST">
    <label>Código:</label><br>
    <input type="text" value="<?= htmlspecialchars($materia['codigo']) ?>" disabled><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= htmlspecialchars($materia['nombre']) ?>" required><br><br>

    <label>Programa:</label><br>
    <select name="programa" required>
        <?php while ($row = $programas->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= htmlspecialchars($row['codigo']) ?>"
                <?= ($row['codigo'] == $materia['programa']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nombre']) ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <button type="submit">Actualizar</button>
    <a href="index.php?controller=materia&action=listar">Cancelar</a>
</form>
