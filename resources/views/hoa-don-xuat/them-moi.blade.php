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
    <h1 class="h2">Thêm hóa đơn xuất</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
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

<div class="row">
    <div class="col-md-6">
        <label for="khach-hang" class="form-label">Khách hàng</label>
        <select name="khach_hang" class="form-control" id="khach-hang">
            <option value="" selected>Chọn khách hàng</option>
            @foreach($dsKhachHang as $khachHang)
            <option value="{{ $khachHang->id }}">{{ $khachHang->ten_kh }}</option>
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
        <label for="gia-ban" class="form-label">Giá bán</label>
        <input type="text" name="gia_ban" class="form-control" id="gia-ban" value="">
    </div>
</div>

<div class="row pt-3">
    <div class="col-md-12">
        <button class="btn btn-primary" id="btn-them">Thêm</button>
    </div>
</div>

<form method="post" action="{{ route('hoa-don-xuat.xl-them-moi') }}">
    @csrf
    <table class="table table-bordered mt-4" id="tb-san-pham">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Nhân viên</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>  
                <th>Số lượng</th>
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
            var nvId = $('#nhan-vien').val();
            var tenNv = $("#nhan-vien option:selected").text();
            var khId = $('#khach-hang').val();
            var tenKh = $("#khach-hang option:selected").text();
            var tenSp = $("#san-pham option:selected").text();
            var spId = $("#san-pham").val();
            var soLuong = $("#so-luong").val();
            var giaBan = $("#gia-ban").val();

            if (khId === "" || nvId === "" || spId === "" || soLuong === "" || giaBan === "") {
                alert("Vui lòng điền đầy đủ thông tin hóa đơn.");
                return;
            }

            var thanhTien = soLuong * giaBan;
            var buttons = `
            <td class="d-flex justify-content-center">
                <a class="btn btn-outline-danger btn-sm" id="btn-xoa">Xóa</a>
            </td>`;
            var row = `<tr> 
                <td>${stt}</td>
                <td>${tenNv}<input type="hidden" name="nvId" value="${nvId}"/></td>
                <td>${tenKh}<input type="hidden" name="khId" value="${khId}"/></td>
                <td>${tenSp}<input type="hidden" name="spId[]" value="${spId}"/></td>         
                <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}"/></td>
                <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}"/></td>
                <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}"/></td>
                ${buttons}
                </tr>`;

            $("#tb-san-pham tbody").append(row);

            $("#khach-hang").val("");
            $("#nhan-vien").val("");
            $("#san-pham").val("");
            $("#so-luong").val("");
            $("#gia-ban").val("");
        });
    });

    $("#tb-san-pham").on("click", "#btn-xoa", function() {
        $(this).closest("tr").remove();
    });

    $("#btn-luu").click(function() {
        if ($("#tb-san-pham tbody tr").length === 0) {
            event.preventDefault();
            alert("Bảng hóa đơn không có dữ liệu.");
        }
    });
</script>
@endsection(page-js)