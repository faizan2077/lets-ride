<?php

namespace App\Http\Requests\API\MobileApp\Auth\Driver;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class DriverVerifyIdentityRequest extends BaseAPIRequest {

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
            'selfie' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'license_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cnic_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cnic_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'verify_identity_st' => 'required',
            'id' => 'required|exists:drivers,id',
            'verify_identity_st' => 'required'
        ];
    }

}
