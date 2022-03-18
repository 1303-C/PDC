<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frecuencia_control extends Model
{
    protected $table = 't_frecuencia_controles';
    protected $fillable= [
        'frecuencia_control'
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
