@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.warning')
                <form action="" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Thể Loại</label>
                        <input class="form-control" name="txtCateName" value="{{ old('txtTitle',isset($theloai['Ten']) ? $theloai['Ten'] : null) }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Thể Loại</button>
                    <button type="reset" class="btn btn-default">Đặt Lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection