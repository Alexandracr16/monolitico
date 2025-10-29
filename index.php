<?php
// DEBUG temporal
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

require_once __DIR__ . "/controllers/notas-controllers.php";
use App\Controllers\Notas_controllers;

// Muestra $_GET y $_POST para depuración
//echo "<pre>GET: "; print_r($_GET);
//echo "\nPOST: "; print_r($_POST);
//echo "\nSERVER REQUEST_METHOD: " . ($_SERVER['REQUEST_METHOD'] ?? '') . "\n</pre>";

// Prueba simple de ruta: si llega action=test devolvemos ok
/*if (isset($_GET['action']) && $_GET['action'] === 'test') {
    echo "ROUTER OK";
    exit;
}*/

$controller = new Notas_controllers();

$action = $_GET['action'] ?? $_POST['action'] ?? null;

switch ($action) {
    case 'guardar':
        // mostrar lo que se va a enviar al controlador
        /*echo "<p>Acción=guardar — Llamando a saveNewNotas</p>";
        var_export($_POST);
        $res = $controller->saveNewNotas($_POST);
        var_export($res);*/
        header("Location: views/nota.php");
        exit;

    case 'eliminar':
        /*echo "<p>Acción=eliminar — Llamando a deleteNotas</p>";
        var_export($_GET);
        $res = $controller->deleteNotas($_GET);
        var_export($res);*/
        header("Location: views/nota.php");
        exit;

    case 'editar':
        echo "<p>Acción=editar — Llamando a updateNotas</p>";
        var_export($_GET);
        // Si viene por GET, muestra formulario de edición
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include __DIR__ . "/views/editar_nota.php";
            exit;
        }

        // Si viene por POST, guarda los cambios
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $controller->updateNotas($_POST);
            header("Location: views/nota.php");
            exit;
        }
    break;
    case 'actualizar':
        echo "<p>Acción=actualizar — Llamando a updateNotas</p>";
        var_export($_POST);
        $res = $controller->updateNotas($_POST);
        var_export($res);
        header("Location: views/nota.php");
        exit;

    default:
        // si no hay action mostramos la vista principal (no redirección automática)
        require __DIR__ . "/views/principal.php";
        exit;
}