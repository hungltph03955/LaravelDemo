<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemTinTucRequest;
use App\Http\Requests\SuaTinTucRequest;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use DateTime,File;
use Storage;

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
        $tintuc->NoiBat             = $request->rdoStatus;
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

    public function gettintucSua($id) 
    {
        $loaitin = LoaiTin::select('id','idTheLoai','Ten')->get();
        $theloai = TheLoai::select('id','Ten')->get();
        $tintuc = TinTuc::findOrFail($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function posttintucSua($id,SuaTinTucRequest $request) 
    {
       /* echo "11111";die;*/
        $tintuc                     = TinTuc::findOrFail($id);
        $tintuc->TieuDe             = $request->txtName;
        $tintuc->TieuDeKhongDau     = str_slug($tintuc->TieuDe,'-');
        $tintuc->TomTat             = $request->txtIntro;
        $tintuc->NoiDung            = $request->txtContent;
        $tintuc->SoLuotXem          = 0;
        $tintuc->idLoaiTin          = $request->slcLoaiTin;
        $tintuc->NoiBat             = $request->rdoStatus;
        $tintuc->created_at         = new DateTime();
        $img_current                = $request->fImagesOld;
        $file                       = $request->file('fImages');
        if(strlen($file) > 0)
        {
            $a = 'public\upload\tintuc'. '/' .$img_current;
            if (File::exists($a)) {  
                File::delete($a);
                echo "đã xóa được file file";
            }
            $filename  = time() . '.' . $file->getClientOriginalName();
            $destinationPath = 'public\upload\tintuc';
            $file->move($destinationPath,$filename);
            $tintuc->Hinh       = $filename;
        }
        $tintuc->save();
        return redirect()->route('gettintucDanhSach')->with(['flash_level' =>'success','flash_message' => 'Sửa tin tức thành công !']);
    }

    public function gettintucXoa($id) 
    {
        $tintuc         = TinTuc::findOrFail($id);
        $img_current    = $tintuc->Hinh;
        $AccessFile = 'public\upload\tintuc'. '/' .$img_current;
        if (File::exists($AccessFile)) {  
            File::delete($AccessFile);
            echo "đã xóa được file file";
        }
        $tintuc->delete($id);
         return redirect()->route('gettintucDanhSach')->with(['flash_level' =>'success','flash_message' => 'Xóa tin tức thành công !']);
    }


}
