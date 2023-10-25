@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('loai-san-pham.xl-cap-nhat', ['id' => $loaiSanPham->id]) }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten-loai" class="form-label">Tên loại sản phẩm</label>
                <input type="text" name="ten_loai" class="form-control" id="ten-loai" value="{{ $loaiSanPham->ten_loai }}">
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