<?php

use App\Http\Controllers\APIKhachHangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('san-pham', [APISanPhamController::class, 'danhSachSp']);
Route::get('san-pham/{id}', [APISanPhamController::class, 'chiTietSp']);

route::post('san-pham', [APISanPhamController::class, 'themMoi']);
route::put('san-pham/{id}', [APISanPhamController::class, 'capNhat']);
route::delete('san-pham/{id}', [APISanPhamController::class, 'xoa']);

Route::get('loai-san-pham', [APILoaiSanPhamController::class, 'danhSachLoaiSp']);
Route::get('loai-san-pham/{id}', [APILoaiSanPhamController::class, 'chiTietLoaiSp']);

route::post('loai-san-pham', [APILoaiSanPhamController::class, 'themMoi']);
route::put('loai-san-pham/{id}', [APILoaiSanPhamController::class, 'capNhat']);
route::delete('loai-san-pham/{id}', [APILoaiSanPhamController::class, 'xoa']);
route::post('loai-san-pham/tim-kiem', [APILoaiSanPhamController::class, 'timKiem']);

route::post('khach-hang', [APIKhachHangController::class, 'themMoi']);