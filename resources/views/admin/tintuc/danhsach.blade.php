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
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Thứ Tự</th>
                        <th>Tin tức</th>
                        <th>Loại Tin(Thuộc)</th>
                        <th>Thể Loại(Thuộc)</th>
                        <th>Tóm Tắt</th>
                        <th>Số lượt Xem</th>
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
                        <td>{{ $item_item_tintuc->SoLuotXem }}</td>
                        <td style="width: 25%;">
                            <img style="width: 20%;" src="{!!  asset('/upload/tintuc/'.$item_item_tintuc['Hinh']) !!}" alt=""/>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
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