<?php
namespace App\Models\SQModels;

class SqlProgramas{

    public static function selectAll(){
        $sql = "select * from programas";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into programas(codigo, nombre)values";
        $sql .= "(?,?)";
        return $sql; 
    }

    public static function update(){
        $sql = "update programas set ";
        $sql.= "nombre=? where codigo=?" ;
        return $sql;
    }

    public static function delete(){
        $sql = "delete from programas where codigo=?";
        return $sql;
    }
}