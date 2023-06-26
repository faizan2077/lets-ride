<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Laravel\Passport\HasApiTokens;

class Customers extends Authenticatable {


    use Notifiable;

    use HasFactory;

    protected $guard = 'customers';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'password',
        'dob',
        'image',
        'gender',
        'verification_code',
        'verified_at',
        'api_auth_token',
        'and_device_id',
        'ios_device_id',
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

}
