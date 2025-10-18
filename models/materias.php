<?php
namespace App\Models;

require __DIR__."/sql_models/model.php";
require __DIR__."/sql_models/sql_materias.php";
require __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlMaterias;
use App\Models\Databases\notasAppBD ;


class Materias extends Model
{
    private $codigo=0;
    private $nombre=null;
    private $programa = null;

    public function get($prop){
        return $this->{$prop};
    }

    public function set($prop, $value){
        $this->{$prop}=$value;
    }

    public function all(){
        $sql=SqlMaterias::selectAll();
        $db= new notasAppBD();
        $result= $db->execSQL($sql, true);
        $materias= [];
        if ($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $materia= new Materias();
                $materia-> set('codigo', $row["codigo"]);
                $materia->set('nombre', $row["nombre"]);
                $materia->set('programa', $row["programa"]);
                array_push($materias, $materia);

            }
        }
        $db->close();
        return $materias;

    }
    public function delete(){
        $sql = SqlMaterias::delete();
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

    public function find(){}
    public function insert(){
        $sql = SqlMaterias::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "sss",
            $this->codigo,
            $this->nombre,
            $this->programa

        );
        $db->close();
        return $result;
    }
    public function update(){
        $sql = SqlMaterias::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "sss",
            $this->codigo,
            $this->nombre,
            $this->programa
        );
        $db->close();
        return $result;
    }
}