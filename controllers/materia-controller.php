<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/materias.php';
require_once __DIR__ . '/../models/programas.php';

use App\Models\Materia;
class MateriaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Materia();
    }

    public function listar()
    {
        $result = $this->model->listar();
        include __DIR__ . '/../views/materias/listar.php';
    }

    public function crear()
    {
        $programaModel = new Programa();
        $programas = $programaModel->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = trim($_POST['codigo'] ?? '');
            $nombre = trim($_POST['nombre'] ?? '');
            $programa = trim($_POST['programa'] ?? '');

            if ($codigo === '' || $nombre === '' || $programa === '') {
                die('Completar los datos');
            }

            $ok = $this->model->crear($codigo, $nombre, $programa);

            if ($ok) {
                header('Location: /monolitico/controllers/materia-controller.php?action=listar');
                exit;
            } else {
                die('El codigo ya existe');
            }
        } else {
            include __DIR__ . '/../views/materias/crear.php';
        }
    }

    public function editar()
    {
        $programaModel = new Programa();
        $programas = $programaModel->listar();

        $codigo = $_GET['codigo'] ?? null;
        if (!$codigo) die('El codigo no existe');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $programa = trim($_POST['programa'] ?? '');

            if ($nombre === '' || $programa === '') die('Complatar los datos');

            $ok = $this->model->editar($codigo, $nombre, $programa);

            if ($ok) {
                header('Location: /monolitico/controllers/materia-controller.php?action=listar');
                exit;
            } else {
                die('Editar la materia3');
            }
        } else {
            $materia = $this->model->buscar($codigo);
            include __DIR__ . '/../views/materias/editar.php';
        }
    }

    public function eliminar()
    {
        $codigo = $_GET['codigo'] ?? null;
        if ($codigo) $this->model->eliminar($codigo);
        header('Location: /monolitico/controllers/materia-controller.php?action=listar');
        exit;
    }
}

$action = $_GET['action'] ?? 'listar';
$controller = new MateriaController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "LLenar los campos";
}
