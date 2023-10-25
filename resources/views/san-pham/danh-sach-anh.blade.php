@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH ẢNH</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('san-pham.danh-sach-anh.them-moi', ['id' => $sanPham->id]) }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</td>
                <th>Hình ảnh</th>
                <th>Chọn</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($dsHinhAnh as $hinhAnh)
                <td>
                    <p style="margin-top: 50px">{{ $hinhAnh->id }}</p>
                </td>
                <td>
                    <img style="width:100px; height:120px" src="{{ asset($hinhAnh->url) }}" alt="Ảnh sản phẩm">
                </td>
                <td>
                    <input type="checkbox" style="margin-top: 50px" name="ids[]" value="{{ $hinhAnh->id }}">
                </td>
                <td>
                    <a style="margin-top: 40px" href="{{ route('san-pham.danh-sach-anh.xoa', ['id' => $hinhAnh->id]) }}" type="button" class="btn btn-outline-danger btn-lg">Xóa</a>
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
@endsection(content)