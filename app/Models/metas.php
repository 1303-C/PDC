<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metas extends Model
{
    protected $table = 't_metas';
    protected $fillable= [
        'meta',
        'mes',
        'indicadores_id'
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
