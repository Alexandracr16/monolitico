<?php
namespace App\Models;

require_once __DIR__."/sql_models/model.php";
require_once __DIR__."/sql_models/sql_notas.php";
require_once __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlNotas;
use App\Models\Databases\notasAppBD ;


class Notas extends Model
{
    private $materia=null;
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
        if ($result&& $result-> num_rows>0){
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
            "sss",
            $this->materia,
            $this->estudiante,
            $this->actividad
        );

        $db->close();
        return $result;
    }

    public function find(){}

    public function findByEstudiante($codigo)
    {
        $sql = SqlNotas::selectByEstudiante();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            true,
            "s",
            $codigo
        );
        $notas= [];
        if ($result&& $result-> num_rows>0){
            while($row = $result->fetch_assoc()){
                $nota= new Notas();
                $nota-> set('materia', $row["materia"]);
                $nota->set('actividad', $row["actividad"]);
                $nota->set('nota', $row["nota"]);
                array_push($notas, $nota);

            }
        }
        $db->close();
        return $notas;
    }
    public function insert()
    {   if ($this->nota <=0||$this->nota >5){
            return ["Error: La nota debe estar entre 0 y 5"];
        }

        if (round($this->nota,2) != $this->nota){
            return ["Error: La nota debe tener máximo dos decimales"];
        }

        $sql = SqlNotas::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "sssd",
            $this->materia,
            $this->estudiante,
            $this->actividad,
            $this->nota

        );
        $db->close();
        return $result;
    }
    public function update()
    {
        if ($this->nota <=0||$this->nota >5){
            return ["Error: La nota debe estar entre 0 y 5"];
        }
        $sql = SqlNotas::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "dsss",
            $this->nota,
            $this->materia,
            $this->estudiante,
            $this->actividad
            
        );
        $db->close();
        return $result;
    }

    public function promedio($estudiante, $materia)
    {
        $sql = SqlNotas::promedio();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            true,
            "ss",
            $estudiante,
            $materia
        );
        $promedio = 0;
        if ($result && $row = $result->fetch_assoc()) {
            $prom = $row["promedio"];
        }
        $db->close();
        return $prom;
    }
    
    
}