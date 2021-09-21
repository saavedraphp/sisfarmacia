<?php
namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class Productosimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'pp_nombre' => trim($row[0]),
            'pp_laboratorio' => trim($row[1]),
            'pp_presentacion' => trim($row[2]),
            'pp_composicion' => trim($row[3]),
            'pp_precio' => (float)$row[4],

            'prov_code' => trim(session('prov_code')),
            'pp_fecha' => trim(session('fecha'))

        ]);
    }
}
