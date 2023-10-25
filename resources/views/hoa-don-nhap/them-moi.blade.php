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
    <h1 class="h2">Thêm phiếu nhập</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="nha-cung-cap" class="form-label">Nhà cung cấp</label>
        <select name="nha_cung_cap" class="form-control" id="nha-cung-cap">
            <option value="" selected>Chọn nhà cung cấp</option>
            @foreach($dsNhaCungCap as $nhaCungCap)
            <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_ncc }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="nhan-vien" class="form-label">Nhân viên</label>
        <select name="nhan_vien" class="form-control" id="nhan-vien">
            <option value="" selected>Chọn nhân viên</option>
            @foreach($dsNhanVien as $nhanVien)
            <option value="{{ $nhanVien->id }}">{{ $nhanVien->ho_ten }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thêm sản phẩm</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="san-pham" class="form-label">Sản phẩm</label>
        <select name="san_pham" class="form-control" id="san-pham">
            <option value="" selected>Chọn sản phẩm</option>
            @foreach($dsSanPham as $sanPham)
            <option value="{{ $sanPham->id }}">{{ $sanPham->ten }}</option>
            @endforeach
        </select>
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
        <label for="gia-nhap" class="form-label">Giá nhập</label>
        <input type="text" name="gia_nhap" class="form-control" id="gia-nhap">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="gia-ban" class="form-label">Giá bán</label>
        <input type="text" name="gia_ban" class="form-control" id="gia-ban">
    </div>
</div>

<div class="row pt-3">
    <div class="col-md-12">
        <button class="btn btn-primary" id="btn-them">Thêm</button>
    </div>
</div>

<form method="post" action="{{ route('hoa-don-nhap.xl-them-moi') }}">
    @csrf
    <table class="table table-bordered mt-4" id="tb-san-pham">
        <thead>
            <tr>
                <th>STT</th>
                <th>Nhân viên</th>
                <th>Nhà cung cấp</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="row pt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="btn-luu">Lưu</button>
        </div>
    </div>
</form>
@endsection(content)

@section('page-js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-them").click(function() {
            var stt = $('#tb-san-pham tbody tr').length + 1;
            var nccId = $('#nha-cung-cap').val();
            var tenNcc = $("#nha-cung-cap option:selected").text();
            var nvId = $('#nhan-vien').val();
            var tenNv = $("#nhan-vien option:selected").text();
            var tenSp = $("#san-pham option:selected").text();
            var spId = $("#san-pham").val();
            var soLuong = $("#so-luong").val();
            var giaNhap = $("#gia-nhap").val();
            var giaBan = $("#gia-ban").val();

            if (nccId === "" || nvId === "" || spId === "" || soLuong === "" || giaNhap === "" || giaBan === "") {
                alert("Vui lòng điền đầy đủ thông tin sản phẩm.");
                return;
            }

            var thanhTien = soLuong * giaNhap;
            var buttons = `
            <td class="d-flex justify-content-center">
                <a class="btn btn-outline-danger btn-sm" id="btn-xoa">Xóa</a>
            </td>`;
            var row = `<tr> 
                <td>${stt}</td>
                <td>${tenNv}<input type="hidden" name="nvId" value="${nvId}"/></td>
                <td>${tenNcc}<input type="hidden" name="nccId" value="${nccId}"/></td>
                <td>${tenSp}<input type="hidden" name="spId[]" value="${spId}"/></td>         
                <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
                <td>${giaNhap}<input type="hidden" name="giaNhap[]" value="${giaNhap}"/></td>
                <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
                <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
                ${buttons}
                </tr>`;

            $("#tb-san-pham tbody").append(row);

            $("#nha-cung-cap").val("");
            $("#nhan-vien").val("");
            $("#san-pham").val("");
            $("#so-luong").val("");
            $("#gia-nhap").val("");
            $("#gia-ban").val("");
        });
    });

    $("#tb-san-pham").on("click", "#btn-xoa", function() {
        $(this).closest("tr").remove();
    });

    $("#btn-luu").click(function() {
        if ($("#tb-san-pham tbody tr").length === 0) {
            event.preventDefault();
            alert("Bảng sản phẩm không có dữ liệu. Vui lòng thêm sản phẩm trước khi lưu.");
        }
    });
</script>
@endsection(page-js)