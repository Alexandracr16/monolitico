<?php

header("Location: views/principal.php");

/* error_reporting(E_ALL);
ini_set('display_errors', 1);

$controller = $_GET['controller'] ?? 'programa';
$action = $_GET['action'] ?? 'listar';

$controllerFile = "controllers/" . $controller . "-controller.php";


// Verifica si el archivo existe
if (!file_exists($controllerFile)) {
    die("No se encontró el controlador: $controllerFile");
}

require_once $controllerFile;

$controllerClass = ucfirst($controller) . 'Controller';

// Verifica si la clase existe
if (!class_exists($controllerClass)) {
    die("No se encontró la clase del controlador: $controllerClass");
}

$controlador = new $controllerClass();

// Verifica si el método existe
if (!method_exists($controlador, $action)) {
    die("No se encontró la acción: $action en el controlador $controllerClass");
}

// Llama a la acción
$controlador->$action(); */

