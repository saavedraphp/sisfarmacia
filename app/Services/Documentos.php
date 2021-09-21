<?php

namespace App\Services;

use App\Documento;

class Documentos
{
    public function get()
    {
        $documentos        = Documento::get();
        $empresaArray[''] = 'Seleccione un Tipo de Documento';
        foreach ($documentos as $documento) {
            $empresaArray[$documento->tipo_docu_id] = $documento->tipo_docu_nombre;
        }
         return $empresaArray;
    }
}
