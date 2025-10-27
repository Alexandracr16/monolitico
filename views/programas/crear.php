<h2>Registrar Programa</h2>

<form method="POST" action="index.php?controller=programa&action=crear">
    <label for="codigo">Código:</label><br>
    <input type="text" id="codigo" name="codigo" maxlength="4" required><br><br>

    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" maxlength="30" required><br><br>

    <button type="submit">Guardar</button>
    <a href="index.php?controller=programa&action=listar">Cancelar</a>
</form>
