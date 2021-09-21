<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Proveedor;


class ProductosPrecioController extends Controller
{

    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }



    public function importar(Request $request)
    {
        $proveedores = DB::table('proveedor as p')
        ->leftJoin('productos_precio as pp','p.prov_code','=','pp.prov_code')
        ->select('p.prov_code','prov_nombre', DB::raw('count(pp.prov_code) as cantidad'))
        ->groupBy('p.prov_code','prov_nombre')
        ->orderBy('prov_nombre','asc')
        ->get();

/*
        $productos = DB::table('productos  as p')
        
        ->select('p.prod_id','p.pres_id', 'p.prod_nombre',  'p.prod_lote','p.prod_stock', 'p.prod_fecha_vencimiento',
        'p.prod_stock as total')
        ->where('p.empr_id', '=',$request->empresa_id )
        ->orderBy('p.created_at', 'asc')->get();


*/

        return view('productos.importar',['proveedores' => $proveedores]);
    }    

}
