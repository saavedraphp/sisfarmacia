<?php

namespace App\Services;

use App\Categoria;


class Categorias
{
    public function get()
    {
        $categorias        = Categoria::get();
        $categoriasArray[''] = 'Seleccione una Categoria';
        
        foreach ($categorias as $categoria) {
            $categoriasArray[$categoria->id] = $categoria->categoria;
        }
        return $categoriasArray;
    }
}
