<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussesTravelHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'buss_id',
        'route_id',
        'driver_id',
        'prev_buss_stop_id',
        'current_buss_stop_id',
        'next_buss_stop_id',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];
}
