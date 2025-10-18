<?php
namespace App\Models\SQLModels;

class SqlNotas{
    public static function selectAll(){
        $sql = "select * from notas";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into notas(estudiantes, materia, actividad, notas)values";
        $sql .= "(?,?,?,?)";
        return $sql; 
    }

    public static function update(){
        $sql = "update notas set ";
        $sql.= "actividad=?";
        $sql.= "nota=?" ;
        $sql.= "where estudiante=? and materia =?";
        return $sql;
    }

    public static function delete(){
        $sql = "delete from notas where estudiante=? and materia=?";
        return $sql;
    }
}