<?php

namespace App\Http\Requests\API\Admin\Busses;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends BaseAPIRequest {

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
            'coupon_number' => ["required", "unique:Coupons,deleted_at,NULL", Rule::unique('Coupons')->where(function ($query) {
                    $query = $query->where('deleted_at', NULL);
                    return $query;
                })],
                "type" => "required|string",
                'discount' => "required|string",
                'expiry_date' => "required",
                'status' => "required",

                 ];
    }

}
