<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBannerRequest extends FormRequest
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
            'name' => 'required|min:3',
            'image.*' => 'required|mimes:jpeg,bmp,png',
        ];
    }
    public function messages(){
        return [
            'name.min' => 'Tieu de cha phai lon hon 3 kys tu',
            'name.required' => 'Chua co anh banner',
            'image.mimes' => 'Chua dung dinh dang anh',
        ];
    }
}
