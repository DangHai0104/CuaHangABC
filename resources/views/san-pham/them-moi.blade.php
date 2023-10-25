@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('san-pham.xl-them-moi') }}" enctype="multipart/form-data">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="loai-san-pham" class="form-label">Loại sản phẩm</label>
                <select type="text" name="loai_san_pham" class="form-control" id="loai-san-pham">
                    <option selected>Chọn loại sản phẩm</option>
                    @foreach($dsLoaiSanPham as $loaiSanPham)
                    <option value="{{ $loaiSanPham->id }}">{{ $loaiSanPham->ten_loai }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="gia" class="form-label">Giá</label>
                <input type="text" name="gia" class="form-control" id="gia">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="so-luong" class="form-label">Số lượng</label>
                <input type="text" name="so_luong" class="form-control" id="so-luong">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="mo-ta" class="form-label">Mô tả</label>
                <input type="text" name="mo_ta" class="form-control" id="mo-ta">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="hinh-anh" class="form-label">Hình ảnh</label>
                    <input class="d-block" type="file" name="hinh_anh[]" multiple>
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