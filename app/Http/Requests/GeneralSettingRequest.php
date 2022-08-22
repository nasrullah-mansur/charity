<?php

namespace App\Http\Requests;

use App\Rules\MaxWordsRule;
use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
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
            'company_name' =>'required',
            'title' =>'required',
            // 'about_us' =>['required', new MaxWordsRule(25)],
            'pl_about_us' =>'required | max:255',
            'pl' =>'required',
            'sl' =>'required',
            'currency_name' =>'required',
            'currency' =>'required',

        ];
    }

    public function messages()
    {
        return [

            'pl_about_us.required' =>'The About us in'.allSettings('pl').' Language field required',
            'pl.required' =>'The Primary Language field required',
            'sl.required' =>'The Secondary Language field required',
            'currency_name.required' =>'The Currency field required',
            'currency.required' =>'The Currency Symbol field required',

        ];
    }
}
