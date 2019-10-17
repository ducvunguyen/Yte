<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOurteamRequest extends FormRequest
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
            'position' => 'required|min:3',
            'image' => 'required|mimes:jpeg,bmp,png',
            'content' =>'required',
        ];

    }
     public function messages()
    {
        return [
            'name.required' => ':attribute: Tên gói sản phẩm không được để trống ',
            'name.min' => ':attribute: Tên gói sản phẩm, ký tự phải từ 3 ký tứ trở lên',
            'position.required' => ':attribute: không được để trống địa chỉ',
            'position.min' => ':attribute: Địa chỉ, ký tự phải từ 3 ký tứ trở lên',
            'image.required' => 'Chua co anh banner',
            'image.mimes' => 'Chua dung dinh dang anh',
            'content.required' => ':attribute: Miêu ta nội dung, không được để trống',
            'content.min' => ':attribute: Miêu tả nội dung, ký tự phải từ 3 ký tứ trở lên',
        ];
    }
}
