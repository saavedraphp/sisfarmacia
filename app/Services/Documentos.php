<?php

namespace App\Services;

use App\DocumentoIdentidad;

class Documentos
{
    public function get()
    {
 

        $result        = DocumentoIdentidad::get();
        $Array[''] = 'Seleccione un tipo Documento';
        foreach ($result as $value) {
            $Array[$value->id] = $value->documento;
        }
        return $Array;


       
    }
}
