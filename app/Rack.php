<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rack extends Model
{
    use SoftDeletes;
       
    protected $table = 'racks';
    protected $primaryKey = 'rack_id';
}
