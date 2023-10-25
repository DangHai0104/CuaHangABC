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
    <h1 class="h2">DANH SÁCH NHÀ CUNG CẤP</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nha-cung-cap.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tr>
            <th>Id</td>
            <th>Tên nhà cung cấp</th>
            <th>Địa chỉ</th>
            <th></th>
        </tr>
        <tbody>
            @forelse($dsNhaCungCap as $nhaCungCap)
            <tr>

                <td style="width: 200px">{{ $nhaCungCap->id }}</td>
                <td style="width: 40%">{{ $nhaCungCap->ten_ncc }}</td>
                <td>{{ $nhaCungCap->dia_chi }}</td>
                <td>
                    <a href="{{ route('nha-cung-cap.cap-nhat', ['id' => $nhaCungCap->id]) }}" type="button" class="btn btn-outline-warning btn-sm">Cập nhật</a> | 
                    <a href="{{ route('nha-cung-cap.xoa', ['id' => $nhaCungCap->id]) }}" type="button" class="btn btn-outline-danger btn-sm">Xóa</a>
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