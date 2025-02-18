<?php

namespace App\Http\Controllers;

use App\Models\KhenThuongKyLuat;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KhenThuongKyLuatController extends Controller
{
    public function danhsach()
    {
        $records = KhenThuongKyLuat::with('nhanvien')->get();
        return view('danh-sach-khen-thuong-ky-luat', compact('records'));
    }

    public function show($id)
    {
        $record = KhenThuongKyLuat::findOrFail($id);
        return view('khen-thuong-ky-luat.thong-tin', compact('record'));
    }

    public function add()
    {
        $nhanviens = NhanVienModel::all();
        return view('add_khenthuongkyluat', compact('nhanviens'));
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'MaNV' => 'required|exists:nhanvien,MaNV',
                'NgayQD' => 'required|date',
                'HinhThuc' => 'nullable|string|max:100',
                'mucktkl' => 'nullable|string|max:100',
                'GhiChu' => 'nullable|string',
                'sotien' => 'required|numeric',
                'NguoiKy' => 'nullable|string|max:100',
            ]);

            KhenThuongKyLuat::create($request->all());

            return redirect()->route('danh-sach-khen-thuong-ky-luat')->with('success', 'Thêm mới thành công!');
        } catch (\Exception $e) {
            Log::error('Error in save method: ' . $e->getMessage());
            Log::error('Request data: ' . json_encode($request->all()));
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'MaNV' => 'required|exists:nhanvien,MaNV',
                'NgayQD' => 'required|date',
                'HinhThuc' => 'nullable|string|max:100',
               
                'GhiChu' => 'nullable|string',
                'CoQuanKTKL' => 'nullable|string|max:100',
                'sotien' => 'required|numeric',
                'NguoiKy' => 'nullable|string|max:100',
            ]);

            $record = KhenThuongKyLuat::findOrFail($request->id);
            $record->update($request->all());

            return redirect()->route('danh-sach-khen-thuong-ky-luat')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Error in update method: ' . $e->getMessage());
            Log::error('Request data: ' . json_encode($request->all()));
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật: ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        KhenThuongKyLuat::where('id', $id)->delete();
        return redirect()->route('danh-sach-khen-thuong-ky-luat')->with('success', 'Xóa thành công!');
    }
}
?>
