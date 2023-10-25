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
    <h1 class="h2">CHI TIẾT HÓA ĐƠN XUẤT</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tr>
            <th>Id</td>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        <tbody>
            @forelse($dsChiTietHoaDon as $chiTietHoaDon)
            <tr>

                <td>{{ $chiTietHoaDon->id }}</td>
                <td>{{ $chiTietHoaDon->sanPham->ten }}</td>
                <td>{{ $chiTietHoaDon->so_luong }}</td>
                <td>{{ $chiTietHoaDon->gia_ban }}</td>
                <td>{{ $chiTietHoaDon->thanh_tien }}</td>
                <td>
                    <a href="" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> |
                    <a href="" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
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