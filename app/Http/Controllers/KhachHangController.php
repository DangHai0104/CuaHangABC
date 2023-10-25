<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function danhSach()
    {
        $dsKhachHang = KhachHang::all();
        return view('khach-hang.danh-sach', compact('dsKhachHang'));
    }

    public function themMoi(){
        $dsKhachHang = KhachHang::all();
        return view('khach-hang.them-moi', compact('dsKhachHang'));
    }

    public function xuLyThemMoi(Request $request){
        $khachHang = new KhachHang();
        $khachHang->ten_kh = $request->ten_kh;
        $khachHang->ten_dang_nhap = $request->ten_dang_nhap;
        $khachHang->mat_khau = $request->mat_khau;
        $khachHang->email = $request->email;
        $khachHang->dien_thoai = $request->dien_thoai;
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->save();
        // if ($request->hasFile('avatar')) {
        //     foreach ($request->file('avatar') as $image) {
        //         // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu, liên kết với sản phẩm
        //         $avatar = new KhachHang();
        //         $avatar->url = 'avatars/'.$image->store();
        //         $avatar->san_pham_id = $khachHang->id; // Thay thế bằng ID của sản phẩm tương ứng
        //         $avatar->save();
        //     }
        // }
        return redirect()->route('khach-hang.danh-sach')->with(['thong-bao' => "Them moi khach hang thanh cong"]);
    }

    public function capNhat($id)
    {
        $khachHang = KhachHang::find($id);
        if (empty($id)) {
            return "Khach hang không tồn tại";
        }
        return view('khach-hang.cap-nhat', compact('khachHang'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $khachHang = KhachHang::find($id);

        $khachHang->ten_kh = $request->ten_kh;
        $khachHang->ten_dang_nhap = $request->ten_dang_nhap;
        $khachHang->mat_khau = $request->mat_khau;
        $khachHang->email = $request->email;
        $khachHang->dien_thoai = $request->dien_thoai;
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->save();

        return redirect()->route('khach-hang.danh-sach')->with(['thong_bao' => "Cập nhật khach hang thành công"]);
    }

    public function xoa($id)
    {
        $khachHang = KhachHang::find($id);
        if (empty($id)) {
            return "Khach hang không tồn tại";
        }
        $khachHang->delete();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' => "Xóa khach hang thành công"]);
    }
}
