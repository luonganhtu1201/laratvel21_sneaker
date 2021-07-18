<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassusRequest extends FormRequest
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
            'newpassword' => 'required|min:6|max:50',
            'enterpass' => 'required:newpassword|same:newpassword|min:6|max:50',
        ];
    }
    public function messages()
    {
        return [
            'newpassword.required' => ':attribute can not be blank.',
            'newpassword.min' => ':attribute is too short.',
            'newpassword.max' => ':attribute is too long.',
            'enterpass.required' => ':attribute can not be blank.',
            'enterpass.min' => ':attribute is too short.',
            'enterpass.max' => ':attribute is too long.',
            'enterpass.same' => ':attribute incorrect .',
        ];
    }
    public function attributes()
    {
        return [
            'newpassword' => 'New password',
            'enterpass' => 'Confirmed password',
        ];
    }
}
