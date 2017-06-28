<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai) 
    {
    	$loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get()->toArray();
		foreach($loaitin as $item_loaitin)
		{
			echo"<option value='".$item_loaitin['id']."'>".$item_loaitin['Ten']."</option>";
		}
    }
}
