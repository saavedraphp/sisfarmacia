<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidosUsuario extends Model
{
    use SoftDeletes;
    protected $table = 'pedidos_usuario';
    protected $primaryKey = 'id';


    public function productospedido()
    {
        return $this->hasMany(ProductosPedido::class,"pedido_id");
    }
    
    

    public static function boot() {
        parent::boot();

        static::deleting(function($productospedido) {
             $productospedido->productospedido()->delete();
        });
    }    
}
