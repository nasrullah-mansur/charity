<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripPaymentRequest extends FormRequest
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
            'card_no' => 'required | digits:16',
            'holderName' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'ccv' => 'required | digits:3',
        ];
    }
}
