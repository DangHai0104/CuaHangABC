<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function danhSach()
    {
        $dsSanPham = SanPham::all();
        return view('san-pham.danh-sach', compact('dsSanPham'));
    }

    public function themMoi()
    {
        $dsLoaiSanPham = LoaiSanPham::all();
        return view('san-pham.them-moi', compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $sanPham = new SanPham();
        $sanPham->ten       = $request->ten;
        $sanPham->loai_id   = $request->loai_san_pham;
        $sanPham->gia       = $request->gia;
        $sanPham->so_luong  = $request->so_luong;
        $sanPham->mo_ta     = $request->mo_ta;
        $sanPham->save();

        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $image) {
                // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu, liên kết với sản phẩm
                $hinhAnh = new HinhAnh();
                $hinhAnh->url = 'uploads/'.$image->store();
                $hinhAnh->san_pham_id = $sanPham->id; // Thay thế bằng ID của sản phẩm tương ứng
                $hinhAnh->save();
            }
        }

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' => "Thêm mới sản phẩm thành công"]);
    }

    public function capNhat($id)
    {
        $sanPham = SanPham::find($id);
        $dsLoaiSanPham = LoaiSanPham::all();
        if (empty($id)) {
            return "Sản phẩm không tồn tại";
        }
        return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $sanPham = SanPham::find($id);

        $sanPham->ten        = $request->ten;
        $sanPham->loai_id    = $request->loai_san_pham;
        $sanPham->gia        = $request->gia;
        $sanPham->so_luong   = $request->so_luong;
        $sanPham->mo_ta      = $request->mo_ta;
        $sanPham->trang_thai = $request->trang_thai;
        $sanPham->save();

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' => "Cập nhật sản phẩm thành công"]);
    }

    public function xoa($id)
    {
        $sanPham = SanPham::find($id);
        if (empty($id)) {
            return "Sản phẩm không tồn tại";
        }
        $sanPham->delete();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' => "Xóa sản phẩm thành công"]);
    }

    public function danhSachAnh($id)
    {
        $sanPham = SanPham::find($id);
        $dsHinhAnh = HinhAnh::where('san_pham_id', $id)->get();
        return view('san-pham.danh-sach-anh', compact('sanPham', 'dsHinhAnh'));
    }
}
