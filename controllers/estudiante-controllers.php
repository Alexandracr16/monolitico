<?php
namespace App\Controllers;

require __DIR__ . "/../models/programas.php";

use App\Models\Programa;

class ProgramaController
{
    // 🔹 Consultar todos los programas
    public function queryAllProgramas()
    {
        $programa = new Programa();
        return $programa->all();
    }

    // 🔹 Guardar nuevo programa
    public function saveNewPrograma($request)
    {
        if (empty($request['codigo']) || empty($request['nombre'])) {
            return false;
        }

        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        $programa->set('nombre', $request['nombre']);
        return $programa->insert();
    }

    // 🔹 Eliminar programa
    public function deletePrograma($request)
    {
        if (empty($request['codigo'])) {
            return false;
        }

        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        return $programa->delete();
    }

    // 🔹 Actualizar programa
    public function updatePrograma($request)
    {
        if (empty($request['codigo']) || empty($request['nombre'])) {
            return false;
        }

        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        $programa->set('nombre', $request['nombre']);
        return $programa->update();
    }
}
