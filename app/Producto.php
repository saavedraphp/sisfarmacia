<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $primaryKey = 'prod_id';
    
    protected $attributes =['pp_estado' => 'ACTI']; 

/*
    protected $fillable = [
    'prov_code',
    'pp_nombre',
    'pp_laboratorio',
    'pp_presentacion',
    'pp_composicion',
    'pp_precio',
    'pp_fecha'];
    */

    
}
