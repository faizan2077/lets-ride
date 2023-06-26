<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteStops extends Model {

    use HasFactory;

    protected $table = "route_stops";
    protected $fillable = [
        'id',
        'route_id',
        'buss_stop_id',
        'sort_order',
        'arrived_at',
        'created_at',
        'updated_at',
    ];

}
