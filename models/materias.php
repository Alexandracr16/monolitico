<?php
require_once __DIR__ . '/databases/notas_app-db.php';

class Materia {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // Listar todas las materias con el nombre del programa que tienen
    public function listar() {
        $sql = "SELECT m.codigo, m.nombre, m.programa, p.nombre AS nombre_programa
                FROM materias m
                INNER JOIN programas p ON m.programa = p.codigo
                ORDER BY m.codigo ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Crea nueva materia
    public function crear($codigo, $nombre, $programa) {
        $sql = "INSERT INTO materias (codigo, nombre, programa)
                VALUES (:codigo, :nombre, :programa)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':programa', $programa);
        return $stmt->execute();
    }

    // Buscar materia por código
    public function buscar($codigo) {
        $sql = "SELECT * FROM materias WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Editar materia, se bloquea el codigo
    public function editar($codigo, $nombre, $programa) {
        $sql = "UPDATE materias
                SET nombre = :nombre, programa = :programa
                WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':programa', $programa);
        $stmt->bindParam(':codigo', $codigo);
        return $stmt->execute();
    }

    // Eliminar materia
    public function eliminar($codigo) {
        $sql = "DELETE FROM materias WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        return $stmt->execute();
    }

    // Obtener todos los programas (para el select en los formularios)
    public function obtenerProgramas() {
        $sql = "SELECT codigo, nombre FROM programas ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
