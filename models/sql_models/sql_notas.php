<?php
namespace App\Models\SQLModels;

class SqlNotas{
    public static function selectAll(){
        $sql = "select * from notas";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into notas(materia, estudiante, actividad, nota)values";
        $sql .= "(?,?,?,?)";
        return $sql; 
    }

    public static function update(){
        $sql = "UPDATE notas SET ";
        $sql .= "nota = ? " ;
        $sql .= "WHERE materia = ? AND estudiante = ? AND actividad = ?";
        return $sql;
    }

    public static function delete(){
        $sql = "delete from notas WHERE materia=? AND estudiante=? AND actividad=?";
        return $sql;
    }

    public static function selectByEstudiante(){
        $sql = "select * from notas where estudiante=?";
        return $sql;
    }

     public static function selectOne() {
        return "SELECT * FROM notas WHERE materia =? AND estudiante =? AND actividad =?";
    }

    public static function promedio(){
        return "select ifnull(ROUND(AVG(nota),2),0) as promedio from notas where estudiante=? AND materia=? ";
    }
}