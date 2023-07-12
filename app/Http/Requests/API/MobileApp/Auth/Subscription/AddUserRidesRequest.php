<?php

namespace App\Http\Requests\API\MobileApp\Auth\Subscription;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class AddUserRidesRequest extends BaseAPIRequest {

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
            // 'ride' => ["required", "unique:customers,deleted_at,NULL", Rule::unique('customers')->where(function ($query) {
            //         $query = $query->where('deleted_at', NULL);
            //         return $query;
            //     })],

            'date' => 'required',
            'user_id' => 'required',
            'package_id' => 'required',
            'ride_no'=>'required',
            'ride_fare'=>'required',
            'route_id'=>'required',
        ];
    }

}
