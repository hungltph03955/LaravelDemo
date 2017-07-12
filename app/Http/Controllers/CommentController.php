<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;

class CommentController extends Controller
{ 
    public function getcommentXoa($id,$idTinTuc) 
    {
    	$Comment         = Comment::findOrFail($id);
        $Comment->delete($id);
         return redirect()->route('gettintucSua',['id'=>$idTinTuc])->with(['flash_level' =>'success','flash_message' => 'Xóa bình luận  thành công !']);
    }
}
