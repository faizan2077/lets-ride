<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'starting_point',
        'ending_point',
        'stops_list',
        'status',
        'assigned',
        'created_at',
        'updated_at',
    ];
}
