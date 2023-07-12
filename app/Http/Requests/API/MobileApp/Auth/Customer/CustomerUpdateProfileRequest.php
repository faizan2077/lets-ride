<?php

namespace App\Http\Requests\API\MobileApp\Auth\Customer;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CustomerUpdateProfileRequest extends BaseAPIRequest {

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
        $customerId = $request["customer_id"] ?? NULL;

        return [
            'phone' => ["required", "unique:customers,deleted_at,NULL", Rule::unique('customers')->where(function ($query) use ($customerId) {
                    $query = $query->where('deleted_at', NULL);
                    $query = $query->where('id', "!=", $customerId);
                    return $query;
                })],
            'email' => 'sometimes|email'
        ];
    }

}
