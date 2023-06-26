<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model {

    use HasFactory;

    protected $fillable = [

'id',
'ticket_no',
'buss_id',
'pickup_buss_stop_id',
'dropoff_buss_stop_id',
'route_id','driver_id',
'customer_id',
'customer_name',
'total_buss_stops_covered',
'total_passengers',
'booking_date',
'seat_no',
'total_seats',
'total_fare',
'is_paid',
'paid_at',
'travel_started_at',
'travel_ended_at',
'booking_status',
'qr_code_image',
'qr_scanned_at',
'deleted_at',
'created_at',
'updated_at',

];

    public function details() {
        return $this->hasOne("App\BookingDetails", "booking_id");
    }

}
