<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChamCongModel;
use App\Models\ChiTietChamCongModel;
use App\Models\NhanVienModel; // Model cho Nhân Viên
use DB;

class ChamCongController extends Controller
{
    public function list(Request $request)
    {
        $query = ChamCongModel::join('nhanvien', 'nhanvien.MaNV', '=', 'chamcong.MaNV')
                              ->select('chamcong.*', 'nhanvien.HoTenNV');

        if ($request->has('month') && $request->has('year')) {
            $query->where('Thang', $request->input('month'))
                  ->where('Nam', $request->input('year'));
        }

        $chamcongs = $query->get();
        return view('list_chamcong', ['chamcongs' => $chamcongs]);
    }
    // Hiển thị thông tin chi tiết chấm công
    public function show($ID)
    {
        // Lấy thông tin chấm công và danh sách nhân viên
        $chamcong = ChamCongModel::where('MaCC', $ID)->get();
        $nhanviens = NhanVienModel::all();
        return view('info_chamcong', ['chamcong' => $chamcong, 'nhanviens' => $nhanviens]);
    }
    // Xóa một bản ghi chấm công
    public function delete($ID)
    {
        // Xóa chấm công theo mã chấm công
        $rs = ChamCongModel::where('MaCC', $ID)->delete();
        return redirect()->to('/danh-sach-cham-cong')->with('success', 'Chấm công đã được xóa!');
    }
    public function update(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'txt_MaCC' => 'required|integer|exists:chamcong,MaCC',
            'txt_MaNV' => 'required|integer|exists:nhanvien,MaNV',
            'txt_SoNgayNghi' => 'nullable|numeric|min:0',
            'txt_SoNgayLamViec' => 'nullable|numeric|min:0',
            'txt_SoGioTangCa1_5' => 'nullable|numeric|min:0',
            'txt_SoGioTangCa3_0' => 'nullable|numeric|min:0',
            'txt_XepLoai' => 'nullable|string',
            'txt_GhiChu' => 'nullable|string',
        ]);

        // Tìm bản ghi chấm công theo MaCC
        $chamcong = ChamCongModel::find($request->input('txt_MaCC'));

        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$chamcong) {
            return redirect()->back()->with('error', 'Không tìm thấy bản ghi chấm công');
        }

        // Cập nhật các trường cần thiết
        $chamcong->update([
            'MaNV' => $request->input('txt_MaNV'),
            'SoNgayNghi' => $request->input('txt_SoNgayNghi'),
            'SoNgayLamViec' => $request->input('txt_SoNgayLamViec'),
            'SoGioTangCa1_5' => $request->input('txt_SoGioTangCa1_5'),
            'SoGioTangCa3_0' => $request->input('txt_SoGioTangCa3_0'),
            'XepLoai' => $request->input('txt_XepLoai'),
            'GhiChu' => $request->input('txt_GhiChu'),
        ]);

        // Trả về trang với thông báo thành công
        return redirect()->to('danh-sach-cham-cong')->with('success', 'Cập nhật chấm công thành công');
    }
    
    // Hiển thị form thêm mới chấm công
    public function add()
    {
        $nhanviens = NhanVienModel::all();
        return view("add_chamcong", ['nhanviens' => $nhanviens]);
    }
    public function save(Request $request)
    {
        // Lấy các dữ liệu từ form
        $maNVs = $request->input("MaNV");
        $thang = $request->input("Thang");
        $nam = $request->input("Nam");
        $ghiChu = $request->input("GhiChu");

        if (in_array('all', $maNVs)) {
            $maNVs = NhanVienModel::pluck('MaNV')->toArray();
        }

        foreach ($maNVs as $maNV) {
            ChamCongModel::insert([
                'MaNV' => $maNV,
                'Thang' => $thang,
                'Nam' => $nam,
                'SoNgayNghi' => 0,
                'SoNgayLamViec' => 0,
                'SoGioTangCa1_5' => 0,
                'SoGioTangCa3_0' => 0,
                'XepLoai' => '',
                'GhiChu' => $ghiChu
            ]);
        }

        // Chuyển hướng về danh sách chấm công sau khi lưu
        return redirect()->to('danh-sach-cham-cong');
    }
    // public function updateNgayLamViec(Request $request)
    // {
    //     // Lấy danh sách mã chấm công từ form
    //     $selectedIds = $request->input('selected_ids');
    
    //     // Kiểm tra nếu không có mã chấm công nào được chọn
    //     if (!$selectedIds || empty($selectedIds)) {
    //         return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một nhân viên.');
    //     }
    
    //     // Tăng số ngày làm việc của các bản ghi chấm công được chọn
    //     ChamCongModel::whereIn('MaCC', $selectedIds)->increment('SoNgayLamViec', 1);
    
    //     // Trả về thông báo thành công
    //     return redirect()->back()->with('success', 'Cập nhật số ngày làm việc thành công.');
    // }
    public function updateChamCong(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'integer|exists:chamcong,MaCC',
            'action' => 'required|string',
            'trangthai' => 'nullable|string|in:Đi làm,Nghỉ phép,Nghỉ không lương,Thứ 7, CN',
            'ngay' => 'nullable|date'
        ]);

        $ngay = $validated['ngay'] ?? now()->toDateString();

        // Loop through each selected ID and update accordingly
        foreach ($validated['selected_ids'] as $id) {
            $chamcong = ChamCongModel::find($id);

            if ($chamcong) {
                $chitietData = [
                    'MaCC' => $chamcong->MaCC,
                    'Ngay' => $ngay,
                    'GioVao' => '08:00:00',
                    'GioRa' => '17:00:00',
                    'SoGioLam' => 8,
                    'GioTangCa1_5' => 0,
                    'GioTangCa3_0' => 0,
                    'TrangThai' => $validated['trangthai'] ?? 'Đi làm',
                    'GhiChu' => 'Cập nhật tự động'
                ];

                if ($validated['action'] === 'update') {
                    if ($validated['trangthai'] === 'Đi làm' || $validated['trangthai'] === 'Nghỉ phép') {
                        $chamcong->SoNgayLamViec += 1;
                    } elseif ($validated['trangthai'] === 'Nghỉ không lương') {
                        $chamcong->SoNgayNghi += 1;
                        $chitietData['SoGioLam'] = 0;
                        $chitietData['GioVao'] = null;
                        $chitietData['GioRa'] = null;
                    }
                } elseif ($validated['action'] === 'update_ot_1_5') {
                    $chamcong->SoGioTangCa1_5 += 1;
                    $chitietData['GioTangCa1_5'] = 1;
                } elseif ($validated['action'] === 'update_ot_3_0') {
                    $chamcong->SoGioTangCa3_0 += 1;
                    $chitietData['GioTangCa3_0'] = 1;
                }

                $chamcong->save();

                // Update or create ChiTietChamCongModel
                ChiTietChamCongModel::updateOrCreate(
                    ['MaCC' => $chamcong->MaCC, 'Ngay' => $ngay],
                    $chitietData
                );
            }
        }

        return redirect()->back()->with('success', 'Cập nhật chấm công thành công');
    }
    
}
