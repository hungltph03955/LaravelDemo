@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.warning')
                <form action="" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtName" placeholder="Hãy nhập Tiêu đề Tin" value="{!! old('txtName') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Thể Loại</label>
                            <select class="form-control" id="TheLoai" >
                                @foreach($theloai as $item_theloai)
                                    <option value="{{ $item_theloai['id'] }}">{{ $item_theloai['Ten'] }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                            <select class="form-control" name="slcLoaiTin" id="loaiTin">
                                @foreach($loaitin as $item_loaitin)
                                    <option value="{{ $item_loaitin['id'] }}">{{ $item_loaitin['Ten'] }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" checked="" type="radio">Không 
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Tin Tức</button>
                    <button type="reset" class="btn btn-default">Đặt Lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
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