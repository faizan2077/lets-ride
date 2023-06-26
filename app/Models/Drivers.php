<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Drivers extends Authenticatable {
    use HasApiTokens,Notifiable;
    use HasFactory;

    protected $guard = 'driver';

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'password',
        'dob',
        'image',
        'selfie',
        'license_image',
        'cnic_front',
        'cnic_back',
        'gender',
        'total_experience',
        'license_number',
        'verification_code',
        'verified_at',
        'api_auth_token',
        'and_device_id',
        'ios_device_id',
        'status',
        'verify_identity_st',
        'rejected_message',
        'driver_st',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
