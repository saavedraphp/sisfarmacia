<?php

namespace App\Http\Controllers;

use App\Rack;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::enableQueryLog();
        if ($request) {
            $query    = trim($request->get('search'));


              $data = Rack::where('rack_nombre', 'LIKE', '%' . $query . '%')->orderBy('rack_nombre', 'asc')->paginate(10);
           // dd(DB::getQueryLog());
            return view('racks.index', ['filas' => $data, 'search' => $query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('racks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rack                   = new Rack();
            $rack->rack_nombre      = strtoupper($request->get('nombre'));
            
            
            $rack->save();
            return redirect('admin/racks')->with('message','La operacion se realizo con Exito')->with('operacion','1');

        } catch (Exception $e) {
            
            report($e);
            return redirect('admin/racks')->with('message','Se encontro un error inesperado en la operación<br>'.$e)->with('operacion','0');
            
        }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function show(Rack $rack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
        return view('racks.edit', ['fila' => Rack::findOrFail($id)]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fila = Rack::findOrFail($id);
        $fila->rack_nombre = strtoupper($request->nombre);
        $fila->update();
        
        return redirect('admin/racks')->with('message','La operacion se realizo con Exito')->with('operacion','1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rack::destroy($id);
        return redirect('admin/racks')->with('message','La operacion se realizo con Exito')->with('operacion','1');
        

    }

    
}
