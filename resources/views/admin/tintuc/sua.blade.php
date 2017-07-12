@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.warning')
                         <form action="" method="POST" enctype='multipart/form-data'>
                            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input class="form-control" value="{{ old('txtName',isset($tintuc['TieuDe']) ? $tintuc['TieuDe'] : null) }}" name="txtName" placeholder="Hãy nhập Tiêu đề Tin" />
                                </div>
                                <div class="form-group">
                                    <label>Thể Loại</label>
                                        <select class="form-control" id="TheLoai" >
                                            @foreach($theloai as $item_theloai)
                                                <option 
                                                @if($tintuc->loaitin->theloai->id == $item_theloai['id'])
                                                    {{"selected"}}
                                                @endif
                                                 value="{{ $item_theloai['id'] }}">{{ $item_theloai['Ten'] }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Loại Tin</label>
                                        <select class="form-control" name="slcLoaiTin" id="loaiTin">
                                            @foreach($loaitin as $item_loaitin)
                                                <option
                                                @if($tintuc->loaitin->id == $item_loaitin['id'])
                                                    {{"selected"}}
                                                @endif   
                                                 value="{{ $item_loaitin['id'] }}">{{ $item_loaitin['Ten'] }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Tóm Tắt</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="txtIntro">
                                        {{ old('txtIntro',isset($tintuc['TomTat']) ? $tintuc['TomTat'] : null) }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="txtContent">
                                        {{ old('txtContent',isset($tintuc['NoiDung']) ? $tintuc['NoiDung'] : null) }}
                                    </textarea>
                                </div>
                                 <div class="form-group">
                                    <label>Hình Ảnh Hiện tại :</label>
                                    <input type="hidden" value="{{ old('txtContent',isset($tintuc['Hinh']) ? $tintuc['Hinh'] : null) }}" name="fImagesOld">
                                    <br/>
                                    <img style="width: 26%;margin-top: 11px;" src="{!! asset('public/upload/tintuc/'.$tintuc['Hinh']) !!}">
                                </div>
                                <div class="form-group">
                                    <label>Hình Ảnh</label>
                                    <input type="file" name="fImages">
                                </div>
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="0"
                                        @if($tintuc['NoiBat'] == 0)
                                            {{"checked"}}
                                        @endif
                                         checked="" type="radio">Không
                                    </label>
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="1"
                                        @if($tintuc['NoiBat'] == 1)
                                            {{"checked"}}
                                        @endif
                                         type="radio">Có
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Sửa Tin Tức</button>
                                <button type="reset" class="btn btn-default">Đặt Lại</button>
                            <form>
                    </div>
                </div>
                <!-- /.row -->
                <!-- commentList -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Các Bình luận
                            <small>Danh Sách</small>
                        </h1>
                    </div>

                    @include('admin.blocks.error')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Thứ Tự</th>
                                <th>Người Bình Luận</th>
                                <th>nội dung</th>
                                <th>Ngày</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $stt = 0 ?>
                         @foreach($tintuc->comment as $item_cm)
                         <?php $stt++ ?>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $stt }}</td>
                                <td>{{ $item_cm->user->name }}</td>
                                <td>{{ $item_cm->NoiDung }}</td>
                                <td><?php \Carbon\Carbon::setLocale('vi')  ?>
                                {{ \Carbon\Carbon::createFromTimestamp(strtotime($item_cm["created_at"]))->diffForHumans() }}
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('getcommentXoa',['id'=>$item_cm->id,'idTinTuc'=>$tintuc->id] ) }}" onclick ="return xacnhanxoa('Bạn có chắc chắn muốn xóa')"> Delete</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- commentList -->

<!--  $item_cm->id }}/{{ $tintuc->id }} -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#TheLoai').change(function(){
                var idTheLoai = $(this).val();
                $.get("http://localhost/LaravelDemo/public/admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#loaiTin").html(data); 
                });
            });       
        });
    </script>
@endsection