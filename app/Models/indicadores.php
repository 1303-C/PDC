<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicadores extends Model
{
    use HasFactory;
    protected $table = 't_indicadores';
    protected $fillable= [
        'nombre_indicador',
        'nombre_proceso',
        'frecuencia_control_id',
        'areas_id',
        'procesos_id'
    ];
    protected $primaryKey = 'id';
}