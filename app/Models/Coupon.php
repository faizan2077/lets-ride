<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = [
        'id',
        'coupon_number',
        'type',
        'discount',
        'expiry_date',
        'status',
    ];

}
