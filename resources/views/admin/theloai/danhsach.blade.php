@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Danh Sách</small>
                </h1>
            </div>
             @include('admin.blocks.error')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Thứ tự</th>
                        <th>Tên thể loại</th>
                        <th>Thời gian cập nhật</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $stt = 0 ?>
                @foreach($theloai as $item_theloai)
                <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item_theloai['Ten'] }}</td>
                        <td><?php \Carbon\Carbon::setLocale('vi')  ?>
                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($item_theloai["created_at"]))->diffForHumans() }}
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('gettheloaiXoa', ['id' => $item_theloai["id"] ]) }}" onclick ="return xacnhanxoa('Bạn có chắc chắn muốn xóa')">Xóa</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('gettheloaiSua', ['id' => $item_theloai["id"] ]) }}">Sửa</a></td>
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