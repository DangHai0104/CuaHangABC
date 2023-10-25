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
    <h1 class="h2">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('khach-hang.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</td>
                <th>Tên khách hàng</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($dsKhachHang as $khachHang)
            <tr>
                <td>{{ $khachHang->id }}</td>
                <td>{{ $khachHang->ten_khach_hang }}</td>
                <td>{{ $khachHang->ten_dang_nhap }}</td>
                <td>{{ $khachHang->email }}</td>
                <td>{{ $khachHang->dien_thoai }}</td>
                <td>{{ $khachHang->dia_chi }}</td>
                <!-- <td>{{ $khachHang->trang_thai }}</td> -->
                <td>
                    <a href="{{ route('khach-hang.cap-nhat', ['id'=> $khachHang->id]) }}" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> | <a href="{{ route('khach-hang.xoa', ['id'=> $khachHang->id]) }}" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
                </td>
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