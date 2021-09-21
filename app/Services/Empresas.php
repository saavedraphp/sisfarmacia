<?php

namespace App\Services;

use App\Empresa;

class Empresas
{
    public function get()
    {
        $empresas        = Empresa::get();
        $empresaArray[''] = 'Seleccione una Empresa';
        foreach ($empresas as $empresa) {
            $empresaArray[$empresa->empr_id] = $empresa->empr_nombre;
        }
        return $empresaArray;
    }
}
