<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fabricante extends Model
{
    use SoftDeletes;
    protected $primaryKey = "fabr_id";
    protected $attributes = ['fabr_estado' =>'ACTI'];
}
