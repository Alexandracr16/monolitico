<?php
namespace App\Models;

require __DIR__."/sql_models/model.php";
require __DIR__."/sql_models/sql_programas.php";
require __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlProgramas;
use App\Models\Databases\notasAppBD ;


class Programas extends Model
{
    private $codigo=0;
    private $nombre=null;

    public function get($prop){
        return $this->{$prop};
    }

    public function set($prop, $value){
        $this->{$prop}=$value;
    }

    public function all(){
        $sql=SqlProgramas::selectAll();
        $db= new notasAppBD();
        $result= $db->execSQL($sql, true);
        $programas= [];
        if ($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $programa= new Programas();
                $programa-> set('codigo', $row["codigo"]);
                $programa->set('nombre', $row["nombre"]);
                array_push($programas, $programa);

            }
        }
        $db->close();
        return $programas;

    }
    public function delete(){
        $sql = SqlProgramas::delete();
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
        $sql = SqlProgramas::insertInto();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "ss",
            $this->codigo,
            $this->nombre

        );
        $db->close();
        return $result;
    }
    public function update(){
        $sql = SqlProgramas::update();
        $db = new notasAppBD();
        $result = $db->execSQL(
            $sql,
            false,
            "ss",
            $this->codigo,
            $this->nombre
        );
        $db->close();
        return $result;
    }
}