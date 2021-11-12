<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fabricante;
use Validator;



class FabricanteController extends Controller
{
    public function __construct()
    {
        // LSL PARA LA VALIDACION
       // $this->middleware('auth');
        //$this->foo = $foo;
    }


    public  function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "nombre" => "required|min:3|max:200",
                "abreviatura" => "required"
                
            ],
            [
                "nombre"   => "Ingrese algun nombre",
                "abreviatura"   => "Ingrese una cantidad minima"                
            ]
        );


        if ($validator->fails() == false) {
            $fabricante = new Fabricante();

            $fabricante->fabr_nombre = strtoupper(trim($request->get('nombre')));
            $fabricante->fabr_abreviatura = strtoupper(trim($request->get('abreviatura')));
            $fabricante->fabr_estado = trim($request->get('estado'));

 

            $fabricante->save();

            return response()->json(['errors' => $validator->errors(), 'status' => 200], 200);
        } else {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
    }    
}
