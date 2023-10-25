<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class APILoaiSanPhamController extends Controller
{
    public function danhSachLoaiSp()
    {
        $dsLoaiSanPham = LoaiSanPham::with('dsLoaiSanPham')->get();

        return response()->json([
            'success' => true,
            'data' => $dsLoaiSanPham
        ]);
    }

    public function chiTietLoaiSp($id)
    {
        $loaiSanPham = LoaiSanPham::with('dsLoaiSanPham')->find($id);

        if (empty($loaiSanPham)) {
            return response()->json([
                'success' => false,
                'data' => "Loai san pham ID {$id} khong ton tai"
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $loaiSanPham
        ]);
    }

    public function themMoi(Request $request)
    {
        if (empty($request->ten_loai)) {
            return response()->json([
                'success' => false,
                'message' => "Chua nhap ten loai san pham"
            ]);
        }

        $loaiSanPham = LoaiSanPham::where('ten_loai', $request->ten_loai)->first();
        if (!empty($loaiSanPham)) {
            return response()->json([
                'success' => false,
                'message' => "Loai san pham {$request->ten_loai} da ton tai"
            ]);
        }

        $loaiSanPham = new LoaiSanPham;
        $loaiSanPham->ten_loai = $request->ten_loai;
        $loaiSanPham->save();

        return response()->json([
            'success' => true,
            'message' => "Them loai san pham thanh cong"
        ]);
    }

    public function capNhat(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (empty($loaiSanPham)) {
            return response()->json([
                'success' => false,
                'message' => "Loai san pham {$id} khong ton tai"
            ]);
        }

        $count = LoaiSanPham::where('ten_loai', $request->ten_loai)->count();
        if ($count > 0) {
            return response()->json([
                'success' => false,
                'message' => "Loai san pham da ton tai"
            ]);
        }

        $loaiSanPham->ten_loai = $request->ten_loai;
        $loaiSanPham->save();
        return response()->json([
            'success' => true,
            'message' => "Cap nhat loai san pham thanh cong"
        ]);
    }

    public function xoa($id)
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (empty($loaiSanPham)) {
            return response()->json([
                'success' => false,
                'message' => "San pham {$id} khong ton tai"
            ]);
        }

        $loaiSanPham->delete();
        return response()->json([
            'success' => true,
            'message' => "xoa loai san pham thanh cong"
        ]);
    }

    public function timKiem(Request $request)
    {
        $loaiSanPham = LoaiSanPham::where('ten_loai', $request->ten_loai)->first();
        if (empty($loaiSanPham)) {
            return response()->json([
                'success' => false,
                'message' => $loaiSanPham
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => $loaiSanPham
        ]);
    }
}
