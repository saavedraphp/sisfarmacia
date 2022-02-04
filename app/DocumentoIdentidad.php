<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentoIdentidad extends Model
{
    use SoftDeletes;
    protected $table = "documento_identidad";
    protected $primaryKey = 'id';
}