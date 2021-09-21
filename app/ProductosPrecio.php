<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductosPrecio extends Model
{
    use SoftDeletes;
    protected $table = 'productos_precio';
    protected $primaryKey = 'id';
}
