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
        if (empty($request['estudiante'])||
            empty($request['materia'])||
            empty($request['actividad'])||
            empty($request['nota'])
        ){
            return false;
        }
        // Validate nota que este entre 0 a 5, con maximo de 2 decimales
        $notaValor= floatval($request['nota']);
        if($notaValor < 0 || $notaValor > 5){
            return false;
        }

        $notas = new Notas();
        $notas->set('estudiante', $request['estudiante']);
        $notas->set('materia', $request['materia']);
        $notas->set('actividad', $request['actividad']);
        $notas->set('nota', round($notaValor,2));
        return $notas->insert();
    }

    public function deleteNotas($request){
        if (empty($request['estudiante'])||
        empty($request['materia'])
        ){
            return false;
        }


        $notas = new Notas();
        $notas->set('estudiante', $request['estudiante']);
        $notas->set('materia', $request['materia']);
        return $notas->delete();
    }

    public function updateNotas($request){
        if (
            empty($request['estudiante'])
            || empty($request['materia'])
            || empty($request['actividad'])||
            empty($request['nota'])
        ){
            return false;
        }

        $notaValor= floatval($request['nota']);
        if($notaValor < 0 || $notaValor > 5){
            return false;
        }

        $notas = new Notas();
        $notas->set('estudiante', $request['estudiante']);
        $notas->set('materia', $request['materia']);
        $notas->set('actividad', $request['actividad']);
        $notas->set('notas', round($notaValor,2));
        return $notas->update();
    }

}