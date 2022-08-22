<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharityFeatureRequest extends FormRequest
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

            'pl_title_01' => 'required | max:191',
            'pl_title_02' => 'required | max:191',
            'pl_title_03' => 'required | max:191',
            'pl_title_04' => 'required | max:191',

            'pl_subtitle_01' => 'required',
            'pl_subtitle_02' => 'required',
            'pl_subtitle_03' => 'required',
            'pl_subtitle_04' => 'required',
            
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }
}
