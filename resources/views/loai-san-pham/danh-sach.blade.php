@extends('master')

@section('sw')
    @if(session('thong_bao'))
    <script>
        Swal.fire("{{ session('thong_bao') }}");
    </script>
    @endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH LOẠI SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('loai-san-pham.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tr>
            <th>Id</td>
            <th>Tên</th>
            <th></th>
        </tr>
        <tbody>
            @forelse($dsLoaiSanPham as $loaiSanPham)
            <tr>

                <td style="width: 200px">{{ $loaiSanPham->id }}</td>
                <td style="width: 40%">{{ $loaiSanPham->ten_loai }}</td>
                <td>
                    <a href="{{ route('loai-san-pham.cap-nhat', ['id'=>$loaiSanPham->id]) }}" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> | <a href="{{ route('loai-san-pham.xoa', ['id'=>$loaiSanPham->id]) }}" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
                </td>
                @empty
            <tr>
                <td colspan=7>Không có dữ liệu</td>
            </tr>
            @endforelse
        <tbody>
    </table>
</div>
@endsection