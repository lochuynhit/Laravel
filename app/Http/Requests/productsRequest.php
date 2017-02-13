<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productsRequest extends FormRequest
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
            'txtName'=>'required|unique:products,name_product',
            'fImages'=>'required',
            'txtParent'=>'required',
            'txtPrice'=>'required|numeric',
            'fImages'=>'image|required',
        ];
  
    }
    public function messages(){
        return [
            'txtParent.required' => 'Please, chooes Category',
            'txtName.required' => 'Please, enter Name Product',
            'fImages.required' => 'Please, enter Image Product',
            'txtPrice.numeric' => 'Only enter number in Price',
            'fImages.image'=>'Please, Enter Only File Image',
        ];

    }
}
