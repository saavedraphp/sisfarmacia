<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kardex extends Model
{
    use SoftDeletes;
    protected $table = "kardex";
    protected $primaryKey = 'kard_id';
}
