<?php
namespace App\Models;

class Estudiante extends Model{

    private $codigo = 0;
    private $nombre = null;
    private $email = null;
    private $programa = null;

    public function get ($prop){
        return $this->{$prop};
    }

    public function set ($prop, $value){
         $this->{$prop} = $value; 
    }

    public function all()
    {
        $sql = SqlEstudiante::selectAll();
        $db = new notasAppBD();
        $result = $db->execSQL($sql, true);
        $estudiantes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiante = new Usuario();
                $estudiante->set('codigo', $row["codigo"]);
                $estudiante->set('nombre', $row["nombre"]);
                $estudiante->set('email', $row["email"]);
                $estudiante->set('programa', $row["programa"]);
                array_push($estudiantes, $estudiante);
            }
        }
        $db->close();
        return $estudiantes;
    }

   public function delete()
    {
        $sql = SqlEstudiante::delete();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "s",
            $this->id
        );
        $db->close();
        return $result;
    }

    public function find()
    {
        $sql = SqlEstudiante::selectByUserPwd();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            true,// dejar como true
            "i",
            $this->codigo
        );
        $user = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new Estudiante();
                $user->set('codigo', $row['codigo']);
                $user->set('nombre', $row['nombre']);
                $user->set('email', $row['email']);
                $user->set('programa', $row['programa']);
                break;
            }
        }
        $db->close();
        return $user;
    }
    public function insert(){
        $sql = SqlEstudiante::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
           $sql,
            false,
            "is",
            $this->codigo,
            $this->nombre
        );
        $db->close();
        return $result;
    }
    
    public function update(){
        $sql = SqlUsuario::update();
        $db = new GrupoAvanzadaDB();
        $result = $db->execSQL(
           $sql,
            false,
            "ssi",
            $this->username,
            $this->password,
            $this->id
        );
        $db->close();
        return $result;
    }




}

