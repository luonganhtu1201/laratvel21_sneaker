<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'name' => 'required|min:5|max:80',
            'email' => 'email',
            'phone' => 'required|digits_between:10,11|regex:/(0)[0-9]{9}/|unique:suppliers',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải ít nhất 5 ký tự',
            'name.max' => ':attribute nhiều nhất 60 ký tự',

            'email.email' => ':attribute sai định dạng (vd : example@abc.com)',

            'phone.required' => ':attribute không được để trống',
            'phone.digits_between' => ':attribute ít nhất từ 10 kí tự đến nhiều nhất 11 kí tự',
            'phone.regex' => ':attribute phải bắt đầu bằng số 0',

            'address.required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }
}
