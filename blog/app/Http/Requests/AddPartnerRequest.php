<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPartnerRequest extends FormRequest
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
            'title' => 'required|min:3|max:60',
            'image' => 'required|mimes:jpeg,bmp,png',
            'content' =>'required',
        ];

    }
     public function messages()
    {
        return [
            'title.required' => ':attribute: Tên gói sản phẩm không được để trống ',
            'title.min' => ':attribute: Tên gói sản phẩm, ký tự phải từ 3 ký tứ trở lên',
            'image.required' => 'Chua co anh banner',
            'image.mimes' => 'Chua dung dinh dang anh',
            'content.required' => ':attribute: Miêu ta nội dung, không được để trống',
            'content.min' => ':attribute: Miêu tả nội dung, ký tự phải từ 3 ký tứ trở lên',
        ];
    }
}
