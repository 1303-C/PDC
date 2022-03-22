<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_acciones extends Model
{
    protected $table = 't_estado_acciones';
    protected $fillable = [
        'fecha_cierre',
        'codigo_accion',
        'estado_id',
        'tipo_acciones_id',

    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
