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
    <h1 class="h2">DANH SÁCH HÓA ĐƠN BÁN HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('hoa-don-xuat.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ngày tạo hóa đơn</th>
                <th>Người tạo</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($dsHoaDon as $hoaDon)
            <tr>
                <td>{{ $hoaDon->id }}</td>
                <td>{{ $hoaDon->ngay_tao_hd }}</td>
                <td>{{ $hoaDon->nhanVien->ho_ten }}</td>
                <td>{{ $hoaDon->khachHang->ten_kh }}</td>
                <td>{{ $hoaDon->tong_tien }}</td>
                <td>{{ $hoaDon->trang_thai }}</td>
                <td>
                    <a href="{{ route('hoa-don-xuat.chi-tiet', ['id' => $hoaDon->id]) }}" type="button" class="btn btn-outline-primary btn-sm">Chi tiết</a> |
                    <a href="" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> |
                    <a href="" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection