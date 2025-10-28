<?php
require_once __DIR__ . '/../models/programas.php';

$action = $_GET['action'] ?? 'listar';
$model = new ProgramaModel();

switch ($action) {
    //programas
    case 'listar':
        $result = $model->listar();
        include __DIR__ . '/../views/programas/listar.php';
        break;

    // formulario para crear
    case 'crear':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $model->crear($codigo, $nombre);

            header("Location: programa-controller.php?action=listar");
            exit;
        } else {
            include __DIR__ . '/../views/programas/crear.php';
        }
        break;

    //formulario para editar
    case 'editar':
        $codigo = $_GET['codigo'] ?? null;
        if (!$codigo) {
            die("Código no especificado");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $model->editar($codigo, $nombre);

            header("Location: programa-controller.php?action=listar");
            exit;
        } else {
            $programa = $model->buscar($codigo);
            include __DIR__ . '/../views/programas/editar.php';
        }
        break;

    // Eliminar programa
    case 'eliminar':
        $codigo = $_GET['codigo'] ?? null;
        if ($codigo) {
            $model->eliminar($codigo);
        }

        
        header("Location: programa-controller.php?action=listar");
        exit;
        break;

    
    default:
        echo "Acción no válida.";
        break;
}
