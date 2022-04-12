<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caag extends Model
{
    protected $table = 't_caag';
    protected $fillable = [
        'Actividades',
        'fecha_programada',
        'fecha_cierre',
        'porcentaje',
        'fecha_reprogramada',
        'analisis_indicador',
        'ca_estado_id',

    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
