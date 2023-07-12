<?php

namespace App\Http\Requests\API\Admin\Busses;
use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class BookingDetailsRequest extends BaseAPIRequest {

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
                'passenger_phone' => "required",
                'booking_id' => "required|exists:bookings,id",
                'passenger_name' => "required",
                'passenger_cnic' => "required",
                'passenger_age' => "required",
                'seat_id' => "required",
                 ];
    }

}
