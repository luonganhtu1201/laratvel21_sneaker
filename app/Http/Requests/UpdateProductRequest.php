<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'         => 'required|min:10|max:255',
            'origin_price' => 'required|numeric|digits_between:1,9|gte:sale_price',
            'sale_price'   => 'required|numeric|digits_between:1,9',
            'color.*' => 'required',
            'import_goods.*' => 'required|numeric|digits_between:1,4',
            'content' => 'required',

            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:50000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải ít nhất 10 ký tự !',
            'name.max' => ':attribute quá số ký tự !',

            'origin_price.required' => ':attribute không được để trống',
            'origin_price.numeric' => ':attribute phải là số ',
            'origin_price.digits_between' => ':attribute cao nhất là dưới 1 tỷ',
            'origin_price.gte'=>':attribute phải lớn hơn hoặc bằng Giá bán',

            'sale_price.required' => ':attribute này không được để trống',
            'sale_price.numeric' => ':attribute phải là số ',
            'sale_price.digits_between' => ':attribute cao nhất là dưới 1 tỷ',

            'color.*.required' => ':attribute không được để trống',

            'import_goods.*.required' => ':attribute không được để trống',
            'import_goods.*.numeric' => ':attribute phải là số ',
            'import_goods.*.digits_between' => ':attribute chỉ dưới 9.999 đôi',

            'content.required' => ':attribute không được để trống',

            'image.*.mimes' => ':attribute sai định dạng',
            'image.*.max' => ':attribute',

        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên sản phẩm',
            'origin_price' => 'Giá gốc',
            'sale_price' => 'Giá bán',
            'color' => 'Màu sắc',
            'import_goods' => 'Số lượng nhập vào',
            'content' => 'Nội dung',
            'image' => 'Hình ảnh sản phẩm',
        ];

    }
}
