<?php
namespace App\Models\SQModels;

class SqlMaterias{

    public static function selectAll(){
        $sql = "select * from materias";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into materias(codigo, nombre, programa)values";
        $sql .= "(?,?,?)";
        return $sql; 
    }

    public static function update(){
        $sql = "update materias set ";
        $sql.= "nombre=?";   
        $sql.= "programa=? where codigo=?" ;
        return $sql;
    }

    public static function delete(){
        $sql = "delete from materias where codigo=?";
        return $sql;
    }
}