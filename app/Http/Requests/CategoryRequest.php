<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if($this->request->get('edit_id'))
        {
            $category = Category::where('id' , $this->request->get('edit_id'))->first();
            if($category->pl_name == $this->request->get('pl_name')){
                return [
                    'pl_name' => 'required | max:255',
                    'sl_name' => 'required | max:255',
                ];
            }
        else{
            return [
                'pl_name' => 'required | max:255 | unique:categories',
                'sl_name' => 'required | max:255',
            ];
        }

        }
        return [
            'pl_name' => 'required | max:255| unique:categories',
            'sl_name' => 'max:255',
        ];
    }

    public function messages()
    {
        return [

            'pl_name.required' => 'The Category name filed must not be empty',
            'pl_name.unique' => 'The Category name has already been taken.',
            'sl_name.required' => 'The '.secondaryLang().' name filed must not be empty',
        ];
    }
}
