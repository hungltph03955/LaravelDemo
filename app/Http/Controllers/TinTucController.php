<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemTinTucRequest;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use DateTime,File;

class TinTucController extends Controller
{
    public function gettintucDanhSach() 
    {
    	/*$tintuc = TinTuc::select('id','TieuDe','TomTat','Hinh','SoLuotXem','idLoaiTin','created_at','updated_at')->with('loaitin')->orderBy('id','DESC')->get()->toArray();*/
    	$tintuc = TinTuc::select('id','TieuDe','TomTat','Hinh','SoLuotXem','idLoaiTin','created_at','updated_at')->orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function gettintucThem() 
    {
    	$loaitin = LoaiTin::select('id','idTheLoai','Ten')->get()->toArray();
    	$theloai = TheLoai::select('id','Ten')->get()->toArray();
    	return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function posttintucThem(ThemTinTucRequest $request) 
    {
    	$tintuc 					= new TinTuc;
    	$tintuc->TieuDe				= $request->txtName;
    	$tintuc->TieuDeKhongDau 	= str_slug($tintuc->TieuDe,'-');
    	$tintuc->TomTat				= $request->txtIntro;
    	$tintuc->NoiDung			= $request->txtContent;
    	$tintuc->SoLuotXem			= 0;
    	$tintuc->idLoaiTin			= $request->slcLoaiTin;
    	$tintuc->created_at 		= new DateTime();
    	$file 						= $request->file('fImages');
    	if(strlen($file) > 0)
    	{
			$filename  = time() . '.' . $file->getClientOriginalName();
			$destinationPath = 'public\upload\tintuc';
			$file->move($destinationPath,$filename);
			$tintuc->Hinh 		= $filename;
    	}
    	$tintuc->save();
    	return redirect()->route('gettintucDanhSach')->with(['flash_level' =>'success','flash_message' => 'Thêm  tin tức thành công !']);
    }

}
