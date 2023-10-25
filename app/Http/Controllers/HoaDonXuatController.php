<?php

namespace App\Http\Controllers;

use App\Models\HoaDonXuat;
use App\Models\ChiTietHoaDonXuat;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class HoaDonXuatController extends Controller
{
    public function danhSach()
    {
        $dsHoaDon = HoaDonXuat::all();
        return view("hoa-don-xuat.danh-sach", compact("dsHoaDon"));
    }

    public function chiTietHoaDon($id)
    {
        $dsSanPham = SanPham::all();
        $dsChiTietHoaDon = ChiTietHoaDonXuat::where('hoa_don_xuat_id', $id)->get();
        return view("hoa-don-xuat.chi-tiet", compact('dsSanPham', 'dsChiTietHoaDon'));
    }
    public function themMoi()
    {
        $dsKhachHang = KhachHang::all();
        $dsSanPham = SanPham::all();
        $dsNhanVien = NhanVien::all();
        return view('hoa-don-xuat.them-moi', compact('dsKhachHang', 'dsSanPham', 'dsNhanVien'));
    }

    public function xuLyThemMoi(Request $request)
    {
        // dd($request->all());
        $hoaDonXuat = new HoaDonXuat();
        $hoaDonXuat->khach_hang_id = $request->khId;
        $hoaDonXuat->nhan_vien_id = $request->nvId;
        $hoaDonXuat->save();

        $tongTien = 0;
        for ($i = 0; $i < count($request->spId); $i++) {
            $ctHoaDon = new ChiTietHoaDonXuat();
            $ctHoaDon->hoa_don_xuat_id = $hoaDonXuat->id;
            $ctHoaDon->san_pham_id = $request->spId[$i];
            $ctHoaDon->so_luong = $request->soLuong[$i];
            $ctHoaDon->gia_ban = $request->giaBan[$i];
            $ctHoaDon->thanh_tien = $request->thanhTien[$i];
            $ctHoaDon->save();

            $sanPham = SanPham::find($ctHoaDon->san_pham_id);
            $sanPham->so_luong += $ctHoaDon->so_luong;
            $sanPham->gia_ban = $ctHoaDon->gia_ban;

            $tongTien += $ctHoaDon->thanh_tien;
        }
        $hoaDonXuat->tong_tien = $tongTien;
        $hoaDonXuat->save();

        $sanPham = SanPham::find($ctHoaDon->san_pham_id);
        $sanPham->so_luong -= $ctHoaDon->so_luong;
        $sanPham->save();

        return redirect()->route('hoa-don-xuat.them-moi')->with(['thong_bao' => "Thêm hóa đơn xuất thành công"]);
    }
}
