@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI KHÁCH HÀNG</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('khach-hang.xl-them-moi') }}" enctype="multipart/form-data">
    <div class="col-12">
        @csrf
        <!-- <div class="row">
            <div class="col-md-6">
                <label for="avatar" class="form-label">Avatar</label>
                    <input class="d-block" type="file" name="avatar">
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-6">
                <label for="ten-kh" class="form-label">Tên khách hàng</label>
                <input type="text" name="ten_kh" class="form-control" id="ten-kh">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="ten-dang-nhap" class="form-label">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" class="form-control" id="ten-dang-nhap">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="mat-khau" class="form-label">Mật khẩu</label>
                <input type="password" name="mat_khau" class="form-control" id="mat-khau">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="dien-thoai" class="form-label">Điện thoại</label>
                <input type="text" name="dien_thoai" class="form-control" id="dien-thoai">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="dia-chi" class="form-label">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" id="dia-chi">
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