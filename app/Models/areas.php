<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
    use HasFactory;
    protected $table = 't_areas';
    protected $fillable= [
        'nombre_areas'
    ];
    protected $primaryKey = 'id';
  
}
