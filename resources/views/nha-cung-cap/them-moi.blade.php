@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI NHÀ CUNG CẤP</h1>
</div>

<form class="row g-3" method="POST" action="">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten-ncc" class="form-label">Tên nhà cung cấp</label>
                <input type="text" name="ten_ncc" class="form-control" id="ten-ncc">
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