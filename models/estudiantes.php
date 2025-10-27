<?php
namespace App\Models;

require __DIR__."/sql_models/sql_estudiantes.php";
require __DIR__."/sql_models/model.php";
require __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlEstudiantes;
use App\Models\Databases\notasAppBD ;
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
        $sql = SqlEstudiantes::selectAll();
        $db = new notasAppBD();
        $result = $db->execSQL($sql, true);
        $estudiantes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiante = new Estudiante();
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
        $sql = SqlEstudiantes::delete();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "s",
            $this->codigo
        );
        $db->close();
        return $result;
    }

    public function find(){
    }
    public function insert(){
        $sql = SqlEstudiantes::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
           $sql,
            false,
            "is",
            $this->codigo,
            $this->nombre,
            $this->email,
            $this->programa
        );
        $db->close();
        return $result;
    }
    
    public function update(){
        $sql = SqlEstudiantes::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
           $sql,
            false,
            "ssi",
            $this->nombre,
            $this->email,
            $this->programa
        );
        $db->close();
        return $result;
    }




}

