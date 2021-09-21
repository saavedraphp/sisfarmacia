<?php

namespace App\Services;

use App\Estado;

class Estados
{
    public function get()
    {
        $result        = Estado::get();
        $Array[''] = 'Seleccione un Estado';
        foreach ($result as $value) {
            $Array[$value->id] = $value->nombre;
        }
        return $Array;
    }
}
