<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
    'user_id',
    'habitacion_id',
    'costo',
    'fecha',
    ];
}
