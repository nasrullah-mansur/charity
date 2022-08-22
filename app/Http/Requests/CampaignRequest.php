<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'category_id' => 'required',
            'pl_title' => 'required | max:255',
            'pl_details' => 'required',
            'goal_amount' => 'required',
            'address' => 'required | max:255',
            'image' => 'required | mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => translation('required_field'),
            'pl_title.required' => translation('required_field'),
            'pl_details.required' => translation('required_field'),
            'goal_amount.required' => translation('required_field'),
            'address.required' => translation('required_field'),
            'image.required' => translation('required_field'),
        ];
    }
}
