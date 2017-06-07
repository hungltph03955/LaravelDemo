<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemTheLoaiRequest;
use App\Http\Requests\SuaTheLoaiRequest;
use App\TheLoai;
use DateTime,File;

class TheLoaiController extends Controller
{
    public function gettheloaiDanhSach() 
    {
    	$theloai = TheLoai::select('id','Ten','TenKhongDau','created_at','updated_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }


    public function gettheloaiThem() 
    {
    	return view('admin.theloai.them');
    }
    
    public function posttheloaiThem(ThemTheLoaiRequest $request)
    {
    	$TheLoai 				= new TheLoai;
    	$TheLoai->Ten 			= $request->txtCateName;
    	$TheLoai->TenKhongDau 	= str_slug($TheLoai->Ten,'-');
    	$TheLoai->created_at 	= new DateTime();
    	$TheLoai->save();
    	return redirect()->route('gettheloaiDanhSach')->with(['flash_level' =>'success','flash_message' => 'Thêm Thể loại thành công']);
    }

    public function gettheloaiSua($id) 
    {
    	$theloai = TheLoai::findOrFail($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function posttheloaiSua(SuaTheLoaiRequest $request,$id) 
    {
    	$TheLoai = TheLoai::findOrFail($id);
    	$TheLoai->Ten 			= $request->txtCateName;
    	$TheLoai->TenKhongDau 	= str_slug($TheLoai->Ten,'-');
    	$TheLoai->created_at 	= new DateTime();
    	$TheLoai->save();
    	return redirect()->route('gettheloaiDanhSach')->with(['flash_level' =>'success','flash_message' => 'Sửa Thể loại thành công']);
    }
    public function gettheloaiXoa($id) 
    {
    	$TheLoai = TheLoai::findOrFail($id);
    	$TheLoai->delete($id);
    	return redirect()->route('gettheloaiDanhSach')->with(['flash_level' =>'success','flash_message' => 'Xóa Thể loại thành công']);
    }


}
