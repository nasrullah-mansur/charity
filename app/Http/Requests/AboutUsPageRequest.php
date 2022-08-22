<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsPageRequest extends FormRequest
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
            'pl_title' => 'required',
            'pl_about_us' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'pl_title.required' => 'The Title field must not be empty',
            'pl_about_us.required' => 'The About Us field must not be empty',
        ];
    }
}
