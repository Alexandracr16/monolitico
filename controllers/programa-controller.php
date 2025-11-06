<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/programas.php';
use App\Models\Programa;

class ProgramaController
{
    
    private $model;

    public function __construct()
    {
        $this->model = new Programa(); 
    }

    public function queryAll()
    {
        return $this->model->listar();
    }
    // Listar programas
    public function listar()
    {
        $result = $this->model->listar();
        include __DIR__ . '/../views/programas/listar.php';
    }

    // Crear programa
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = trim($_POST['codigo'] ?? '');
            $nombre = trim($_POST['nombre'] ?? '');

            if ($codigo === '' || $nombre === '') {
                echo "<script>alert('Faltan datos'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>"; 
                exit;
            }

            $ok = $this->model->crear($codigo, $nombre);

            if ($ok) {
                echo "<script>alert('Programa creado correctamente'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
                exit;
            } else {
                echo "<script>alert('El código ya existe o ocurrió un error al crear.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            }
        } else {
            include __DIR__ . '/../views/programas/crear.php';
        }
    }

    // Editar programa 
    public function editar()
    {
        $codigo = $_GET['codigo'] ?? null;
        if (!$codigo) {
            echo "<script>alert('Falta el código del programa.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            exit;
        } 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');

            if ($nombre === '') {
                echo "<script>alert('Falta el nombre del programa.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
                exit;
            } 

            // Verificar dependencias
            if ($this->model->havestudents($codigo) || $this->model->hassubjects($codigo)) {
                echo "<script>alert('No se puede editar el programa porque tiene estudiantes o materias asociados.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
                exit; 
            }

            $ok = $this->model->editar($codigo, $nombre);

            if ($ok) {
                echo "<script>alert('Programa actualizado correctamente'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
                exit;
            } else {
                echo "<script>alert('No se pudo guardar los cambios.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
                exit;
            }
        } else {
            $programa = $this->model->buscar($codigo);
            include __DIR__ . '/../views/programas/editar.php';
        }
    }

    // Eliminar programa
    public function eliminar()
    {
        $codigo = $_GET['codigo'] ?? null;
        if (!$codigo) {
            echo "<script>alert('Falta código del programa'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            exit;
        }

        // Verificar dependencias
        if ($this->model->havestudents($codigo) || $this->model->hassubjects($codigo)) {
            echo "<script>alert('No se puede eliminar el programa porque tiene estudiantes o materias asociados.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            exit;
        }

        $ok = $this->model->eliminar($codigo);

        if ($ok) {
            echo "<script>alert('Programa eliminado correctamente'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            exit;
        } else {
            echo "<script>alert('Error al eliminar el programa.'); window.location='/monolitico/controllers/programa-controller.php?action=listar';</script>";
            exit;
        }
    }
}

// lista
$action = $_GET['action'] ?? 'listar';
$controller = new ProgramaController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "ERROR";
}
