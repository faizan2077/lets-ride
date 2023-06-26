<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussesRouteDetails extends Model {

    use HasFactory;

    protected $table = "busses_route_details";
    protected $fillable = [
        'id',
        'buss_id',
        'route_id',
        'driver_id',
        'created_at',
        'updated_at',
    ];

}
