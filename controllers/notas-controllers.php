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
            return ["error" => "Todos los campos son obligatorios"];
        }
        // Validate nota que este entre 0 a 5, con maximo de 2 decimales
        $notaValor= floatval($request['nota']);
        if($notaValor <= 0 || $notaValor >= 5){
            return ["error" => "La nota debe estar entre 0 y 5"];
        }

         if (round($notaValor, 2) != $notaValor) {
            return ["error" => "La nota solo puede tener máximo dos decimales"];
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
        empty($request['materia'])||
         empty($request['actividad'])
        ){
            return false;
        }


        $notas = new Notas();
        $notas->set('estudiante', $request['estudiante']);
        $notas->set('materia', $request['materia']);
         $notas->set('actividad', $request['actividad']);
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
        if($notaValor <= 0 || $notaValor >= 5){
            return ["error" => "La nota debe estar entre 0 y 5"];
        }

        $notas = new Notas();
        $notas->set('estudiante', $request['estudiante']);
        $notas->set('materia', $request['materia']);
        $notas->set('actividad', $request['actividad']);
        $notas->set('nota', round($notaValor,2));
        return $notas->update();
    }

    public function queryNotasByEstudiante($codigoEstudiante)
    {
        if (empty($codigoEstudiante)) {
            return ["error" => "Debe especificar el código del estudiante"];
        }

        $notas = new Notas();
        return $notas->findByEstudiante($codigoEstudiante);
    }

    // 🔹 6. Calcular promedio de estudiante por materia
    public function promedioEstudiante($codigoEstudiante, $codigoMateria)
    {
        if (empty($codigoEstudiante) || empty($codigoMateria)) {
            return ["error" => "Faltan parámetros para calcular el promedio"];
        }

        $notas = new Notas();
        return $notas->promedio($codigoEstudiante, $codigoMateria);
    }
}