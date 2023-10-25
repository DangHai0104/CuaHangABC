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
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('san-pham.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</td>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                <th>Thông tin</th>
                <th>Trạng thái</th>
                <th>Hình ảnh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($dsSanPham as $sanPham)
            <tr>
                <td>{{ $sanPham->id }}</td>
                <td>{{ $sanPham->ten }}</td>
                <td>{{ $sanPham->loaiSanPham->ten_loai }}</td>
                <td>{{ $sanPham->gia }}</td>
                <td>{{ $sanPham->so_luong }}</td>
                <td>{{ $sanPham->mo_ta }}</td>
                <td>{{ $sanPham->trang_thai }}</td>
                <td><a href="{{ route('san-pham.danh-sach-anh', ['id' => $sanPham->id]) }}" type="button" class="btn btn-outline-primary btn-sm">Xem ảnh</a></td>
                <td>
                    <a href="{{ route('san-pham.cap-nhat', ['id' => $sanPham->id]) }}" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> | <a href="{{ route('san-pham.xoa', ['id' => $sanPham->id]) }}" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
                </td>
            </tr>
            <tr>
                @empty
            <tr>
                <td colspan=7>Không có dữ liệu</td>
            </tr>
            @endforelse
        <tbody>
    </table>
</div>
@endsection