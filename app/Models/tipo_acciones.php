<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_acciones extends Model
{
    protected $table = 't_tipo_acciones';
    protected $fillable = [
        'tipo_accion',
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
