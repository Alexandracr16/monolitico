<?php
namespace App\Models;

require __DIR__."/sql_models/model.php";
require __DIR__."/sql_models/sql_notas.php";
require __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlNotas;
use App\Models\Databases\notasAppBD ;


class Notas extends Model
{
    private $materia=0;
    private $estudiante=null;
    private $actividad = null;
    private $nota = null;

    public function get($prop){
        return $this->{$prop};
    }

    public function set($prop, $value){
        $this->{$prop}=$value;
    }

    public function all(){
        $sql=SqlNotas::selectAll();
        $db= new notasAppBD();
        $result= $db->execSQL($sql, true);
        $notas= [];
        if ($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $nota= new Notas();
                $nota-> set('materia', $row["materia"]);
                $nota->set('estudiante', $row["estudiante"]);
                $nota->set('actividad', $row["actividad"]);
                $nota->set('nota', $row["nota"]);
                array_push($notas, $nota);

            }
        }
        $db->close();
        return $notas;

    }
    public function delete(){
        $sql = SqlNotas::delete();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "s",
            $this->nota
        );
        $db->close();
        return $result;
    }

    public function find(){}
    public function insert(){
        $sql = SqlNotas::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "sssi",
            $this->materia,
            $this->estudiante,
            $this->actividad,
            $this->nota

        );
        $db->close();
        return $result;
    }
    public function update(){
        $sql = SqlNotas::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "s",
            $this->nota
            
        );
        $db->close();
        return $result;
    }
}