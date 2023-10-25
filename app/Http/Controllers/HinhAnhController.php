<?php

namespace App\Http\Controllers;

use App\Models\HinhAnh;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{


    public function themMoi()
    {
        $hinhAnh = HinhAnh::all();
        return view('san-pham.danh-sach-anh', compact('hinhAnh'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $sanPham = new SanPham;
        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $image) {
                // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu, liên kết với sản phẩm
                $hinhAnh = new HinhAnh;
                $hinhAnh->url = 'uploads/' . $image->store();
                $hinhAnh->san_pham_id = $sanPham->id; // Thay thế bằng ID của sản phẩm tương ứng
                $hinhAnh->save();
            }
        }
    }

    public function xoa($id)
    {
        $hinhAnh = HinhAnh::find($id);
        $sanPhamId = $hinhAnh->san_pham_id;
        $hinhAnh->delete();
        return redirect()->route('san-pham.danh-sach-anh', ['id' => $sanPhamId])->with(['thong_bao' => "Xóa ảnh sản phẩm thành công"]);
    }
}
