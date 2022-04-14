<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdate extends FormRequest
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
            'gender'=>'required|in:male,female',
            'address'=>'required|check_address',
            'profile_photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'birth_date'=>'required'
        ];
    }

    public function messages()
    {
        return[
           'gender.required'=>'Choose One Option',
           'address.required'=>'please enter address in proper format',
           'profile_photo.required'=>'',
           'birth_date.required'=>'valid formate' 
        ];
    }
}
