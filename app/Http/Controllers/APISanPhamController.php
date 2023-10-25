<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class APISanPhamController extends Controller
{
    public function danhSachSp()
    {
        $dsSanPham = SanPham::with('loaiSanPham')->get();

        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }

    public function chiTietSp($id)
    {
        $sanPham = SanPham::with('loaiSanPham')->find($id);

        if (empty($sanPham)) {
            return response()->json([
                'success' => false,
                'data' => "San pham ID {$id} khong ton tai"
            ]);
        }

        $loaiSanPham = LoaiSanPham::find($sanPham->loai_id);

        return response()->json([
            'success' => true,
            'data' => $sanPham,
            'loai_id' => $loaiSanPham
        ]);
    }

    public function themMoi(Request $request)
    {
        if (empty($request->ten)) {
            return response()->json([
                'success' => false,
                'message' => "Chua nhap ten san pham"
            ]);
        }

        $sanPham = SanPham::where('ten', $request->ten)->first();
        if (!empty($sanPham)) {
            return response()->json([
                'success' => false,
                'message' => "San pham {$request->ten} da ton tai"
            ]);
        }

        $sanPham = new SanPham;
        $sanPham->ten       = $request->ten;
        $sanPham->loai_id   = $request->loai_id;
        $sanPham->gia       = $request->gia;
        $sanPham->so_luong  = $request->so_luong;
        $sanPham->mo_ta     = $request->mo_ta;
        $sanPham->save();

        return response()->json([
            'success' => true,
            'message' => "Them san pham thanh cong"
        ]);
    }

    public function capNhat(Request $request, $id)
    {
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return response()->json([
                'success' => false,
                'message' => "San pham {$id} khong ton tai"
            ]);
        }

        $sanPham->ten        = $request->ten;
        $sanPham->loai_id    = $request->loai_id;
        $sanPham->gia        = $request->gia;
        $sanPham->so_luong   = $request->so_luong;
        $sanPham->mo_ta      = $request->mo_ta;
        $sanPham->trang_thai = $request->trang_thai;
        $sanPham->save();

        return response()->json([
            'success' => true,
            'message' => "Cap nhat san pham thanh cong"
        ]);
    }

    public function xoa($id)
    {
        $sanPham = SanPham::find($id);

        if (empty($sanPham)) {
            return response()->json([
                'success' => false,
                'message' => "San pham {$id} khong ton tai"
            ]);
        }

        $sanPham->delete();

        return response()->json([
            'success' => true,
            'message' => "Xoa san pham thanh cong"
        ]);
    }
}
