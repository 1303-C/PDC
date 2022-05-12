<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisis_indicadores extends Model
{
    use HasFactory;
    protected $table = 't_analisis_indicadores';
    protected $fillable = [
        'analisis_indicador',
        'indicador_inverso',
        'meta',
        'resultados',
        'equivalencia',
        'indicadores_id',
        'usuarios_id',
        'desempeño',
        'created_at'
    ];
    protected $primaryKey = 'id';
}
