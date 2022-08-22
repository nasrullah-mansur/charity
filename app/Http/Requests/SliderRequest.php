<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

            'image' => 'required | mimes:jpeg,jpg,png',
            'pl_title' => 'required | max:255',
            'pl_subtitle' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Slider image field must not be empty',
            'image.mimes' => 'Slider image must be a jpeg, jpg or png type',

            'pl_title' => 'The Title field is required',
            'pl_subtitle' => 'The Subtitle field is required',
        ];
    }
}
