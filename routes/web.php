<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'admin'],function(){
	Route::group(['prefix' => 'theloai'],function(){
		Route::get('danhsach',['as'=>'gettheloaiDanhSach','uses'=>'TheLoaiController@gettheloaiDanhSach']);
		Route::get('them',['as'=>'gettheloaiThem','uses'=>'TheLoaiController@gettheloaiThem']);
		Route::post('them',['as'=>'posttheloaiThem','uses'=>'TheLoaiController@posttheloaiThem']);


		Route::get('sua/{id}',['as'=>'gettheloaiSua','uses'=>'TheLoaiController@gettheloaiSua'])->where('id', '[0-9]+');
		Route::post('sua/{id}',['as'=>'posttheloaiSua','uses'=>'TheLoaiController@posttheloaiSua'])->where('id', '[0-9]+');
		Route::get('xoa/{id}',['as'=>'gettheloaiXoa','uses'=>'TheLoaiController@gettheloaiXoa'])->where('id', '[0-9]+');
	});


	/*Route::group(['prefix' => 'loaitin'],function(){
		Route::get('danhsach',['as'=>'getloaitinDanhSach','uses'=>'LoaiTinController@getloaitinDanhSach']);
		Route::get('them',['as'=>'getloaitinThem','uses'=>'TheLoaiController@getloaitinThem']);
		Route::get('sua',['as'=>'getloaitinSua','uses'=>'TheLoaiController@getloaitinSua']);
		Route::get('xoa',['as'=>'getloaitinXoa','uses'=>'TheLoaiController@getloaitinXoa']);
	});*/


});




Route::get('test', function () {
    return view('admin.theloai.danhsach');
});

