<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required | max:255',
            'last_name' => 'required | max:255',
            'email' => 'required | email | max:255',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return  [
            'first_name.required' => translation('required_field'),
            'last_name.required' => translation('required_field'),
            'email.required' => translation('required_field'),
            'message.required' => translation('required_field'),
        ];
    }
}
