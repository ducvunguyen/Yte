<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditServiceRequest extends FormRequest
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
            'title_pa' => 'required|min:3',
            'image.*' => 'required|mimes:jpeg,bmp,png',
            'title_child' => 'required|min:3',
            'package_id' => 'required',
            'content' => 'required|min:3',
        ];
    }

    public function messages(){
        return[
            'title_pa.min' => 'Tieu de cha phai lon hon 3 kys tu',
            'title_pa.required' => 'Tieu de khong duoc de trong',
            'image.required' => 'Chua co icon',
            'image.mimes' => 'Chua dung dinh dang anh',
            'package_id' =>'Ban chua nhap id goi tri lieu',
            'content.required' => 'Ban chua nhap noi dung mieu ta',
            'content.min' => 'phai 3 ky tu tro len',
        ];
    }
}
