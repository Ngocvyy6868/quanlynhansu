<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BangLuongModel;
use App\Models\ChamCongModel;
use App\Models\NhanVienModel;
use App\Models\KhenThuongKyLuat;
use App\Models\ChucVuModel;
use App\Models\QtCongTacModel;
use App\Models\TamUng;
use Illuminate\Support\Facades\DB;



class BangLuongController extends Controller
{
    // Hiển thị danh sách bảng lương
    public function list()
    {
        $nhanviens = NhanVienModel::all();
        $chucvus = ChucVuModel::all(); // Get all ChucVu
        $bangluongs = BangLuongModel::join('nhanvien', 'nhanvien.MaNV', '=', 'bangluong.MaNV')
            ->join('chamcong', 'chamcong.MaNV', '=', 'bangluong.MaNV')
            ->join('quatrinhcongtac', 'quatrinhcongtac.MaNV', '=', 'nhanvien.MaNV') // Join with QtCongTacModel
            ->join('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu') // Join with ChucVuModel
            ->select('bangluong.*', 'chamcong.SoGioTangCa1_5', 'chamcong.SoGioTangCa3_0', 'nhanvien.HoTenNV', 'chucvu.TenCV') // Select ChucVu field
            ->distinct() // Ensure unique entries per month
            ->get();
        return view('list_bangluong', ['bangluongs' => $bangluongs, 'nhanviens' => $nhanviens, 'chucvus' => $chucvus]);
    }

    // Hiển thị thông tin chi tiết bảng lương
    public function show($ID)
    {
        $bangluong = BangLuongModel::where('ID', $ID)->first();
        return view('info_bangluong', ['bangluong' => $bangluong]);
    }

    // Lọc bảng lương theo tháng, quý, năm, nhân viên, chức vụ
    public function filter(Request $request)
    {
        // Validation with custom messages
        $validated = $request->validate([
            'Thang' => 'nullable|integer|min:1|max:12',
            'Quy' => 'nullable|integer|min:1|max:4',
            'Nam' => 'required|integer|min:2000|max:' . date('Y'),
            'MaNV' => 'nullable|exists:nhanvien,MaNV',
            'MaChucVu' => 'nullable|exists:chucvu,MaCV',
        ], [
            'Nam.required' => 'Năm là bắt buộc.',
            'Nam.integer' => 'Năm phải là số nguyên.',
            'Nam.min' => 'Năm phải lớn hơn hoặc bằng 2000.',
            'Thang.integer' => 'Tháng phải là số nguyên từ 1 đến 12.',
            'Quy.integer' => 'Quý phải là số nguyên từ 1 đến 4.',
            'MaNV.exists' => 'Nhân viên không tồn tại.',
            'MaChucVu.exists' => 'Chức vụ không tồn tại.',
        ]);
    
        // Base query
        $query = BangLuongModel::query();
    
        // Apply filters
        if ($request->filled('Thang')) {
            $query->where('bangluong.Thang', $request->Thang);
        }
    
        if ($request->filled('Quy')) {
            $months = match ($request->Quy) {
                1 => [1, 2, 3],
                2 => [4, 5, 6],
                3 => [7, 8, 9],
                4 => [10, 11, 12],
            };
            $query->whereIn('bangluong.Thang', $months);
        }
    
        if ($request->filled('MaNV')) {
            $query->where('bangluong.MaNV', $request->MaNV);
        }
    
        if ($request->filled('MaChucVu')) {
            $query->whereHas('quatrinhcongtac', function ($q) use ($request) {
                $q->where('MaChucVu', $request->MaChucVu);
            });
        }
    
        $query->where('bangluong.Nam', $request->Nam);
    
        // Fetch data with necessary joins
        $bangluongs = $query->join('nhanvien', 'nhanvien.MaNV', '=', 'bangluong.MaNV')
            ->join('chamcong', 'chamcong.MaNV', '=', 'bangluong.MaNV')
            ->join('quatrinhcongtac', 'quatrinhcongtac.MaNV', '=', 'nhanvien.MaNV')
            ->join('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu')
            ->select(
                'bangluong.*',
                'chamcong.SoGioTangCa1_5',
                'chamcong.SoGioTangCa3_0',
                'nhanvien.HoTenNV',
                'chucvu.TenCV'
            )
            ->distinct()
            ->get();
    
        // Fetch additional data for dropdowns
        $nhanviens = NhanVienModel::all();
        $chucvus = ChucVuModel::all();
    
        return view('list_bangluong', [
            'bangluongs' => $bangluongs,
            'nhanviens' => $nhanviens,
            'chucvus' => $chucvus,
        ]);
    }
    // Lọc bảng lương theo nhân viên
    public function filterByEmployee(Request $request)
    {
        $validated = $request->validate([
            'MaNV' => 'nullable|exists:nhanvien,MaNV',
        ]);

        $query = BangLuongModel::query();

        if ($request->filled('MaNV') && $request->MaNV !== 'all') {
            $query->where('bangluong.MaNV', $request->MaNV);
        }

        $bangluongs = $query->join('nhanvien', 'nhanvien.MaNV', '=', 'bangluong.MaNV')
            ->join('chamcong', 'chamcong.MaNV', '=', 'bangluong.MaNV')
            ->join('quatrinhcongtac', 'quatrinhcongtac.MaNV', '=', 'nhanvien.MaNV') // Join with QtCongTacModel
            ->join('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu') // Join with ChucVuModel
            ->select('bangluong.*', 'chamcong.SoGioTangCa1_5', 'chamcong.SoGioTangCa3_0', 'nhanvien.HoTenNV', 'chucvu.TenCV') // Select ChucVu field
            ->distinct()
            ->get();

        $nhanviens = NhanVienModel::all();
        $chucvus = ChucVuModel::all(); // Get all ChucVu

        return view('list_bangluong', ['bangluongs' => $bangluongs, 'nhanviens' => $nhanviens, 'chucvus' => $chucvus]);
    }

    // Lọc bảng lương theo chức vụ
    public function filterByPosition(Request $request)
    {
        $validated = $request->validate([
            'MaChucVu' => 'nullable|exists:chucvu,MaCV',
        ]);

        $query = BangLuongModel::query();

        if ($request->filled('MaChucVu') && $request->MaChucVu !== 'all') {
            $query->where('quatrinhcongtac.MaChucVu', $request->MaChucVu);
        }

        $bangluongs = $query->join('nhanvien', 'nhanvien.MaNV', '=', 'bangluong.MaNV')
            ->join('chamcong', 'chamcong.MaNV', '=', 'bangluong.MaNV')
            ->join('quatrinhcongtac', 'quatrinhcongtac.MaNV', '=', 'nhanvien.MaNV') // Join with QtCongTacModel
            ->join('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu') // Join with ChucVuModel
            ->select('bangluong.*', 'chamcong.SoGioTangCa1_5', 'chamcong.SoGioTangCa3_0', 'nhanvien.HoTenNV', 'chucvu.TenCV') // Select ChucVu field
            ->distinct()
            ->get();

        $nhanviens = NhanVienModel::all();
        $chucvus = ChucVuModel::all(); // Get all ChucVu

        return view('list_bangluong', ['bangluongs' => $bangluongs, 'nhanviens' => $nhanviens, 'chucvus' => $chucvus]);
    }
// Tính lương cho tất cả nhân viên và lưu vào bảng lương
    public function calculateAll(Request $request)
    {
        $validated = $request->validate([
            'Thang' => 'required|integer|min:1|max:12',
            'Nam' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $thang = $validated['Thang'];
        $nam = $validated['Nam'];

        // Lấy tất cả nhân viên
        $nhanviens = NhanVienModel::all();
        $chucvus = ChucVuModel::all(); // Get all ChucVu
        $results = [];

        foreach ($nhanviens as $nhanvien) {
            // Lấy dữ liệu chấm công của nhân viên trong tháng
            $chamcong = ChamCongModel::where('MaNV', $nhanvien->MaNV)->where('Thang', $thang)->where('Nam', $nam)->first();

            // Nếu không có dữ liệu chấm công, tạo dữ liệu mặc định
            if (!$chamcong) {
                $chamcong = new ChamCongModel();
                $chamcong->MaNV = $nhanvien->MaNV;
                $chamcong->Thang = $thang;
                $chamcong->Nam = $nam;
                $chamcong->SoNgayLamViec = 0;
                $chamcong->SoGioTangCa1_5 = 0;
                $chamcong->SoGioTangCa3_0 = 0;
            }

            // Lấy dữ liệu phụ cấp chức vụ của nhân viên
            $maCV = QtCongTacModel::where('MaNV', $nhanvien->MaNV)->orderBy('NgayHieuLuc', 'desc')->value('MaChucVu');
            $phuCapCV = ChucVuModel::where('MaCV', $maCV)->value('PhuCapCV') ?? 0;

            // Set luongCoBan based on MaCV
            $luongCoBan = match ($maCV) {
                1 => 10000000,
                2 => 15000000,
                3 => 20000000,
                default => 10000000, // Default value if MaCV is not 1, 2, or 3
            };

            // Tính các giá trị lương
            $soNgayLamViec = $chamcong->SoNgayLamViec;
            $soGioTangCa1_5 = $chamcong->SoGioTangCa1_5;
            $soGioTangCa3_0 = $chamcong->SoGioTangCa3_0;
            $luongTangCa = $soGioTangCa1_5 * 85000 + $soGioTangCa3_0 * 170000;

            // Lấy dữ liệu thưởng/phạt của nhân viên
            $thuongPhat = KhenThuongKyLuat::where('MaNV', $nhanvien->MaNV)->sum('sotien');

            $phuCapXepLoai = 0; // Default value

            // Lấy dữ liệu tạm ứng của nhân viên
            $luongTamUng = TamUng::where('MaNV', $nhanvien->MaNV)
                ->whereMonth('NgayTamUng', $thang)
                ->whereYear('NgayTamUng', $nam)
                ->sum('SoTien');

            $tongLuong = ($luongCoBan + $phuCapCV + $thuongPhat) / 22 * $soNgayLamViec + $luongTangCa;
            $khauTruBH = $luongCoBan * 0.105; // 10% bảo hiểm
            $khauTruCongDoan = 100000; // Khấu trừ công đoàn cố định

            $thucLanh = $soNgayLamViec > 0 ? $tongLuong - $khauTruBH - $khauTruCongDoan - $luongTamUng : 0;
            $thucLanh = max($thucLanh, 0); // Ensure thucLanh is not negative

            // Cập nhật bảng lương
            BangLuongModel::updateOrCreate(
                ['MaNV' => $chamcong->MaNV, 'Thang' => $thang, 'Nam' => $nam],
                [
                    'NgayCong' => $soNgayLamViec,
                    'LuongCoBan' => $luongCoBan,
                    'SoGioTangCa1_5' => $soGioTangCa1_5,
                    'SoGioTangCa3_0' => $soGioTangCa3_0,
                    'LuongTangCa' => $luongTangCa,
                    'ThuongPhat' => $thuongPhat,
                    'PhuCapCV' => $phuCapCV,
                    'PhuCapXepLoai' => $phuCapXepLoai,
                    'TongLuong' => $tongLuong,
                    'KhauTruBH' => $khauTruBH,
                    'KhauTruCongDoan' => $khauTruCongDoan,
                    'ThucLanh' => $thucLanh,
                    'LuongTamUng' => $luongTamUng,
                    'GhiChu' => 'Tự động tính lương',
                ]
            );

            // Thêm kết quả vào mảng kết quả
            $results[] = [
                'MaNV' => $nhanvien->MaNV,
                'HoTenNV' => $nhanvien->HoTenNV,
                'SoNgayLamViec' => $soNgayLamViec,
                'SoGioTangCa1_5' => $soGioTangCa1_5,
                'SoGioTangCa3_0' => $soGioTangCa3_0,
                'LuongTangCa' => $luongTangCa,
                'TongLuong' => $tongLuong,
                'ThucLanh' => $thucLanh,
            ];
        }

        return view('list_bangluong', ['results' => $results, 'nhanviens' => $nhanviens, 'chucvus' => $chucvus])->with('success', 'Tính lương cho tất cả nhân viên trong tháng ' . $thang . '/' . $nam . ' thành công!');
    }

    // Lấy dữ liệu chấm công
    public function getChamCong($maNV, $thang, $nam)
    {
        $chamcong = ChamCongModel::where('MaNV', $maNV)->where('Thang', $thang)->where('Nam', $nam)->first();

        if ($chamcong) {
            return response()->json([
                'success' => true,
                'soNgayLamViec' => $chamcong->SoNgayLamViec,
                'soGioTangCa1_5' => $chamcong->SoGioTangCa1_5,
                'soGioTangCa3_0' => $chamcong->SoGioTangCa3_0,
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    // Xóa một chương trình đào tạo
    public function delete($ID)
    {
        DB::table('bangluong')->where('ID', $ID)->delete();
        return redirect()->to('/danh-sach-bang-luong')->with('success', 'Xóa thành công!');
    }
}
