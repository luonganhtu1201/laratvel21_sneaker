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
            'name.required' => ':attribute không được để trống .',
            'name.min' => ':attribute quá ngắn .',
            'name.max' => ':attribute quá dài .',

            'email.email' => ':attribute sai định dạng (vd : example@abc.com) .',

            'phone.required' => ':attribute không được để trống .',
            'phone.digits_between' => ':attribute sai định dạng .',
            'phone.regex' => ':attribute phải bắt đầu bằng số 0 .',

            'address.required' => ':attribute không được để trống .',

            'avatar.file' => ':attribute sai định dạng .' ,
            'avatar.mimes' => ':attribute sai định dạng .' ,
            'avatar.max' => 'Dung lượng file :attribute quá lớn .' ,
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'avatar'=> 'Ảnh',
        ];
    }
}
