<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPackagePost extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'address' => 'required|min:3',
            'date' => 'required|min:3',
            'content' =>'required',
        ];

    }
     public function messages()
    {
        return [
            'name.required' => ':attribute: Tên gói sản phẩm không được để trống ',
            'name.min' => ':attribute: Tên gói sản phẩm, ký tự phải từ 3 ký tứ trở lên',
            'address.required' => ':attribute: không được để trống địa chỉ',
            'address.min' => ':attribute: Địa chỉ, ký tự phải từ 3 ký tứ trở lên',
            'date.required' => ':attribute: Ngày, không được để trống',
            'date.min' => ':attribute: Ngày, ký tự phải từ 3 ký tứ trở lên',
            'content.required' => ':attribute: Miêu ta nội dung, không được để trống',
            'content.min' => ':attribute: Miêu tả nội dung, ký tự phải từ 3 ký tứ trở lên',
        ];
    }
}
