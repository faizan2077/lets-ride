<?php

namespace App\Http\Requests\API\Admin\Routes;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class StoreBussRouteDetailRequest extends BaseAPIRequest {

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
            'buss_id' => "required|exists:busses,id",
            'route_id' => "required|exists:routes,id",
//            'driver_id' => 'required|boolean'
        ];
    }

}
