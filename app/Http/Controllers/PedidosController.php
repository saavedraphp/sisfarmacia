<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Exception;

use App\PedidosUsuario;
use App\ProductosPedido;



class PedidosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $pedidos = PedidosUsuario::where('usua_id',Auth::user()->id)->orderBy("created_at","desc")->paginate(10);
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    
    public function edit()
    {
        return;
    }


    public function grabarListaPedido(Request $request)
    {
        
       
        
         DB::beginTransaction();
        try {

            $pedido = new PedidosUsuario();
            $pedido->usua_id = Auth::user()->id;
            $pedido->nombre  = date("Y-m-d")." - ".$request->total;
    
            $pedido->save();
            
            
    
      
            foreach ( $request->listaProductos  as $key => $fila) 
            {  
                 $fila2 = json_decode($fila);
    
                 $query[] = [
                    'pedido_id'         => $pedido->id,
                    'prod_id'           => $fila2->id,
                    'prod_nombre'       => $fila2->pp_nombre,
                    'prov_code'         => $fila2->prov_code,
                    'pp_laboratorio'    => $fila2->pp_laboratorio,
                    'pp_precio'         => $fila2->pp_precio,
                    'pp_cantidad'       => $fila2->cantidad
                    ];
                 
            } 
    
            ProductosPedido::insert($query);
 
         DB::commit();
        return "Se guardo el pedido correctamente";
        
        } catch (Exception $e) {
            DB::rollBack(); 
            report($e);
            return $e;
        } 

    }


    public function pdfPedido($id)
    {
        DB::enableQueryLog();
 
        $pedido = PedidosUsuario::findOrFail($id);
         
        
         $detalles = DB::table('pedidos_usuario  as p')
        ->join('productos_pedido as pp', 'p.id', '=', 'pp.pedido_id')
        ->select('p.id', 'p.nombre', 'p.usua_id','pp.pedido_id', 'pp.prod_id', 'pp.prod_nombre','pp.pp_precio', 'pp.pp_cantidad',
        'pp.prov_code',  'pp.pp_laboratorio')
        ->where('p.id', '=',$id )
        ->orderBy('pp.created_at', 'asc')->get();
       // dd(DB::getQueryLog());
        

        
        $pdf = PDF::loadView('pdf.pedido',['pedido'=>$pedido,'detalles'=>$detalles]);
        

        return $pdf->download('Pedido - '.$id.'.pdf');
      
    }



    public function destroy($id)
    {
        PedidosUsuario::destroy($id);
        //ProductosPedido::destroy($id);

        return redirect('admin/pedidos')->with('message','La operacion se realizo con Exito')->with('operacion','1');
        

    }    

}
