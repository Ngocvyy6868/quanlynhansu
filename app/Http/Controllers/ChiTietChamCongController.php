<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietChamCongModel;
use App\Models\NhanVienModel;
use App\Models\ChamCongModel;
use DB;

class ChiTietChamCongController extends Controller
{
    // Hiển thị thông tin chi tiết chấm công
    public function detail($MaCC)
    {
        $chitietchamcongs = ChiTietChamCongModel::where('MaCC', $MaCC)->get();
        $chamcong = ChamCongModel::where('MaCC', $MaCC)->first();
        
        // Calculate total overtime hours from chitietchamcong
        $totalOvertime1_5 = $chitietchamcongs->sum('GioTangCa1_5');
        $totalOvertime3_0 = $chitietchamcongs->sum('GioTangCa3_0');
        
        // Update chamcong with calculated values
        $chamcong->SoGioTangCa1_5 = $totalOvertime1_5;
        $chamcong->SoGioTangCa3_0 = $totalOvertime3_0;
        $chamcong->save();

        return view('details_chamcong', ['chitietchamcongs' => $chitietchamcongs, 'chamcong' => $chamcong]);
    }

    public function delete($id)
    {
        $chitiet = ChiTietChamCongModel::find($id);

        if (!$chitiet) {
            return redirect()->back()->with('error', 'Không tìm thấy chi tiết chấm công');
        }

        $chamcong = ChamCongModel::find($chitiet->MaCC);

        if ($chitiet->TrangThai === 'Đi làm' || $chitiet->TrangThai === 'Nghỉ phép') {
            $chamcong->SoNgayLamViec -= 1;
        } elseif ($chitiet->TrangThai === 'Nghỉ không lương') {
            $chamcong->SoNgayNghi -= 1;
        }

        $chamcong->save();
        $chitiet->delete();

        return redirect()->back()->with('success', 'Xóa chi tiết chấm công thành công');
    }
}