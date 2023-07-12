<?php

namespace App\Http\Requests\API\Admin\Routes;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class StoreRouteRequest extends BaseAPIRequest {

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
            'code' => "required",
            'status' => 'required|boolean',
            'stops' => 'required|array',
            'stops.*' => 'required|array',
            'stops.*.buss_stop_id' => 'required|integer',

//            'route.*.sort_order' => 'required|boolean',
        ];
    }

}
