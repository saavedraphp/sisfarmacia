<?php

namespace App\Services;

use App\Presentacion;

class Presentaciones
{
    public function get()
    {
        $resultados        = Presentacion::get();
        $array[''] = 'Seleccione una Presentacion';
        foreach ($resultados as $data) {
            $array[$data->pres_id] = $data->pres_nombre;
        }
        return $array;
    }
}
