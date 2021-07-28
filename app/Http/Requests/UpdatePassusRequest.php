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
            'newpassword.required' => ':attribute không được để trống .',
            'newpassword.min' => ':attribute quá ngắn .',
            'newpassword.max' => ':attribute quá dài .',
            'enterpass.required' => ':attribute không được để trống .',
            'enterpass.min' => ':attribute quá ngắn .',
            'enterpass.max' => ':attribute quá dài .',
            'enterpass.same' => ':attribute không đúng .',
        ];
    }
    public function attributes()
    {
        return [
            'newpassword' => 'Mật khẩu',
            'enterpass' => 'Mật khẩu',
        ];
    }
}
