<h2>Nueva Materia</h2>

<form action="index.php?controller=materia&action=crear" method="POST">
    <label>Código:</label><br>
    <input type="text" name="codigo" required><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Programa:</label><br>
    <select name="programa" required>
        <option value="">Ej: Sistemas</option>
        <?php while ($row = $programas->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= htmlspecialchars($row['codigo']) ?>">
                <?= htmlspecialchars($row['nombre']) ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <button type="submit">Guardar</button>
    <a href="index.php?controller=materia&action=listar">Cancelar</a>
</form>
