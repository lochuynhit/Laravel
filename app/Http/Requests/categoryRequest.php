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
            'txtCateName'   =>  'required|unique:categories,name_cate' //required: no space, unique: only
        ];
        
    }
    public function messages () {
        return [
        'txtCateName.required'  =>  'Enter Name Categories, Please',
        'txtCateName.unique'    =>  'This name is exists'
        ];

    }
}
