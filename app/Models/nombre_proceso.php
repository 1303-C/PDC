<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nombre_proceso extends Model
{
    protected $table = 't_nombre_procesos';
    protected $fillable= [
        'nombre_proceso'
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
