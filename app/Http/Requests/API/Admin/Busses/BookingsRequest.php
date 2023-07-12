<?php

namespace App\Http\Requests\API\Admin\Busses;
use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class BookingsRequest extends BaseAPIRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'ticket_no' => ["required", "unique:bookings,deleted_at,NULL", Rule::unique('bookings')->where(function ($query) {
                    $query = $query->where('deleted_at', NULL);
                    return $query;
                })],

                'buss_id' => "required|exists:busses,id",
                'pickup_buss_stop_id' => "required",
                'dropoff_buss_stop_id' => "required",
                'route_id' => "required|exists:routes,id",
                'customer_id' => "required|exists:customers,id",
                'customer_name' => "required",
                'total_buss_stops_covered' => "required",
                'total_passengers' => "required",
                'total_seats' => "required",
                'total_fare' => "required",
                'is_paid' => "required",
                'travel_started_at' => "required",
                'travel_ended_at' => "required",
                'coupon_number' => "exists:coupons,id",
                'discount' => "exists:coupons,id",
                'seat_no' => "required",
                'booking_date'=>"required",

                // 'bookings' => "required|array",
                // 'bookings.*' => "required|array",
                // 'bookings.*.passenger_phone' => "required",
                // 'bookings.*.passenger_name' => "required",
                // 'bookings.*.passenger_cnic' => "required",
                // 'bookings.*.passenger_age' => "required",

                 ];
    }

}
