<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemLoaiTinRequest;
use App\Http\Requests\SuaLoaiTinRequest;
use App\TheLoai;
use App\LoaiTin;
use DateTime,File;

class LoaiTinController extends Controller
{
    public function getloaitinDanhSach() 
    {
    	$loaitin = LoaiTin::select('id','idTheLoai','Ten','TenKhongDau','created_at','updated_at')->with('theloai')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getloaitinThem() 
    {
    	$theloai = TheLoai::select('id','Ten')->get()->toArray();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postloaitinThem(ThemLoaiTinRequest $request) 
    {
    	$Loaitin 				= new LoaiTin;
    	$Loaitin->idTheLoai 	= $request->slcTheLoai;
    	$Loaitin->Ten 			= $request->txtCateName;
    	$Loaitin->TenKhongDau 	= str_slug($Loaitin->Ten,'-');
    	$Loaitin->created_at 	= new DateTime();
    	$Loaitin->save();
    	return redirect()->route('getloaitinDanhSach')->with(['flash_level' =>'success','flash_message' => 'Thêm loại tin thành công !']);
    }


    public function getloaitinSua($id) 
    {
    	$loaitin = LoaiTin::findOrFail($id);
    	$theloai = TheLoai::select('id','Ten')->get()->toArray();
    	return view('admin.loaitin.sua',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postloaitinSua(SuaLoaiTinRequest $request,$id) 
    {
    	$Loaitin = LoaiTin::findOrFail($id);
    	$Loaitin->Ten 			= $request->txtCateName;
    	$Loaitin->idTheLoai 	= $request->slcTheLoai;
    	$Loaitin->TenKhongDau 	= str_slug($Loaitin->Ten,'-');
    	$Loaitin->created_at 	= new DateTime();
    	
    	$Loaitin->save();
    	return redirect()->route('getloaitinDanhSach')->with(['flash_level' =>'success','flash_message' => 'Sửa loại tin thành công !']);
    }

    public function getloaitinXoa($id) 
    {
        echo $id;die;
    }





}
