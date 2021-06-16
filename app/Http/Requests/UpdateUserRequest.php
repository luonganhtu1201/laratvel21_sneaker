<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'password' => 'required|min:6|max:50',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'avatar' => 'file|mimes:jpeg,png,jpg,gif,svg|max:50000',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải ít nhất 5 ký tự',
            'name.max' => ':attribute nhiều nhất 60 ký tự',

            'email.email' => ':attribute sai định dạng (vd : example@abc.com)',

            'password.required' => ':attribute không được để trống',
            'password.min' => ':attribute quá ngắn',
            'password.max' => ':attribute chỉ được phép dưới 50 ký tự',

            'phone.required' => ':attribute không được để trống',
            'phone.numeric' => ':attribute phải là số',
            'phone.min' => ':attribute ít nhất 10 ký tự',

            'address.required' => ':attribute không được để trống',

            'avatar.file' => ':attribute sai định dạng' ,
            'avatar.mimes' => ':attribute sai định dạng' ,
            'avatar.max' => ':attribute ' ,

            'gender.required' => ':attribute chưa được chọn',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'avatar'=> 'Ảnh',
        ];
    }
}
