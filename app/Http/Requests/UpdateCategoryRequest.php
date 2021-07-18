<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải chứa ít nhất 5 ký tự',
            'name.max' => ':attribute chỉ chứa tối đa 100 ký tự',
            'name.unique' =>':attribute đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
        ];
    }
}
