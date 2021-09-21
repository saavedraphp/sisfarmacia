<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'usua_id';
    protected $fillables =['
    usua_nombre,
    usua_email,
    usua_f_nacimiento,
    pais_id,
    estado_id,  
    ciudad_id'];

    protected $dates =['usua_f_nacimiento'];
}
