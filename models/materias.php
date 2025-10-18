<?php
namespace App\Models;

require __DIR__."/sql_models/model.php";
require __DIR__."/sql_models/sql_materias.php";
require __DIR__."/databases/notas_app-db.php";

use App\Models\SQLModels\Model;
use App\Models\SQLModels\SqlMaterias;
use App\Models\Databases;

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
        
    }
    public function delete(){}
    public function find(){}
    public function insert(){}
    public function update(){}
}