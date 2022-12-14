<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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

            'pl_name' => 'required | max: 255',
            'sl_name' => 'max: 255',

        ];
    }

    public function messages()
    {
        return [
            'pl_name.required' => 'The Tag name field must not be empty',
            'sl_name.required' => 'The Tag name field must not be empty',
        ];
    }
}
