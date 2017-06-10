@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Danh Sách</small>
                </h1>
            </div>
            @include('admin.blocks.error')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Thứ Tự</th>
                        <th>Loại Tin</th>
                        <th>Thể Loại (thuộc)</th>
                        <th>Cập Nhập</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $stt = 0 ?>
                @foreach($loaitin as $item_loaitin)
                <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item_loaitin['Ten'] }}</td>
                        <td>{{ $item_loaitin['theloai']['Ten'] }}</td>
                        <td><?php \Carbon\Carbon::setLocale('vi')  ?>
                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($item_loaitin["created_at"]))->diffForHumans() }}
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('getloaitinXoa', ['id' => $item_loaitin["id"] ]) }}" onclick ="return xacnhanxoa('Bạn có chắc chắn muốn xóa')">Xóa</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('getloaitinSua', ['id' => $item_loaitin["id"] ]) }}">Sửa</a></td>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection