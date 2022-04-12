<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ccgr extends Model
{
    protected $table = 't_ccgr';
    protected $fillable = [
        'id_control',
        'fecha_evaluacion',
        'fecha_actual',
        'fecha_real_evaluacion',
        'porcentaje_avances',
        'evidencia_avance',
        'cc_estado_id',
        'cc_frecuencia_controles_id',
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
