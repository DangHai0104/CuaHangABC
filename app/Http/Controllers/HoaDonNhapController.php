<?php

namespace App\Http\Controllers;

use App\Models\HoaDonNhap;
use App\Models\ChiTietHoaDonNhap;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class HoaDonNhapController extends Controller
{
    public function themMoi()
    {
        $dsNhaCungCap = NhaCungCap::all();
        $dsSanPham = SanPham::all();
        $dsNhanVien = NhanVien::all();
        return view('hoa-don-nhap.them-moi', compact('dsNhaCungCap', 'dsSanPham', 'dsNhanVien'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $hoaDonNhap = new HoaDonNhap();
        $hoaDonNhap->ncc_id = $request->nccId;
        $hoaDonNhap->nhan_vien_id = $request->nvId;
        $hoaDonNhap->save();

        $tongTien = 0;
        for ($i = 0; $i < count($request->spId); $i++) {
            $ctHoaDon = new ChiTietHoaDonNhap();
            $ctHoaDon->hoa_don_nhap_id = $hoaDonNhap->id;
            $ctHoaDon->san_pham_id = $request->spId[$i];
            $ctHoaDon->so_luong = $request->soLuong[$i];
            $ctHoaDon->gia_nhap = $request->giaNhap[$i];
            $ctHoaDon->gia_ban = $request->giaBan[$i];
            $ctHoaDon->thanh_tien = $request->thanhTien[$i];
            $ctHoaDon->save();

            $sanPham = SanPham::find($ctHoaDon->san_pham_id);
            $sanPham->so_luong += $ctHoaDon->so_luong;
            $sanPham->gia_ban = $ctHoaDon->gia_ban;

            $tongTien += $ctHoaDon->thanh_tien;
        }
        $hoaDonNhap->tong_tien = $tongTien;
        $hoaDonNhap->save();

        $sanPham = SanPham::find($ctHoaDon->san_pham_id);
        $sanPham->so_luong += $ctHoaDon->so_luong;
        $sanPham->gia = $ctHoaDon->gia_ban;
        $sanPham->save();

        return redirect()->route('hoa-don-nhap.them-moi')->with(['thong_bao' => "Thêm hóa đơn nhập thành công"]);
    }
}
