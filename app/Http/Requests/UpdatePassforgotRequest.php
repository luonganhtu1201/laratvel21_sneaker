<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassforgotRequest extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
            'email.required' => ':attribute cannot be left blank .',
            'email.email' => 'Wrong :attribute format (ex : example@abc.com) .'
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email'
        ];
    }
}
