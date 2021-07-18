<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'email' => 'email|unique:users',
            'password' => 'required|min:6|max:50',
            'enterpass' => 'required:password|same:password|min:6|max:50',
            'phone' => 'required|digits_between:10,11|regex:/(0)[0-9]{9}/',
            'address' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute cannot be left blank .',
            'name.min' => ':attribute is too short .',
            'name.max' => ':attribute is too long .',

            'email.email' => ':attribute is wrong format (ex : example@abc.com) .',
            'email.unique' => ':attribute already registered .',

            'password.required' => ':attribute cannot be left blank .',
            'password.min' => ':attribute is too short .',
            'password.max' => ':attribute is too long .',

            'enterpass.required' => ':attribute can not be blank .',
            'enterpass.min' => ':attribute is too short .',
            'enterpass.max' => ':attribute is too long .',
            'enterpass.same' => ':attribute incorrect .',

            'phone.required' => ':attribute cannot be left blank .',
            'phone.digits_between' => ':attribute number is wrong format .',
            'phone.regex' => ':attribute number must start with 0 .',

            'address.required' => ':attribute cannot be left blank .',

            'gender.required' => ':attribute has not been selected .',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'address' => 'Address',
            'gender' => 'Gender',
            'enterpass' => 'Confirmed password',
        ];
    }
}
