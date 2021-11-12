<?php

namespace App\Services;

use App\Fabricante;

class Fabricantes
{
    public function get()
    {
        $fabricantes        = Fabricante::get();
        $fabricantesArray[''] = 'Seleccione un Fabricante';
        
        foreach ($fabricantes as $fabricante) {
            $fabricantesArray[$fabricante->fabr_id] = $fabricante->fabr_nombre;
        }
        return $fabricantesArray;
    }
}
