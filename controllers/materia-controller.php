<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/materias.php';
require_once __DIR__ . '/../models/programas.php';

use App\Models\Programa;
use App\Models\Materia;

class MateriaController
{
    private $model;
    private $programas;

    public function __construct()
    {
        $this->model = new Materia();
        $this->programas = new Programa();
    }

    public function listar()
    {
        $result = $this->model->listar();
        include __DIR__ . '/../views/materias/listar.php';
    }

    public function crear()
    {
        // 📘 Obtener programas antes de mostrar el formulario
        $programas = $this->programas->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = trim($_POST['codigo'] ?? '');
            $nombre = trim($_POST['nombre'] ?? '');
            $programa = trim($_POST['programa'] ?? '');

            if ($codigo === '' || $nombre === '' || $programa === '') {
                echo "<script>
                        alert('❌ Debe completar todos los campos.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
                exit;
            }

            $ok = $this->model->crear($codigo, $nombre, $programa);

            if ($ok) {
                echo "<script>
                        alert('✅ Materia creada correctamente.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
                exit;
            } else {
                echo "<script>
                        alert('⚠️ Error: El código ya existe.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
            }
        } else {
            // 📘 Pasar $programas a la vista
            include __DIR__ . '/../views/materias/crear.php';
        }
    }

    public function editar()
    {
        $codigo = $_GET['codigo'] ?? null;

        if (!$codigo) {
            echo "<script>
                    alert('❌ Falta el código de la materia.');
                    window.location='materia-controller.php?action=listar';
                  </script>";
            exit;
        }

        // 📘 Obtener programas antes del formulario
        $programas = $this->programas->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $programa = trim($_POST['programa'] ?? '');

            if ($nombre === '' || $programa === '') {
                echo "<script>
                        alert('❌ Faltan datos para actualizar la materia.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
                exit;
            }

            // Verifica dependencias antes de actualizar
            if ($this->model->hasNotas($codigo) || $this->model->hasstudents($codigo)) {
                echo "<script>
                        alert('⚠️ No se puede editar la materia porque tiene estudiantes o notas asociadas.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
                exit;
            }

            $ok = $this->model->editar($codigo, $nombre, $programa);

            // ✅ Corrección: si fue bien, muestra éxito
            if ($ok) {
                echo "<script>
                        alert('✅ Materia actualizada correctamente.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
            } else {
                echo "<script>
                        alert('⚠️ No se pudo guardar los cambios.');
                        window.location='materia-controller.php?action=listar';
                      </script>";
            }
            exit;
        } else {
            $materia = $this->model->buscar($codigo);
            // 📘 Pasar $materia y $programas a la vista
            include __DIR__ . '/../views/materias/editar.php';
        }
    }

    public function eliminar()
    {
        $codigo = $_GET['codigo'] ?? null;

        if (!$codigo) {
            echo "<script>
                    alert('❌ Falta el código de la materia.');
                    window.location='materia-controller.php?action=listar';
                  </script>";
            exit;
        }

        if ($this->model->hasNotas($codigo) || $this->model->hasstudents($codigo)) {
            echo "<script>
                    alert('⚠️ No se puede eliminar la materia porque tiene estudiantes o notas asociadas.');
                    window.location='materia-controller.php?action=listar';
                  </script>";
            exit;
        }

        $ok = $this->model->eliminar($codigo);

        if ($ok) {
            echo "<script>
                    alert('✅ Materia eliminada correctamente.');
                    window.location='materia-controller.php?action=listar';
                  </script>";
        } else {
            echo "<script>
                    alert('⚠️ Error al eliminar la materia.');
                    window.location='materia-controller.php?action=listar';
                  </script>";
        }
        exit;
    }
}

// ---- Ejecutar acción ----
$action = $_GET['action'] ?? 'listar';
$controller = new MateriaController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Acción no válida";
}

