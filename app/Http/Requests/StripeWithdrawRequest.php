<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeWithdrawRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stripe_account' => 'required',
            'stripe_card_number' => 'required | digits:16',
        ];
    }

    public function messages()
    {
        return [
            'stripe_account.required' => translation('required_field'),
            'stripe_card_number.required' => translation('required_field')
        ];
    }
}
