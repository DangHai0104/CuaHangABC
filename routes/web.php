<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\HoaDonNhapController;
use App\Http\Controllers\HoaDonXuatController;
use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dang-nhap');
});

Route::get('dang-nhap', [AdminController::class, 'dangNhap'])->name('dang-nhap');
Route::post('dang-nhap', [AdminController::class, 'xuLyDangNhap'])->name('xl-dang-nhap');
Route::get('dang-xuat', [AdminController::class, 'dangXuat'])->name('dang-xuat');

Route::get('/san-pham', [SanPhamController::class, 'danhSach'])->name('san-pham.danh-sach')->middleware('checkLogin');

Route::get('san-pham/them-moi', [SanPhamController::class, 'themMoi'])->name('san-pham.them-moi');
Route::post('san-pham/them-moi', [SanPhamController::class, 'xuLyThemMoi'])->name('san-pham.xl-them-moi');

Route::get('san-pham/cap-nhat/{id}', [SanPhamController::class, 'capNhat'])->name('san-pham.cap-nhat');
Route::post('san-pham/cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhat'])->name('san-pham.xl-cap-nhat');

Route::get('san-pham/xoa/{id}', [SanPhamController::class, 'xoa'])->name('san-pham.xoa');

Route::get('/loai-san-pham', [LoaiSanPhamController::class, 'danhSach'])->name('loai-san-pham.danh-sach');

Route::get('loai-san-pham/them-moi', [LoaiSanPhamController::class, 'themMoi'])->name('loai-san-pham.them-moi');
Route::post('loai-san-pham/them-moi', [LoaiSanPhamController::class, 'xuLyThemMoi'])->name('loai-san-pham.xl-them-moi');

Route::get('loai-san-pham/cap-nhat/{id}', [LoaiSanPhamController::class, 'capNhat'])->name('loai-san-pham.cap-nhat');
Route::post('loai-san-pham/cap-nhat/{id}', [LoaiSanPhamController::class, 'xuLyCapNhat'])->name('loai-san-pham.xl-cap-nhat');

Route::get('loai-san-pham/xoa/{id}', [LoaiSanPhamController::class, 'xoa'])->name('loai-san-pham.xoa');

Route::get('san-pham/danh-sach-anh/{id}', [SanPhamController::class, 'danhSachAnh'])->name('san-pham.danh-sach-anh');
Route::get('san-pham/danh-sach-anh/them-moi', [SanPhamController::class, 'themMoi'])->name('san-pham.danh-sach-anh.them-moi');
Route::get('san-pham/danh-sach-anh/xoa/{id}', [HinhAnhController::class, 'xoa'])->name('san-pham.danh-sach-anh.xoa');

Route::get('/nha-cung-cap', [NhaCungCapController::class, 'danhSach'])->name('nha-cung-cap.danh-sach');

Route::get('nha-cung-cap/them-moi', [NhaCungCapController::class, 'themMoi'])->name('nha-cung-cap.them-moi');
Route::post('nha-cung-cap/them-moi', [NhaCungCapController::class, 'xuLyThemMoi'])->name('nha-cung-cap.xl-them-moi');

Route::get('nha-cung-cap/cap-nhat/{id}', [NhaCungCapController::class, 'capNhat'])->name('nha-cung-cap.cap-nhat');
Route::post('nha-cung-cap/cap-nhat/{id}', [NhaCungCapController::class, 'xuLyCapNhat'])->name('nha-cung-cap.xl-cap-nhat');

Route::get('nha-cung-cap/xoa/{id}', [NhaCungCapController::class, 'xoa'])->name('nha-cung-cap.xoa');

// route::get('hoa-don-nhap', [HoaDonNhapController::class, 'danhSach'])->name('hoa-don-nhap.danh-sach');    
route::get('hoa-don-nhap/them-moi', [HoaDonNhapController::class, 'themMoi'])->name('hoa-don-nhap.them-moi');
route::post('hoa-don-nhap/them-moi', [HoaDonNhapController::class, 'xuLyThemMoi'])->name('hoa-don-nhap.xl-them-moi');

route::get('hoa-don-xuat', [HoaDonXuatController::class, 'danhSach'])->name('hoa-don-xuat.danh-sach');    
route::get('hoa-don-xuat/them-moi', [HoaDonXuatController::class, 'themMoi'])->name('hoa-don-xuat.them-moi');
route::post('hoa-don-xuat/them-moi', [HoaDonXuatController::class, 'xuLyThemMoi'])->name('hoa-don-xuat.xl-them-moi');
route::get('hoa-don-xuat/chi-tiet/{id}', [HoaDonXuatController::class, 'chiTietHoaDon'])->name('hoa-don-xuat.chi-tiet');  

route::get('khach-hang', [KhachHangController::class, 'danhSach'])->name('khach-hang.danh-sach');

route::get('khach-hang/them-moi', [KhachHangController::class, 'themMoi'])->name('khach-hang.them-moi');
route::post('khach-hang/them-moi', [KhachHangController::class, 'xuLyThemMoi'])->name('khach-hang.xl-them-moi');

route::get('khach-hang/cap-nhat/{id}', [KhachHangController::class, 'capNhat'])->name('khach-hang.cap-nhat');
route::post('khach-hang/cap-nhat/{id}', [KhachHangController::class, 'xuLyCapNhat'])->name('khach-hang.xl-cap-nhat');

route::get('khach-hang/xoa/{id}', [KhachHangController::class, 'xoa'])->name('khach-hang.xoa');