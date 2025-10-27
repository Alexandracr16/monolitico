<?php
require_once 'models/programas.php';

class ProgramaController {

    public function listar() {
        $modelo = new Programa();
        $resultado = $modelo->listar();
        include 'views/programas/listar.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];

            $modelo = new Programa();
            $modelo->crear($codigo, $nombre);
            header("Location: index.php?controller=programa&action=listar");
        } else {
            include 'views/programas/crear.php';
        }
    }

    public function editar() {
        $modelo = new Programa();
        $codigo = $_GET['codigo'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $modelo->editar($codigo, $nombre);
            header("Location: index.php?controller=programa&action=listar");
        } else {
            $programa = $modelo->buscar($codigo);
            include 'views/programas/editar.php';
        }
    }

    public function eliminar() {
        $modelo = new Programa();
        $codigo = $_GET['codigo'] ?? null;
        if ($codigo) {
            $modelo->eliminar($codigo);
        }
        header("Location: index.php?controller=programa&action=listar");
    }
}

