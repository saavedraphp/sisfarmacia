<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Documento extends Model
{   
    use SoftDeletes;
    protected $table = "tipo_documentos";
    protected $primaryKey = 'tipo_docu_id';
}