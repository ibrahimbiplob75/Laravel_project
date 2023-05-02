<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subCategoryRequest extends FormRequest
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
            'category_id'=>'required',
            //'subCategory_name'=>'required|unique:sub_catergories',
        ];
    }
//    public function messages(){
//        return[
//            'category_id.required'=>'Select Category Name',
//            'subCategory_name.required'=>'Please Insert a Subcategory name',
//            'subCategory_name.unique'=>'This Subcategory name already Exists',
//        ];
//    }
}
