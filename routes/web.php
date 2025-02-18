<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ChiTietChamCongController;

// Route::get('/', function () {
//     return view('dashboard');
// }); // Trang cần đăng nhập
// Route::get('/', function () {
//     return view('trangchu');
// });
Route::get('/', function () {
    return view('trangchu');
});
//nhan vienvien
Route::get('danh-sach-nhan-vien',[App\http\Controllers\NhanVienController::class,'list']);
Route::get('thong-tin-nhan-vien/{ID}',[App\http\Controllers\NhanVienController::class,'show']);
Route::post('cap-nhat-nhan-vien',[App\http\Controllers\NhanVienController::class,'update']);
Route::get('xoa-nhan-vien/{ID}',[App\http\Controllers\NhanVienController::class,'delete']);
Route::get('them-nhan-vien',[App\Http\Controllers\NhanVienController::class,'add']);
Route::post('them-nhan-vien',[App\Http\Controllers\NhanVienController::class,'save']);
// Route::match(['post','get'],'greeting/{ID?}',function($ID=null){
//     if(isset($ID))
//     return "hello $ID";
//     return "ASD";
// });

//cham cong
Route::get('/danh-sach-cham-cong', [App\Http\Controllers\ChamCongController::class, 'list']);
Route::get('/thong-tin-cham-cong/{ID}', [App\Http\Controllers\ChamCongController::class, 'show']);
Route::post('/cap-nhat-thong-tin-cham-cong', [App\Http\Controllers\ChamCongController::class, 'update']);
// Route::post('/cap-nhat-thong-tin-cham-cong', [App\Http\Controllers\ChamCongController::class, 'update']);
Route::get('/xoa-cham-cong/{ID}', [App\Http\Controllers\ChamCongController::class, 'delete']);
Route::get('/them-cham-cong', [App\Http\Controllers\ChamCongController::class, 'add']);
Route::post('/them-cham-cong', [App\Http\Controllers\ChamCongController::class, 'save']);
Route::post('cap-nhat-cham-cong', [App\Http\Controllers\ChamCongController::class, 'updateChamCong']);

//chi tiet cham cong
Route::get('chi-tiet-cham-cong/{maCC}', [App\Http\Controllers\ChiTietChamCongController::class, 'detail']);
Route::get('them-chi-tiet-cham-cong', [App\Http\Controllers\ChiTietChamCongController::class, 'create'])->name('chitietchamcong.create');
Route::post('luu-chi-tiet-cham-cong', [App\Http\Controllers\ChiTietChamCongController::class, 'store'])->name('chitietchamcong.store');
Route::delete('xoa-chi-tiet-cham-cong/{MaCTCC}', [App\Http\Controllers\ChiTietChamCongController::class, 'delete'])->name('xoa-chi-tiet-cham-cong'); // Ensure correct route name

//chuong trinh dao tao 
Route::get('/danh-sach-dao-tao', [App\Http\Controllers\DaoTaoController::class, 'list']);
Route::get('/thong-tin-dao-tao/{MaChuongTrinhDaoTao}', [App\Http\Controllers\DaoTaoController::class, 'show']);
Route::get('/them-dao-tao', [App\Http\Controllers\DaoTaoController::class, 'add']);
Route::post('/them-dao-tao', [App\Http\Controllers\DaoTaoController::class, 'save']);
Route::post('/cap-nhat-dao-tao', [App\Http\Controllers\DaoTaoController::class, 'update']);
Route::get('/xoa-dao-tao/{MaChuongTrinhDaoTao}', [App\Http\Controllers\DaoTaoController::class, 'delete']);


//bang luong
Route::get('/danh-sach-bang-luong', [App\Http\Controllers\BangLuongController::class, 'list']);
Route::get('/bang-luong/{id}', [App\Http\Controllers\BangLuongController::class, 'show']);
Route::post('/tinh-luong', [App\Http\Controllers\BangLuongController::class, 'calculate']);
Route::post('/tinh-tat-ca-luong', [App\Http\Controllers\BangLuongController::class, 'calculateAll']); // New route
Route::get('/get-cham-cong/{maNV}/{thang}/{nam}', [App\Http\Controllers\BangLuongController::class, 'getChamCong']);
Route::get('/loc-bang-luong', [App\Http\Controllers\BangLuongController::class, 'filter']); // New route
Route::get('/xoa-bang-luong/{id}', [App\Http\Controllers\BangLuongController::class, 'delete'])->name('xoa-bang-luong'); // New route
Route::get('/loc-bang-luong', [App\Http\Controllers\BangLuongController::class, 'filter']); // New route
Route::get('/loc-bang-luong-chuc-vu', [App\Http\Controllers\BangLuongController::class, 'filterByPosition']); // New route
Route::get('/loc-bang-luong-nhan-vien', [App\Http\Controllers\BangLuongController::class, 'filterByEmployee']); // New route
// Quản lí Phòng Ban
Route::get('danh-sach-phong-ban', [\App\Http\Controllers\PhongBanController::class, 'danhsach']);
Route::get('thong-tin-phong-ban/{id?}', [\App\Http\Controllers\PhongBanController::class, 'show']);
Route::get('delete-phong-ban/{id?}', [\App\Http\Controllers\PhongBanController::class, 'delete']);
Route::get('add-phong-ban', [\App\Http\Controllers\PhongBanController::class, 'add']);
Route::post('add-phong-bans', [\App\Http\Controllers\PhongBanController::class, 'save']);
Route::post('cap-nhat-phong-ban', [\App\Http\Controllers\PhongBanController::class, 'update']);
// Quản lí chúc vụ
Route::get('danh-sach-chuc-vu', [\App\Http\Controllers\ChucVuController::class, 'danhsach']);
Route::get('thong-tin-chuc-vu/{id?}', [\App\Http\Controllers\ChucVuController::class, 'show']);
Route::get('delete-chuc-vu/{id?}', [\App\Http\Controllers\ChucVuController::class, 'delete']);
Route::get('add-chuc-vu', [\App\Http\Controllers\ChucVuController::class, 'add']);
Route::post('add-chuc-vus', [\App\Http\Controllers\ChucVuController::class, 'save']);Route::post('cap-nhat-chuc-vu', [\App\Http\Controllers\ChucVuController::class, 'update']);
// quá trình công tác
Route::get('danh-sach-cong-tac', [\App\Http\Controllers\QtCongTacController::class, 'danhsach']);
Route::get('thong-tin-cong-tac/{id?}', [\App\Http\Controllers\QtCongTacController::class, 'show']);
Route::get('delete-cong-tac/{id}', [\App\Http\Controllers\QtCongTacController::class, 'delete']);
Route::get('add-cong-tac', [\App\Http\Controllers\QtCongTacController::class, 'add']);
Route::post('add-cong-tacs', [\App\Http\Controllers\QtCongTacController::class, 'save']);
Route::post('cap-nhat-cong-tac', [\App\Http\Controllers\QtCongTacController::class, 'update']);



// Khen thưởng và Kỷ luật
Route::get('danh-sach-khen-thuong-ky-luat', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'danhsach'])->name('danh-sach-khen-thuong-ky-luat');
Route::get('thong-tin-khen-thuong-ky-luat/{id}', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'show'])->name('thong-tin-khen-thuong-ky-luat');
Route::get('them-khen-thuong-ky-luat', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'add'])->name('them-khen-thuong-ky-luat');
Route::post('them-khen-thuong-ky-luat', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'save'])->name('luu-khen-thuong-ky-luat');
Route::post('cap-nhat-khen-thuong-ky-luat', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'update'])->name('cap-nhat-khen-thuong-ky-luat');
Route::get('xoa-khen-thuong-ky-luat/{id}', [\App\Http\Controllers\KhenThuongKyLuatController::class, 'delete']);

// Bảng Tạm Ứng
Route::get('danh-sach-tam-ung', [\App\Http\Controllers\TamUngController::class, 'list'])->name('danh-sach-tam-ung');
Route::get('them-tam-ung', [\App\Http\Controllers\TamUngController::class, 'add'])->name('them-tam-ung');
Route::post('luu-tam-ung', [\App\Http\Controllers\TamUngController::class, 'save']);
Route::delete('xoa-tam-ung/{id}', [\App\Http\Controllers\TamUngController::class, 'delete'])->name('xoa-tam-ung');
Route::get('sua-tam-ung/{id}', [\App\Http\Controllers\TamUngController::class, 'edit'])->name('sua-tam-ung');
Route::post('cap-nhat-tam-ung', [\App\Http\Controllers\TamUngController::class, 'update']); // Ensure POST method with method spoofing
Route::get('thong-tin-tam-ung/{id}', [\App\Http\Controllers\TamUngController::class, 'show'])->name('thong-tin-tam-ung');

