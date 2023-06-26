<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussStops extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'short_title',
        'latitude',
        'longitude',
        'status',
        'created_at',
        'updated_at',
    ];



}
