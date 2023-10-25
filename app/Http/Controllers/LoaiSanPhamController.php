<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function danhSach()
    {
        $dsLoaiSanPham = LoaiSanPham::all();
        return view('loai-san-pham.danh-sach', compact('dsLoaiSanPham'));
    }

    public function themMoi()
    {
        $dsLoaiSanPham = LoaiSanPham::all();
        return view('loai-san-pham.them-moi', compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->ten_loai = $request->ten_loai;
        $loaiSanPham->save();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Thêm mới loại sản phẩm thành công"]);
    }

    public function capNhat($id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        return view('loai-san-pham.cap-nhat', compact('loaiSanPham'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        $loaiSanPham->ten_loai = $request->ten_loai;
        $loaiSanPham->save();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật loại sản phẩm thành công"]);
    }

    public function xoa($id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        $loaiSanPham->delete();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Xóa sản phẩm thành công"]);
    }
}
