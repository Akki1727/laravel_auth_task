<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required',//|min:10|max:250',
            'post_icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          
            // 'address'=>'required|max:250',
            // 'number'=>'required|min:11|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Max 50 word',
            'description.required' => 'Maximun 250 words Limit',
            // 'password.required' => 'enter max 8 char',
            'post_icon.required'=>'image must be required',
        ];
    }
}
