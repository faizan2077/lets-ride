<?php

namespace App\Http\Requests\API\MobileApp\Auth\Driver;

use App\Http\Requests\API\BaseAPIRequest;

class DriverLoginRequest extends BaseAPIRequest {

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
            'phone' => 'required|exists:drivers', //|',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'phone.exists' => 'These credentials do not match our records.'
        ];
    }

}
