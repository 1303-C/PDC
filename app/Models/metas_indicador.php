<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metas_indicador extends Model
{
    protected $table = 't_metas_indicador';
    protected $fillable= [
        'mes',
        'año',
        'meta',
        't_indicadores_id',
    ];
    use HasFactory;
}
