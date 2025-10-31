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
        return $result ? $result : "Error al eliminar la nota.";
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

         $db = new notasAppBD();

        //  Verificar que el estudiante exista
        $checkEst = $db->execSQL(
            "SELECT COUNT(*) AS total FROM estudiantes WHERE codigo = ?",
            true,
            "s",
            $this->estudiante
        );

        if ($checkEst && $row = $checkEst->fetch_assoc()) {
            if ($row["total"] == 0) {
                $db->close();
                return ["Error: El estudiante con código {$this->estudiante} no existe."];
            }
        }

        // ✅ Verificar que la materia exista
        $checkMat = $db->execSQL(
            "SELECT COUNT(*) AS total FROM materias WHERE codigo = ?",
            true,
            "s",
            $this->materia
        );

        if ($checkMat && $row = $checkMat->fetch_assoc()) {
            if ($row["total"] == 0) {
                $db->close();
                return ["Error: La materia con código {$this->materia} no existe."];
            }
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

        if (!preg_match('/^\d+(\.\d{1,2})?$/', $this->nota)) {
            return "Error: La nota debe tener máximo dos decimales.";
        }
        $sql = SqlNotas::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "dsss",
            $this->get('nota'),
            $this->get('materia'),
            $this->get('estudiante'),
            $this->get('actividad')
            
        );
        $db->close();
        return $result ? true : "Error al actualizar la nota.";
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
        $promedio = 0.00;
        if ($result && $row = $result->fetch_assoc()) {
            $promedio= round($row["promedio"],2);
        }
        $db->close();
        return $promedio;
    }
    
    
}