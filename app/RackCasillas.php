<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RackCasillas extends Model
{
    use SoftDeletes;
       
    protected $table = 'racks_casillas';
    protected $primaryKey = 'rc_id';
    
}
