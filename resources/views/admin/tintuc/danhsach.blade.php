@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Danh Sách</small>
                </h1>
            </div>
            @include('admin.blocks.error')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Thứ Tự</th>
                        <th>Tin tức</th>
                        <th>Loại Tin(Thuộc)</th>
                        <th>Thể Loại(Thuộc)</th>
                        <th>Tóm Tắt</th>
                        <th>Hình Ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $stt = 0 ?>
                 @foreach($tintuc as $item_item_tintuc)
                 <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item_item_tintuc->TieuDe }}</td>
                        <td>{{ $item_item_tintuc->loaitin->Ten }}</td>
                        <td>{{ $item_item_tintuc->loaitin->theloai->Ten }}</td>
                        <td>{{ $item_item_tintuc->TomTat }}</td>
                        <td style="width: 14%;">
                            <img style="width: 100%;" src="{!! asset('public/upload/tintuc/'.$item_item_tintuc['Hinh']) !!}" alt=""/>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('gettintucXoa', ['id' => $item_item_tintuc["id"] ]) }}" onclick ="return xacnhanxoa('Bạn có chắc chắn muốn xóa')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('gettintucSua', ['id' => $item_item_tintuc["id"] ]) }}">Edit</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection