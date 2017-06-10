<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLoaiTinRequest extends FormRequest
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
            'txtCateName' => 'required|unique:loaitin,Ten|min:3|max:50',
            'slcTheLoai' => 'required'
        ];
    }


    public function messages() 
    {
        return [
            'txtCateName.required'  => 'Vui lòng nhập tên loại tin',
            'txtCateName.unique'    => 'Tên loại tin đã tồn tại',
            'txtCateName.min'       => 'Tên loại tin quá ngắn',
            'txtCateName.max'       => 'Tên loại tin quá dài',
            'slcTheLoai.required'   => 'Vui lòng chọn tên thể loại'
        ];
    }


}
