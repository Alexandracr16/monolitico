<?php
namespace App\Models\SQLModels;

class SqlNotas{
    public static function selectAll(){
        $sql = "select * from notas";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into notas(estudiante, materia, actividad, nota)values";
        $sql .= "(?,?,?,?)";
        return $sql; 
    }

    public static function update(){
        $sql = "update notas set ";
        $sql.= "nota=?" ;
        $sql.= "WHERE materia=? AND estudiante =? AND actividad =?";
        return $sql;
    }

    public static function delete(){
        $sql = "delete from notas WHERE materia=? AND estudiante=? AND actividad=?";
        return $sql;
    }

    public static function selectByEstudiante(){
        $sql = "select * from notas where estudiantes=?";
        return $sql;
    }

    public static function promedio(){
        return "select ifnull(ROUND(AVG(nota),2),0) as promedio from notas where estudiantes=? AND materia=? ";
    }
}