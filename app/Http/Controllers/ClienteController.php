<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ciudad;
use App\Http\Requests\UsuarioFormRequest;

use Illuminate\Support\Facades\Validator;
use Response;
use App\Pais;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;


use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        //$this->middleware('auth');
        //$this->foo = $foo;
    }


    public function exportarPdf()
    {
        $users = Cliente::get();
        $pdf = PDF::loadView('pdf.listUser',compact('users'));

        return $pdf->download('user-list.pdf');
    }


    public function getEstadosByPais(Request $request)
    {
        if ($request->ajax()) {
            $estados     = Estado::where('pais_id', $request->pais_id)->get();
            $estadoArray = array();
            foreach ($estados as $estado) {
                $estadoArray[$estado->id] = $estado->nombre;
            }

            return response()->json($estadoArray);
        }
        //
    }



    public function getCiudadesByEstado(Request $request)
    {
        if ($request->ajax()) {
            $ciudades     = Ciudad::where('estado_id', $request->estado_id)->get();
            $valorArray = array();
            foreach ($ciudades as $ciudad) {
                $valorArray[$ciudad->id] = $ciudad->nombre;
            }

            return response()->json($valorArray);
        }
        //
    }





    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('search'));
            $clientes = Cliente::where('nombre', 'LIKE', '%' . $query . '%')->orderBy('nombre', 'asc')->paginate(3);

            return view('clientes.index', ['clientes' => $clientes, 'search' => $query]);

        }
        else
        $clientes = Cliente::all();
        return view('clientes.index',['clientes' => $clientes]);
    }

    public function show($id)
    {
        $usuario = DB::table('usuarios  as u')
        ->leftJoin('pais as p','u.pais_id','=','p.id')
        ->leftJoin('estados as e','u.estado_id','=','e.id')
        ->leftJoin('ciudades as c','u.ciudad_id','=','c.id')
        ->select('u.usua_nombre','u.usua_email','u.usua_direccion',
        'u.usua_code_zip','u.usua_f_nacimiento','p.pais_nombre as pais',
        'e.nombre as estado','c.nombre as ciudad')
        ->where('u.usua_id',$id)->first();
        
 
        return view('usuarios.show', ['usuario' => $usuario]);
    }

    public function create()
    {
        $valores['grabar']= 'Grabar';
        return view('clientes.create',['valores' => $valores]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nombre"  => "required|min:3||max:200",
            "email"=> "required|min:10",
            "direccion" => "nullable"
        ],[
            "nombre.required" => "El Nombre tiene que tener almenos :min Caracteres.",
            "email.min" => "El Correo tiene que tener almenos :min Caracteres.",
            "direccion.required" => "Ingrese alguna direccion"

        ]);


    
        if ($validator->fails() == false)
        {
            $cliente            = new Cliente();
            $cliente->documento_identidad_id = $request->get('documento_identidad_id');
            $cliente->nro_documento = $request->get('nro_documento');

            $cliente->nombre    = $request->get('nombre');
            $cliente->direccion = $request->get('direccion');
            $cliente->tipo_cliente = $request->get('tipo_cliente');

            $cliente->telefono = $request->get('telefono');
            $cliente->email     = $request->get('email');

            $cliente->genero = $request->get('genero');
            $cliente->comentario = $request->get('comentario');

            $cliente->estado = 'ACTI';
            $cliente->f_nacimiento = date_create();

            $cliente->save(); 
            return response()->json(['errors' => $validator->errors(), 'status' => 200],200);

        }
        else
        {

            return response()->json(['errors' => $validator->errors(), 'status' => 400],400);

        }


     }


 




     
    public function edit($id)
    {
    
        $valores['grabar']= 'Actualizar';
        return view('clientes.create', ['cliente' => Cliente::findOrFail($id),'valores' => $valores]);
    }


    

    public function update(Request $request, $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "nombre" => "required|min:3|max:200",
                "documento_identidad_id" => "required"
               
                
            ],
            [
                "nombre"   => "Ingrese algun nombre",
                "documento_identidad_id"   => "Tiene que seleccionar una presentacion"
                
            ]
        );

        if ($validator->fails() == false)
        {
            $cliente            = Cliente::findOrFail($id);
            $cliente->documento_identidad_id = $request->get('documento_identidad_id');
            $cliente->nro_documento = $request->get('nro_documento');

            $cliente->nombre    = $request->get('nombre');
            $cliente->direccion = $request->get('direccion');
            $cliente->tipo_cliente = $request->get('tipo_cliente');

            $cliente->telefono = $request->get('telefono');
            $cliente->email     = $request->get('email');

            $cliente->genero = $request->get('genero');
            $cliente->comentario = $request->get('comentario');

             $cliente->f_nacimiento = date_create();

            $cliente->save(); 
            return response()->json(['errors' => $validator->errors(), 'status' => 200],200);

        }
        else
        {

            return response()->json(['errors' => $validator->errors(), 'status' => 400],400);

        }


    }



    public function destroy($id)
    {
        return Cliente::destroy($id);

    }



    public function buscarCliente(Request $request)
    {
        try {
            //        DB::enableQueryLog();
            $data = Cliente::where('nombre', 'LIKE', '%' . trim($request->input('palabra')) . '%')->orderBy('nombre', 'asc')->get();

            //$productos = DB::table('productos_precio')
            //              ->where('pp_nombre','LIKE','%'.trim($request->palabra).'%')->orderBy('pp_precio', 'asc')->get();
            //dd(DB::getQueryLog());
            return $data;
        } catch (Exception $e) {
            report($e);
            return $e;
        }
    }



}

