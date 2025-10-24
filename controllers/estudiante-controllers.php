<?php
namespace App\Controllers;

require __DIR__."/../models/estudiantes.php";

use App\Models\Estudiante;

class EstudianteController {
    public function queryAllEstudiante() {
        $estudiante = new Estudiante();
        return $estudiante->all();
    }

    public function saveNewEstudiante($request){
        if (empty($request['codigo'])){
            return false;
        }
        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        $estudiante->set('nombre', $request['nombre']);
        $estudiante->set('email', $request['email']);
        $estudiante->set('programa', $request['programa']);
        return $estudiante->insert();
    }

    public function deleteEstudiante($request){
        if (empty($request['codigo'])){
            return false;
        }
        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        return $estudiante->delete();
    }

    public function updateEstudiante($request){
        if (
            empty($request['codigo'])
            || empty($request['nombre'])
            || empty($request['email'])
            || empty($request['programa']) 
        ){
            return false;
        }
        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        $estudiante->set('nombre', $request['nombre']);
        $estudiante->set('email', $request['email']);
        $estudiante->set('programa', $request['programa']);
        return $estudiante->update();
    }
}