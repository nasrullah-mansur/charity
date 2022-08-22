<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRrequest extends FormRequest
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
        if ($this->request->get('edit_id')) {
            return [
                'pl_title' => 'required | max:255',
                'sl_title' => 'required | max:255',

                'tag' => 'required',
                'category_id' => 'required',

                'pl_description_pre_image' => 'required',
                'sl_description_pre_image' => 'required',
                'image' => 'mimes:jpg, jpeg, png, svg',
            ];
        } else {
            return [
                'pl_title' => 'required',
                'tag' => 'required',
                'category_id' => 'required',
                'pl_description_pre_image' => 'required',
                'primary_image' => 'required | mimes:jpg, jpeg, png, svg',
            ];
        }

    }

    public function messages()
    {
        return [
            'pl_title.required' => 'The Title field must not be empty',
            'sl_title.required' => 'The Title field must not be empty',
            'category_ID.required' => 'The Category field must not be empty',
            'tag.required' => 'The Tag field must not be empty',
            'pl_description_pre_image.required' => 'The Description field must not be empty',
            'sl_description_pre_image.required' => 'The Description field must not be empty',
        ];
    }
}
