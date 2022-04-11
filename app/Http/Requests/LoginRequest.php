<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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


            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            // 'address'=>'required|max:250',
            // 'number'=>'required|min:11|numeric',

        ];
    }
    public function messages()
    {
        return [

            'email.required' => 'enter proper format',
            'password.required' => 'enter max 8 char',
            // 'number.required'=>'Number in digit',
        ];
    }
}
