<?php
namespace App\Models;
require_once __DIR__ . '/databases/notas_app-db.php';

use App\Models\Databases\notasAppBD;

class Programa
{
    private $db;

    public function __construct()
    {
        $this->db = new notasAppBD();
    }

    public function listar()
    {
        $sql = "SELECT codigo, nombre FROM programas ORDER BY codigo ASC";
        return $this->db->execSQL($sql, true);
    }

    public function crear($codigo, $nombre)
    {
        $sql = "INSERT INTO programas (codigo, nombre) VALUES (?, ?)";
        return $this->db->execSQL($sql, false, "ss", $codigo, $nombre);
    }

    public function buscar($codigo)
    {
        $sql = "SELECT * FROM programas WHERE codigo = ?";
        $res = $this->db->execSQL($sql, true, "s", $codigo);
        return ($res && $res->num_rows > 0) ? $res->fetch_assoc() : null;
    }

    public function editar($codigo, $nombre)
    {
        $sql = "UPDATE programas SET nombre = ? WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "ss", $nombre, $codigo);
    }

    public function eliminar($codigo)
    {
        $sql = "DELETE FROM programas WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "s", $codigo);
    }

    public function havestudents($codigo){
        $sql = "SELECT COUNT(*) AS total FROM estudiantes WHERE programa = ?";
        $res = $this->db->execSQL($sql, true, "s", $codigo);

        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            return (int)$row['total'] > 0;
        }
        return false;
    } 

    public function hassubjects($codigo){
        
        $sql = "SELECT COUNT(*) AS total FROM materias WHERE programa = ?";
        $res = $this->db->execSQL($sql, true, "s", $codigo);

        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            return (int)$row['total'] > 0;
        }
        return false;
    }
}


