<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    'nombre',
    'hora_inicio',
    'hora_final',
];
}
