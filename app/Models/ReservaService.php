<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaService extends Model
{
    protected $fillable = [
    'reserva_id',
    'service_id',
    'cantidad',
    ];
}
