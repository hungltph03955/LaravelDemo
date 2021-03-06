<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemTinTucRequest extends FormRequest
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
             'txtName'      => 'required|unique:tintuc,TieuDe|min:3|max:50',
             'slcLoaiTin'   => 'required',
             'txtIntro'     => 'required',
             'txtContent'   => 'required',
             'fImages'      => 'required|image'
        ];
    }

    public function messages() 
    {
        return [
            'txtName.required'      => 'Vui lòng nhập tiêu đề tin',
            'txtName.unique'        => 'Tiêu đề tin đã trùng',
            'txtName.min'           => 'Tiêu đề quá ngắn',
            'txtName.max'           => 'Tiêu đề quá dài',
            'slcLoaiTin.required'   => 'Hãy Chọn loại tin',
            'txtIntro.required'     => 'hãy nhập Tóm tắt tin',
            'txtContent.required'   => 'Hãy Nhập Nội dung tin',
            'fImages.required'      => 'Hãy nhập hình ảnh tin',
            'fImages.image'         => 'Ảnh tin không đúng định dạng'
        ];
    }
}
