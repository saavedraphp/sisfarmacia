<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


use Validator;


use Maatwebsite\Excel\Facades\Excel;


use App\Imports\Productosimport;

class ProductosController extends Controller
{

    
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        //$this->middleware('auth');
        //$this->foo = $foo;
    }

    public  function store(Request $request )
    {
        $validator = Validator::make($request->all(),
        [
        "nombre" =>"required|min:3|max:200",
        "cantidad_min" =>"required",
        "controlado" =>"required",
        ],
        ["nombre"   =>"Ingrese alguna nombre",
        "cantidad_min"   =>"Ingrese una cantidad minima",
        "controlado"   =>"Ingrese si es un producto controlado"
        ]);


        if ($validator->fails() == false) {
            $producto = new Producto();

            $producto = trim($request->get('nombre'));
             
            $producto = trim($request->get('cantidad_min'));
            $producto = trim($request->get('controlado'));
            $producto = trim($request->get('existencia'));
            $producto = trim($request->get('isv'));
            $producto = trim($request->get('descuento_id'));
            $producto = trim($request->get('presentacion_id'));
            $producto = trim($request->get('estante_id'));
    //        $producto = trim($request->get('componente_id'));
            //$producto = trim($request->get('prod_estado'));
            //$producto = trim($request->get('existenciaID'));
    
            $producto->save(); 
            
            return response()->json($validator->message(),200);
            
        }
        else
        {
            return response()->json(['errors' => $validator->errors(), 'status' =>400],400);
            

        }

       

    }




    public function importExcel(Request $request)
    {
        try {
        DB::beginTransaction();
            $file = $request->file('img');

            //ELIMINAR
            DB::table('productos_precio')
                          ->where('prov_code','=',trim($request->get('rbo_proveedor')))->delete();
            DB::commit();

            

            session(['prov_code' => $request->get('rbo_proveedor'),
                    'fecha' => $request->get('fecha')]);
            Excel::import(new Productosimport,$file);
            

        return redirect('admin/importar')->with('message','La operacion se realizo con Exito')->with('operacion','1');

        } catch (Exception $e) {
            DB::rollBack(); 
            report($e);
            return $e;
        }

    }
    
    
    public function buscarProduco(Request $request)
    {
        try {
         //        DB::enableQueryLog();
        $productos = Producto::where('pp_nombre', 'LIKE', '%' . trim($request->input('palabra')). '%')->orderBy('pp_precio', 'asc')->get();
        
        //$productos = DB::table('productos_precio')
          //              ->where('pp_nombre','LIKE','%'.trim($request->palabra).'%')->orderBy('pp_precio', 'asc')->get();
         //dd(DB::getQueryLog());
        return $productos;
        
        } catch (Exception $e) {
            report($e);
            return $e;
        }

    }


    public function ObtenerProductosEmpresa(Request $request)
    {
                        
        $productos = Producto::where('pp_nombre', 'LIKE', '%' . trim($request->input('palabra')). '%')->orderBy('pp_precio', 'asc')->get();
 




           // $productos = Producto::where('empr_id', $request->empresa_id)->get();

            return $productos;

        
    }



}
