<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'txtUser'   =>  'required|unique:users,username',
            'txtPass'   =>  'required',
            'txtRePass'   =>  'required|same:txtPass',
            'txtEmail'   =>  'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',
        ];
    }
    public function messages(){
        return [
            'txtUser.required'  =>  'Enter UserName, Please',
            'txtUser.unique'  =>  'UserName Exists, Please',
            'txtPass.required'  =>  'Enter PassWord, Please',
            'txtRePass.required'  =>  'Enter Re-PassWord, Please',
            'txtRePass.same'  =>  'Enter Re-PassWord Wrong, Please',
            'txtEmail.required'  =>  'Enter Email, Please',
            'txtEmail.regex'  =>  'Enter ex: test@email.com'
        ];
    }
}
