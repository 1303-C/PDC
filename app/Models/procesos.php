<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procesos extends Model
{
    protected $table = 't_procesos';
    protected $fillable= [
        'efectividad',
        'oportunidad',
        'calificacion',
        'calificacion_total',
        'desempeño',
        'nombre_procesos_id',
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}