<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'category_name'=>'required|unique:categories',

        ];
    }
    public function messages(){
        return[
        'category_name.required'=>'Please Insert a category name',
        'category_name.unique'=>'This category name already Exists',

//            'subcategory_name.required'=>'Please Insert a Subcategory name',
//        'subcategory_name.unique'=>'This Subcategory name already Exists',
        ];
    }
}
