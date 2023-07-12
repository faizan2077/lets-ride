<?php

namespace App\Http\Requests\API\Admin\PaymentWallet;

use App\Http\Requests\API\BaseAPIRequest;
use Illuminate\Validation\Rule;

class AddPaymentWalletRequest extends BaseAPIRequest {

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
            // 'customer_id' => ["required", "unique:payment_wallets,deleted_at,NULL", Rule::unique('payment_wallets')->where(function ($query) {
            //     $query = $query->where('deleted_at', NULL);
            //     return $query;
            // })],
            'customer_id' => "required",
            'my_balance' => "required",
        ];
    }

}
