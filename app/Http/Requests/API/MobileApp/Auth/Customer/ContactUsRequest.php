<?php

namespace App\Http\Requests\API\MobileApp\Auth\Customer;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class ContactUsRequest extends BaseAPIRequest {

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
            'name' => 'required',
            'email_id' => 'required',
            'message' => 'required',
        ];
    }

}
