<?php
require __DIR__ . "/controllers/notas-controllers.php";

use App\Controllers\Notas_controllers;

$controller = new Notas_controllers();

// Detectar acción desde la URL o el formulario
$action = $_GET['action'] ?? $_POST['action'] ?? null;

// Manejar las acciones
switch ($action) {
    case 'guardar':
        $controller->saveNewNotas($_POST);
        header("Location: views/nota.php");
        exit;

    case 'eliminar':
        $controller->deleteNotas($_GET);
        header("Location: views/nota.php");
        exit;

    case 'editar':
        // Aquí podrías redirigir a una vista con un formulario para editar
        // o procesar el cambio directamente
        $controller->updateNotas($_POST);
        header("Location: views/nota.php");
        exit;

    default:
        // Si no hay acción, redirige al menú principal
        header("Location: views/principal.php");
        exit;
}