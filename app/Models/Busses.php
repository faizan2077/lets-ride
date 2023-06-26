<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busses extends Model
{
    use HasFactory;

    protected $table = 'busses';
    protected $fillable = [

        'id',
        'title',
        'registration_no',
        'registration_year',
        'starting_point',
        'ending_point',
        'start_time',
        'end_time',
        'total_seats',
        'route_completeion_time',
        'stops_route_of_the_bus',
        'is_airconditioned',
        'per_stop_fare',
        'starting_latLng',
        'ending_latLng',
        'current_driver_id',
        'current_route_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
