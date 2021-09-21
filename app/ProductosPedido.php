<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductosPedido extends Model
{
    use SoftDeletes;
    protected $table = 'productos_pedido';
    protected $primaryKey = 'id';
}
