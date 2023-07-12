<?php

namespace App\Http\Requests\API\MobileApp\Auth\Driver;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class DriverUpdateProfileRequest extends BaseAPIRequest {

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
    public function rules(Request $request) {
        $driverId = $request["driver_id"] ?? NULL;

        return [
            'phone' => ["required", "unique:drivers,deleted_at,NULL", Rule::unique('drivers')->where(function ($query) use ($driverId) {
                    $query = $query->where('deleted_at', NULL);
                    $query = $query->where('id', "!=", $driverId);
                    return $query;
                })],
            'email' => 'sometimes|email'
        ];
    }

}
