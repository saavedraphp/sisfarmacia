<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Exception;


use App\Imports\Productosimport;

class ProductosController extends Controller
{


    public function __construct()
    {
        // LSL PARA LA VALIDACION
       // $this->middleware('auth');
        //$this->foo = $foo;
    }

    public function index(Request $request)
    {
       // DB::enableQueryLog();
        if ($request) {
            $query = trim($request->get('search'));
            $productos = Producto::where('prod_nombre', 'LIKE', '%' . $query . '%')->orderBy('prod_nombre', 'asc')->paginate(10);
        } else
            $productos = Producto::all();

         //   dd(DB::getQueryLog());
        return view('productos.index', ['productos' => $productos, 'search' => $query]);
    }

    public function create()
    {
        $valores['grabar']= 'Grabar';
        return view('productos.create',['valores' => $valores]);
    }



    public function edit($id)
    {
        $valores['grabar']= 'Actualizar';
       return view('productos.create', ['producto' => Producto::findOrFail($id),'valores' => $valores]);
       
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "nombre" => "required|min:3|max:200",
                "presentacion_id" => "required",
                "precio" => "required",
                "fabricante_id" => "required"
                
            ],
            [
                "nombre"   => "Ingrese algun nombre",
                "presentacion_id"   => "Tiene que seleccionar una presentacion",
                "precio"   => "Tiene que Ingresar un precio",
                "fabricante_id"   => "Tiene que seleccionar un Fabricante"
            ]
        );



        if ($validator->fails() == false) {
            $producto = Producto::findOrFail($id);

            
            $producto->prod_nombre = strtoupper(trim($request->get('nombre')));
            $producto->prod_precio_venta = (float)$request->get('precio');
            $producto->prod_igv    = (float)$request->get('precio') * 0.18;
            $producto->prod_descuento = (int)trim($request->get('descuento'));
            $producto->categoria_id = (int)trim($request->get('categoria_id'));


            $producto->fabricante_id = (int)($request->get('fabricante_id'));
            $producto->prod_comentario = trim($request->get('comentarios'));
            $producto->prod_ean = trim($request->get('ean'));
            $producto->prod_serie = trim($request->get('serie'));
            $producto->prod_sku = trim($request->get('sku'));

            $producto->prod_cantidad_min = (int)trim($request->get('cantidad_min'));
            $producto->prod_controlado = (int)trim($request->get('controlado'));
            $producto->prod_existencia = (int)trim($request->get('existencia'));
            $producto->presentacion_id = (int)trim($request->get('presentacion_id'));
            if(!empty($producto->prin_acti_id))
            $producto->prin_acti_id = (int)trim($request->get('prin_acti_id'));




            $producto->update();

            return response()->json(['errors' => $validator->errors(), 'status' => 200], 200);
        } else {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
    }




    public  function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "nombre" => "required|min:3|max:200",
                "precio" => "required"
            ],
            [
                "nombre"   => "Ingrese algun nombre",
                "precio"   => "Ingrese un precio",

            ]
        );


        if ($validator->fails() == false) {
            $producto = new Producto();

            $producto->prod_nombre = strtoupper(trim($request->get('nombre')));
            $producto->prod_precio_venta = (float)$request->get('precio');
            $producto->prod_igv    = (float)$request->get('precio') * 0.18;
            $producto->prod_descuento = (int)trim($request->get('descuento'));
            $categoria_id = (int)$request->get('categoria_id');
            $producto->categoria_id = isset($categoria_id)?(int)$categoria_id:"";
    

            $producto->fabricante_id = (int)($request->get('fabricante_id'));
            $producto->prod_comentario = trim($request->get('comentarios'));
            $producto->prod_ean = trim($request->get('ean'));
            $producto->prod_serie = trim($request->get('serie'));
            $producto->prod_sku = trim($request->get('sku'));

            $producto->prod_cantidad_min = (int)trim($request->get('cantidad_min'));
            $producto->prod_controlado = (int)trim($request->get('controlado'));
            $producto->prod_existencia = (int)trim($request->get('existencia'));
            $producto->presentacion_id = (int)trim($request->get('presentacion_id'));
            if(!empty($producto->prin_acti_id))
            $producto->prin_acti_id = (int)trim($request->get('prin_acti_id'));
 
 
            $producto->save();
            return response()->json(['errors' => $validator->errors(), 'status' => 200], 200);

        } else {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
    }




    public function importExcel(Request $request)
    {
        try {
            DB::beginTransaction();
            $file = $request->file('img');

            //ELIMINAR
            DB::table('productos_precio')
                ->where('prov_code', '=', trim($request->get('rbo_proveedor')))->delete();
            DB::commit();



            session([
                'prov_code' => $request->get('rbo_proveedor'),
                'fecha' => $request->get('fecha')
            ]);
            Excel::import(new Productosimport, $file);


            return redirect('admin/importar')->with('message', 'La operacion se realizo con Exito')->with('operacion', '1');
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
            $productos = Producto::with('fabricante')->where('prod_nombre', 'LIKE', '%' . trim($request->input('palabra')) . '%')->orderBy('prod_precio_venta', 'asc')->get();

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

        $productos = Producto::where('pp_nombre', 'LIKE', '%' . trim($request->input('palabra')) . '%')->orderBy('pp_precio', 'asc')->get();
        // $productos = Producto::where('empr_id', $request->empresa_id)->get();

        return $productos;
    }



    public function destroy($id)
    {

        $producto = Producto::destroy($id);

        //return redirect('productos')->with('message','La operacion se realizo con Exito')->with('operacion','1');
    }   
    
    public function dni()
    {
        $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
        $dni = '40221837';

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar dni
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 2,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
        'Referer: https://apis.net.pe/consulta-dni-api',
        'Authorization: Bearer ' . $token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos listos para usar
        $persona = json_decode($response);
        var_dump($persona);
        }
}
