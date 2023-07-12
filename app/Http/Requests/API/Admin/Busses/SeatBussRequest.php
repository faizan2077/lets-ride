<?php

namespace App\Http\Requests\API\Admin\Busses;
use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class SeatBussRequest extends BaseAPIRequest {

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


            'seat_no' => "required",
            'buss_id' => "required|exists:busses,id",

                ];
    }

}
