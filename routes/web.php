<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

 

Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@create');

 

Route::get('/', 'HomeController@index')->name('home');

Route::get('estados/pais/{id}', 'ClienteController@getEstadosByPais');
Route::get('ciudades/estado/{id}', 'ClienteController@getCiudadesByEstado');





Route::resource('clientes', 'ClienteController');
Route::resource('productos', 'ProductosController');
Route::resource('fabricantes', 'FabricanteController');
Route::resource('compras', 'CompraController');




Route::get('dni','ProductosController@dni');









Route::get('admin/importar', 'ProductosPrecioController@importar');
 

 



 

/*Route::get('admin/importar',function(){
    return view('productos.importar');
    });
*/
Route::get('admin/consultas',function(){
    return view('productos.consultas');
    });
        
Route::get('obtenerProductos/', 'ProductosController@buscarProduco');
Route::get('obtenerClientes/', 'ClienteController@buscarCliente');

Route::get('grabarListaPedido/', 'PedidosController@grabarListaPedido');

Route::resource('admin/pedidos', 'PedidosController');
 

Route::get('reporte_acta/id/{id}/','PedidosController@pdfPedido')->name('reportePedido.pdf');

Route::post('import-list-excel','ProductosController@importExcel')->name('products.import.excel');
    
 