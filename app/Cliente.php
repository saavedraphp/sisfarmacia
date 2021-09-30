<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'id';
    protected $fillables =['
    nombre,
    email,
    f_nacimiento,
    telefono,
    pais_id,
    estado_id,  
    ciudad_id',
    'estado'];

 

    protected $dates =['f_nacimiento'];
}
