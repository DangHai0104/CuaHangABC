<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class APIKhachHangController extends Controller
{
    public function themMoi(Request $request){
        $khachHang = KhachHang::where('ten_dang_nhap', $request->ten_dang_nhap)->first();
        if (!empty($khachHang)) {
            return response()->json([
                'success' => false,
                'message' => "Ten dang nhap {$request->ten_dang_nhap} da ton tai"
            ]);
        }

        $khachHang = new KhachHang();
        $khachHang->ten_kh = $request->ten_kh;
        $khachHang->ten_dang_nhap = $request->ten_dang_nhap;
        $khachHang->mat_khau = $request->mat_khau;
        $khachHang->email = $request->email;
        $khachHang->dien_thoai = $request->dien_thoai;
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->save();

        return response()->json([
            'success' => true,
            'message' => "Them loai san pham thanh cong"
        ]);
        }
}
