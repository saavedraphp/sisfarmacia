<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acta extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'acta_id';

}
