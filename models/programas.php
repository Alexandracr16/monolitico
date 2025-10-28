<?php
// models/programas.php

require_once __DIR__ . '/databases/notas_app-db.php';


use App\Models\Databases\notasAppBD;


class ProgramaModel {
    private $db;

    public function __construct() {
        // Instancia la conexión
        $this->db = new notasAppBD();
    }

    //todos los programas
    public function listar() {
        $sql = "SELECT codigo, nombre FROM programas ORDER BY codigo ASC";
        return $this->db->execSQL($sql, true);
    }

    //Crear nuevo programa
    public function crear($codigo, $nombre) {
        $sql = "INSERT INTO programas (codigo, nombre) VALUES (?, ?)";
        return $this->db->execSQL($sql, false, "ss", $codigo, $nombre);
    }

    
    public function buscar($codigo) {
        $sql = "SELECT codigo, nombre FROM programas WHERE codigo = ?";
        $res = $this->db->execSQL($sql, true, "s", $codigo);
        if ($res && $row = $res->fetch_assoc()) {
            return $row;
        }
        return null;
    }

    // Editar 
    public function editar($codigo, $nombre) {
        $sql = "UPDATE programas SET nombre = ? WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "ss", $nombre, $codigo);
    }

    // Eliminar
    public function eliminar($codigo) {
        $sql = "DELETE FROM programas WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "s", $codigo);
    }
}

