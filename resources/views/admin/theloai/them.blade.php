@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.warning')
                        <form action="" method="POST">
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" name="txtCateName" placeholder="Hãy nhập tên thể loại" value="{!! old('txtCateName') !!}" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm Thể Loại</button>
                            <button type="reset" class="btn btn-default">Đặt Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection