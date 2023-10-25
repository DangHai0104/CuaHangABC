@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('khach-hang.xl-cap-nhat', ['id' => $khachHang->id]) }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten-kh" class="form-label">Tên khách hàng</label>
                <input type="text" name="ten_kh" class="form-control" id="ten-kh" value="{{ $khachHang->ten_kh }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="ten-dang-nhap" class="form-label">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" class="form-control" id="ten-dang-nhap" value="{{ $khachHang->ten_dang_nhap }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="mat-khau" class="form-label">Mật khẩu</label>
                <input type="password" name="mat_khau" class="form-control" id="mat-khau" value="{{ $khachHang->mat_khau }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $khachHang->email }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="dien-thoai" class="form-label">Điện thoại</label>
                <input type="text" name="dien_thoai" class="form-control" id="dien-thoai" value="{{ $khachHang->dien_thoai }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="dia-chi" class="form-label">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" id="dia-chi" value="{{ $khachHang->dia_chi }}">
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</form>
@endsection