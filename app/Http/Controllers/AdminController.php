<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $admin = Admin::where('ten_dang_nhap', $request->ten_dang_nhap)
            ->where('mat_khau', $request->mat_khau)
            ->first();

        if (empty($admin)) {
            return view('dang-nhap')->with('error', 'Thông tin đăng nhập không chính xác.');
        }
        session(['admin' => $admin]);

        return redirect()->route('san-pham.danh-sach');
    }

    public function dangXuat()
    {
        auth()->logout(); 
        session()->flush();

        return redirect()->route('dang-nhap');
    }
}
