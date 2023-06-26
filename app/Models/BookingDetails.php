<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model {

    use HasFactory;
    protected $table = 'booking_details';
    protected $fillable = [
        'id',
        'booking_id',
        'passenger_name',
        'passenger_age',
        'passenger_cnic',
        'passenger_phone',
        'seat_id',
        'created_at',
        'updated_at',
    ];

    public function booking() {
        return $this->belongsTo("App\Bookings", "booking_id");
    }

}
