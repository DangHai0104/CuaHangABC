<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    public function danhSach()
    {
        $dsNhaCungCap = NhaCungCap::all();
        return view('nha-cung-cap.danh-sach', compact('dsNhaCungCap'));
    }

    public function themMoi()
    {
        $dsNhaCungCap = NhaCungCap::all();
        return view('nha-cung-cap.them-moi', compact('dsNhaCungCap'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $nhaCungCap = new NhaCungCap();
        $nhaCungCap->ten_ncc = $request->ten_ncc;
        $nhaCungCap->dia_chi = $request->dia_chi;
        $nhaCungCap->save();
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Thêm mới nhà cung cấp thành công"]);
    }

    public function capNhat($id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        return view('nha-cung-cap.cap-nhat', compact('nhaCungCap'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        $nhaCungCap->ten_ncc = $request->ten_ncc;
        $nhaCungCap->dia_chi = $request->dia_chi;
        $nhaCungCap->save();
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Cập nhật nhà cung cấp thành công"]);
    }

    public function xoa($id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        $nhaCungCap->delete();
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Xóa nhà cung cấp thành công"]);
    }
}
