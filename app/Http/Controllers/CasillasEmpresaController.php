<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Rack;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class CasillasEmpresaController extends Controller
{

    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }


    public function asignar_casillas($id)
    {

        $racks = Rack::get();

        return view('empresas.asignar_celdas', ['empresa' => Empresa::findOrFail($id),'racks' => $racks]);
    }
 

 
 
 

    
}
