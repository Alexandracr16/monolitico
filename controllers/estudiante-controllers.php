<?php

namespace App\Controllers;

require __DIR__ . "/../models/estudiantes.php";

use App\Models\Estudiante;

class EstudianteController
{
   public function queryAllEstudiante()
   {
      $estudiante = new Estudiante();
      return $estudiante->all();
   }

   public function saveNewEstudiante($request)
   {
      if (empty($request['codigo'])) {
         return false;
      }
      // Verificar si el programa existe antes de intentar insertar
      $estudiante = new Estudiante();
      $programas = $estudiante->getProgramas();
      $programaExiste = false;
      foreach ($programas as $prog) {
         if ($prog['codigo'] === $request['programa']) {
            $programaExiste = true;
            break;
         }
      }
      if (!$programaExiste) {
         return false;
      }
      
      $estudiante->set('codigo', $request['codigo']);
      $estudiante->set('nombre', $request['nombre']);
      $estudiante->set('email', $request['email']);
      $estudiante->set('programa', $request['programa']);
      return $estudiante->insert();
   }

   public function deleteEstudiante($request)
   {
      if (empty($request['codigo'])) {
         return false;
      }
      $estudiante = new Estudiante();
      $estudiante->set('codigo', $request['codigo']);
      return $estudiante->delete();
   }

   public function updateEstudiante($request)
   {
      if (
         empty($request['codigo'])
         || empty($request['nombre'])
         || empty($request['email'])
         || empty($request['programa'])
      ) {
         return false;
      }
      // Verificar si el programa existe antes de intentar actualizar
      $estudiante = new Estudiante();
      $programas = $estudiante->getProgramas();
      $programaExiste = false;
      foreach ($programas as $prog) {
         if ($prog['codigo'] === $request['programa']) {
            $programaExiste = true;
            break;
         }
      }
      if (!$programaExiste) {
         return false;
      }
      
      $estudiante->set('nombre', $request['nombre']);
      $estudiante->set('email', $request['email']);
      $estudiante->set('programa', $request['programa']);
      $estudiante->set('codigo', $request['codigo']);
      return $estudiante->update();
   }

   public function hasNotas($codigo)
   {
      $estudiante = new Estudiante();
      $estudiante->set('codigo', $codigo);
      return $estudiante->checkNotas();
   }

   public function getProgramas()
   {
      $estudiante = new Estudiante();
      return $estudiante->getProgramas();
   }
}
