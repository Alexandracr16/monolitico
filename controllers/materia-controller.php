<?php
require_once 'models/materias.php';

class MateriaController {

    // lista de materias
    public function listar() {
        $modelo = new Materia();
        $resultado = $modelo->listar();
        include 'views/materias/listar.php';
    }

    // 🔹 nueva materia
    public function crear() {
        $modelo = new Materia();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $programa = $_POST['programa'];

            if (!empty($codigo) && !empty($nombre) && !empty($programa)) {
                $modelo->crear($codigo, $nombre, $programa);
            }
            header("Location: index.php?controller=materia&action=listar");
        } else {
            // Obtener lista de programas para el select
            $programas = $modelo->obtenerProgramas();
            include 'views/materias/crear.php';
        }
    }

    // Editar materia
    public function editar() {
        $modelo = new Materia();
        $codigo = $_GET['codigo'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $programa = $_POST['programa'];
            $modelo->editar($codigo, $nombre, $programa);
            header("Location: index.php?controller=materia&action=listar");
        } else {
            $materia = $modelo->buscar($codigo);
            $programas = $modelo->obtenerProgramas();
            include 'views/materias/editar.php';
        }
    }

    // Eliminar materia
    public function eliminar() {
        $codigo = $_GET['codigo'] ?? null;

        if ($codigo) {
            $modelo = new Materia();
            $modelo->eliminar($codigo);
        }

        header("Location: index.php?controller=materia&action=listar");
    }
}
