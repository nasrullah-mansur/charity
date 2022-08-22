<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileUpdateRequest extends FormRequest
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
        $user = User::where('id', Auth::id())->first();
        if($user->email == $this->request->get('email')){
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required | email',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',

            ];
        } else{
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required | email | unique:users',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',

            ];
        }

    }
}
