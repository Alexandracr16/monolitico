<?php
require_once __DIR__ . '/databases/notas_app-db.php';

use App\Models\Databases\notasAppBD;

class Materia
{
    private $db;

    public function __construct()
    {
        $this->db = new notasAppBD();
    }

    public function listar()
    {
        $sql = "SELECT m.codigo, m.nombre, p.nombre AS programa
                FROM materias m
                INNER JOIN programas p ON m.programa = p.codigo
                ORDER BY m.codigo ASC";
        return $this->db->execSQL($sql, true);
    }

    public function crear($codigo, $nombre, $programa)
    {
        $sql = "INSERT INTO materias (codigo, nombre, programa) VALUES (?, ?, ?)";
        return $this->db->execSQL($sql, false, "sss", $codigo, $nombre, $programa);
    }

    public function buscar($codigo)
    {
        $sql = "SELECT * FROM materias WHERE codigo = ?";
        $res = $this->db->execSQL($sql, true, "s", $codigo);
        return ($res && $res->num_rows > 0) ? $res->fetch_assoc() : null;
    }

    public function editar($codigo, $nombre, $programa)
    {
        $sql = "UPDATE materias SET nombre = ?, programa = ? WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "sss", $nombre, $programa, $codigo);
    }

    public function eliminar($codigo)
    {
        $sql = "DELETE FROM materias WHERE codigo = ?";
        return $this->db->execSQL($sql, false, "s", $codigo);
    }
}
