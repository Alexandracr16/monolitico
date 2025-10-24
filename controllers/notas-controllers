<?php
namespace App\Controllers;

require __DIR__."/../models/notas.php";

use App\Models\Notas;

class Notas_controllers
{
    public function queryAllNotas() {
        $notas = new Notas();
        return $notas->all();
    }

    public function saveNewNotas($request){
        if (empty($request['estudiantes'])){
            return false;
        }
        $notas = new Notas();
        $notas->set('estudiantes', $request['estudiantes']);
        $notas->set('materia', $request['materia']);
        $notas->set('actividad', $request['actividad']);
        $notas->set('notas', $request['notas']);
        return $notas->insert();
    }

    public function deleteNotas($request){
        if (empty($request['estudiantes'])){
            return false;
        }
        $notas = new Notas();
        $notas->set('estudiantes', $request['estudiantes']);
        $notas->set('materia', $request['materia']);
        return $notas->delete();
    }

    public function updateNotas($request){
        if (
            empty($request['estudiantes'])
            || empty($request['materia'])
            || empty($request['actividad'])
            || empty($request['notas']) 
        ){
            return false;
        }
        $notas = new Notas();
        $notas->set('estudiantes', $request['estudiantes']);
        $notas->set('materia', $request['materia']);
        $notas->set('actividad', $request['actividad']);
        $notas->set('notas', $request['notas']);
        return $notas->update();
    }

}