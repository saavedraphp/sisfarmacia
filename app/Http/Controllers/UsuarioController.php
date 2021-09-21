<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ciudad;
use App\Http\Requests\UsuarioFormRequest;
use App\Pais;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade as PDF;

class UsuarioController extends Controller
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
            $usuarios = Usuario::where('usua_nombre', 'LIKE', '%' . $query . '%')->orderBy('usua_nombre', 'asc')->paginate(10);

            return view('usuarios.index', ['usuarios' => $usuarios, 'search' => $query]);

        }
        //$usuarios = Usuario::all();
        //return view('usuarios.index',['usuarios' => $usuarios]);
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

        return view('usuarios.create');

    }

    public function store(UsuarioFormRequest $request)
    {
        $usuario                 = new Usuario();
        $usuario->usua_nombre    = $request->get('nombre');
        $usuario->usua_email     = $request->get('email');
        $usuario->usua_direccion = $request->get('direccion');
        $usuario->pais_id        = $request->get('cbo_pais');
        $usuario->estado_id        = $request->get('cbo_estado');
        $usuario->ciudad_id        = $request->get('cbo_ciudad');
        

        $usuario->usua_f_nacimiento = date_create();
        
        $usuario->save();

        return redirect('/usuarios');
    }



    public function edit($id)
    {
    

        return view('usuarios.edit', ['usuario' => Usuario::findOrFail($id)]);
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
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return redirect('/usuarios');

    }

}

