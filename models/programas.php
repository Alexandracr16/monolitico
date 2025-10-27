<?php
require_once __DIR__ . '/databases/notas_app-db.php';


class Programa {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM programas";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function crear($codigo, $nombre) {
        $sql = "INSERT INTO programas (codigo, nombre) VALUES (:codigo, :nombre)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    public function buscar($codigo) {
        $sql = "SELECT * FROM programas WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($codigo, $nombre) {
        $sql = "UPDATE programas SET nombre = :nombre WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    public function eliminar($codigo) {
        $sql = "DELETE FROM programas WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        return $stmt->execute();
    }
}
