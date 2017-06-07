<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaTheLoaiRequest extends FormRequest
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
             'txtCateName' => 'required|min:3|max:50'
        ];
    }


    public function messages() 
    {
        return [
            'txtCateName.required'  => 'Vui lòng nhập tên thể loại',
            'txtCateName.min'       => 'Tên thể loại quá ngắn',
            'txtCateName.max'       => 'Tên thể loại quá dài'
        ];
    }
}
