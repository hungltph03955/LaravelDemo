<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    public function gettintucDanhSach() 
    {
    	/*$tintuc = TinTuc::select('id','TieuDe','TomTat','Hinh','SoLuotXem','idLoaiTin','created_at','updated_at')->with('loaitin')->orderBy('id','DESC')->get()->toArray();*/

    	$tintuc = TinTuc::select('id','TieuDe','TomTat','Hinh','SoLuotXem','idLoaiTin','created_at','updated_at')->orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
}
