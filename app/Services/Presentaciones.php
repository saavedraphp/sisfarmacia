<?php

namespace App\Services;

use App\Presentacion;

class Presentaciones
{
    public function get()
    {
        $filas        = Presentacion::get();
        $array[''] = 'Seleccione una Presentacion';
        foreach ($filas as $fila) {
            $array[$fila->pres_id] = $fila->pres_nombre;
        }
        return $array;
    }
}
