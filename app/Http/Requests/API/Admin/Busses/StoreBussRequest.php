<?php

namespace App\Http\Requests\API\Admin\Busses;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class StoreBussRequest extends BaseAPIRequest {

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
            'title' => "required",
            'registration_no' => ["required", "unique:busses,deleted_at,NULL", Rule::unique('busses')->where(function ($query) {
                    $query = $query->where('deleted_at', NULL);
                    return $query;
                })],

            'registration_year' => 'required',
            'total_seats' => 'required',
            'is_airconditioned' => 'required|boolean',
            'per_stop_fare' => 'required|integer',
            'status' => 'required|boolean',
            'starting_point' => 'required',
            'ending_point' => 'required',
            'starting_latLng' => 'required',
            'ending_latLng' => 'required',

            ];
    }

}
