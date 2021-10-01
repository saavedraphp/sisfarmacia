<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ciudad;
use App\Http\Requests\UsuarioFormRequest;
use Validator;
use Response;
use App\Pais;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }


    public function exportarPdf()
    {
        $users = Usuario::get();
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
        //$usuarios = Usuario::all();
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

        return view('clientes.create');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nombre"  => "required|min:10|max:200",
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
            $cliente->nombre    = $request->get('nombre');
            $cliente->email     = $request->get('email');
            $cliente->direccion = $request->get('direccion');
            $cliente->telefono = $request->get('telefono');
            $cliente->pais_id = $request->get('pais_id');
            $cliente->estado_id = $request->get('estado_id');
            $cliente->ciudad_id = $request->get('ciudad_id');
            $cliente->estado = 'ACTI';
    
            $cliente->f_nacimiento = date_create();
            
            $cliente->save(); 
            return response()->json($validator->messages(), 200);

        }
        else
        {

            return response()->json(['errors' => $validator->errors(), 'status' => 400],400);

        }


     }


 




     
    public function edit($id)
    {
    

        return view('clientes.edit', ['cliente' => Cliente::findOrFail($id)]);
    }


    

    public function update(UsuarioFormRequest $request, $id)
    {

        $usuario                 = Usuario::findOrFail($id);
        $usuario->usua_nombre    = $request->get('nombre');
        $usuario->usua_email     = $request->get('email');
        $usuario->usua_direccion = $request->get('direccion');
        $usuario->pais_id        = $request->get('cbo_pais');
        $usuario->estado_id        = $request->get('cbo_estado');
        $usuario->ciudad_id        = $request->get('cbo_ciudad');
        $usuario->usua_code_zip  = $request->get('zip');
        $usuario->usua_f_nacimiento = Carbon::createFromFormat('m/d/Y', $request->get('fechaNacimiento'))->format('Y-m-d');
        

        
        
        $usuario->update();

        return redirect('/usuarios');

    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect('/clientes');

    }

}

