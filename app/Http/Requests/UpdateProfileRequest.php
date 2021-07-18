<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|min:5|max:60',
            'email' => 'email',
            'phone' => 'required|digits_between:10,11|regex:/(0)[0-9]{9}/',
            'address' => 'required',
            'avatar' => 'file|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute cannot be blank .',
            'name.min' => ':attribute is too short .',
            'name.max' => ':attribute is too long .',

            'email.email' => 'Wrong :attribute format (ex : example@abc.com) .',

            'phone.required' => ':attribute cannot be blank',
            'phone.digits_between' => ':attribute number is wrong format .',
            'phone.regex' => ':attribute number must start with 0 .',

            'address.required' => ':attribute cannot be blank .',

            'avatar.file' => 'Incorrect :attribute format .' ,
            'avatar.mimes' => 'Incorrect :attribute format .' ,
            'avatar.max' => ':attribute file is too big .' ,
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'avatar'=> 'Image',
        ];
    }
}
