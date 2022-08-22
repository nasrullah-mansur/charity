<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AdminCurrentPasswordCheckRule;


class AdminPasswordUpdateRequest extends FormRequest
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
            'current_password' => ['required', new AdminCurrentPasswordCheckRule() ],
            'password' => ['required', 'min:6','confirmed','different:current_password'],
            'password_confirmation' => ['required'],
        ];
    }
}
