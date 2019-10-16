<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAboutRequest extends FormRequest
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
            'title' => 'required|min:3',
            'image.*' => 'required|mimes:jpeg,bmp,png',
            'link' => 'required',
            'content' =>'required',
        ];
    }

    public function messages(){
        return [
            'title.min' => 'Tieu de cha phai lon hon 3 kys tu',
            'title.required' => 'Tieu de khong duoc de trong',
            'image.required' => 'Chua co icon',
            'image.mimes' => 'Chua dung dinh dang anh',
            'link' =>'Link khong duoc de trong',
            'content.required' => 'Ban chua nhap noi dung mieu ta',
        ];
    }
}
