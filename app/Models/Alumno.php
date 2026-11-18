<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'matricula',
        'nombre',
        'carrera',
        'cuatrimestre',
        'ultimo_animo',
    ];
}
