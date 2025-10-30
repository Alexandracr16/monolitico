<?php

namespace App\Models\SQLModels;

class SqlEstudiantes
{
    public static function selectAll()
    {
        $sql = "select * from estudiantes";
        return $sql;
    }

    public static function insertInto()
    {
        $sql = "insert into estudiantes(codigo, nombre, email, programa)values";
        $sql .= "(?,?,?,?)";
        return $sql;
    }

    public static function update()
    {
        $sql = "update estudiantes set ";
        $sql .= "nombre=?,";
        $sql .= "email=?,";
        $sql .= "programa=? where codigo=?";
        return $sql;
    }

    public static function delete()
    {
        $sql = "delete from estudiantes where codigo=?";
        return $sql;
    }

    public static function hasNotas()
    {
        //$sql = " SELECT COUNT(*) AS total FROM notas WHERE estudiiant = ?";
        $sql = " select COUNT(*) AS total from notas where estudiante = ?";
        return $sql;
    }
}
