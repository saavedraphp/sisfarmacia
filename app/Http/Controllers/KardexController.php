<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KardexController extends Controller
{



    
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }





    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('search'));
            //$empresa_count = Producto::where('empr_id',Auth::user()->id)->count();
            $productos = Producto::where('empr_id',Auth::user()->id)
                        ->where('prod_nombre', 'LIKE', '%' . $query . '%')
                        ->orderBy('prod_nombre', 'asc')->paginate(10);

            return view('kardex.index', ['productos' => $productos, 'search' => $query]);

        }
    }
}
