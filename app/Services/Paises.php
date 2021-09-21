<?php

namespace App\Services;

use App\Pais;

class Paises
{
    public function get()
    {
        $paises        = Pais::get();
        $paisArray[''] = 'Seleccione un Pais';
        foreach ($paises as $pais) {
            $paisArray[$pais->id] = $pais->pais_nombre;
        }
        return $paisArray;
    }
}
