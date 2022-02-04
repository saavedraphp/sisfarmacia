<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class CompraController extends Controller
{
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        //$this->middleware('auth');
        //$this->foo = $foo;
    }

    public function create()
    {
        $valores['grabar']= 'Grabar';
        return view('compras.create',['valores' => $valores]);

    }
        
}
