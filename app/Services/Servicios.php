<?php

namespace App\Services;

use App\Servicio;

class Servicios
{
    public function get()
    {
        $resultados        = Servicio::get();
        $array[''] = 'Seleccione un Servicio';
        foreach ($resultados as $data) {
            $array[$data->serv_id] = $data->serv_nombre;
        }
        return $array;
    }
}
