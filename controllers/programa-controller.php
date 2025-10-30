<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/programas.php';

class ProgramaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Programa(); 
    }

    //Listar programas
    public function listar()
    {
        $result = $this->model->listar();
        include __DIR__ . '/../views/programas/listar.php';
    }

    //Crear nuevo programa
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = trim($_POST['codigo'] ?? '');
            $nombre = trim($_POST['nombre'] ?? '');

            if ($codigo === '' || $nombre === '') {
                die('Faltan datos');
            }

            $ok = $this->model->crear($codigo, $nombre);

            if ($ok) {
                header('Location: /monolitico/controllers/programa-controller.php?action=listar');
                exit;
            } else {
                die('Mire que el codigo ya existe');
            }
        } else {
            include __DIR__ . '/../views/programas/crear.php';
        }
    }

    // Editar programa 
    public function editar()
    {
        $codigo = $_GET['codigo'] ?? null;
        if (!$codigo) die('Código');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');

            if ($nombre === '') die('nombre');

            $ok = $this->model->editar($codigo, $nombre);

            if ($ok) {
                header('Location: /monolitico/controllers/programa-controller.php?action=listar');
                exit;
            } else {
                die('No guarda cambios');
            }
        } else {
            $programa = $this->model->buscar($codigo);
            include __DIR__ . '/../views/programas/editar.php';
        }
    }

    //Eliminar programa
    public function eliminar()
    {
        $codigo = $_GET['codigo'] ?? null;
        if ($codigo) {
            $this->model->eliminar($codigo);
        }
        header('Location: /monolitico/controllers/programa-controller.php?action=listar');
        exit;
    }
}

// lista
$action = $_GET['action'] ?? 'listar';
$controller = new ProgramaController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "..";
}
