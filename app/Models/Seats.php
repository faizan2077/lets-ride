<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;

    protected $table = 'seats';
    protected $fillable = [
        'id',
        'seat_no',
        'status',
        'buss_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
