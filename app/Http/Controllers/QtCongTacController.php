<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QtCongTacModel;
use DB;

class QtCongTacController extends Controller
{
    public function danhsach(Request $request)
    {
        $congtacs = QtCongTacModel::select(
            'quatrinhcongtac.*', 
            'nhanvien.HoTenNV as TenNhanVien', 
            'phongban.TenPB as TenPhongBan', 
            'chucvu.TenCV as TenChucVu'
        )
        ->leftJoin('nhanvien', 'nhanvien.MaNV', '=', 'quatrinhcongtac.MaNV')
        ->leftJoin('phongban', 'phongban.MaPB', '=', 'quatrinhcongtac.MaPhongBan')
        ->leftJoin('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu')
        ->get();
        
        // Trả về view và truyền tất cả dữ liệu
        return view('danhsach_congtac', ['congtacs' => $congtacs]);
    }

    public function show($id)
    {
        $congtac = QtCongTacModel::select(
            'quatrinhcongtac.*', 
            'nhanvien.HoTenNV as TenNhanVien', 
            'phongban.TenPB as TenPhongBan', 
            'chucvu.TenCV as TenChucVu'
        )
        ->leftJoin('nhanvien', 'nhanvien.MaNV', '=', 'quatrinhcongtac.MaNV')
        ->leftJoin('phongban', 'phongban.MaPB', '=', 'quatrinhcongtac.MaPhongBan')
        ->leftJoin('chucvu', 'chucvu.MaCV', '=', 'quatrinhcongtac.MaChucVu')
        ->where('quatrinhcongtac.ID', $id)
        ->first();

        $phongbans = DB::table('phongban')->get();
        $chucvus = DB::table('chucvu')->get();
        return view('thongtincongtac', ['congtac' => $congtac, 'phongbans' => $phongbans, 'chucvus' => $chucvus]);
    }

    public function update(Request $request)
    {
        $id = $request->input("txt_id");
        $maphongban = $request->input("txt_mapb");
        $macv = $request->input("txt_macv");

        QtCongTacModel::where('id', $id)->update([
            'MaPhongBan' => $maphongban,
            'MaChucVu' => $macv
        ]);

        return redirect()->to('danh-sach-cong-tac');
    }

    public function delete($id)
    {
        QtCongTacModel::where('id', $id)->delete();
        return redirect()->to('danh-sach-cong-tac');
    }

    public function add()
    {
        $nhanviens = DB::table('nhanvien')->select('MaNV', 'HoTenNV')->get();
        $phongbans = DB::table('phongban')->select('MaPB', 'TenPB')->get();
        $chucvus = DB::table('chucvu')->select('MaCV', 'TenCV')->get();
        return view('add_congtac', ['nhanviens' => $nhanviens, 'phongbans' => $phongbans, 'chucvus' => $chucvus]);
    }

    public function save(Request $request)
    {
        $manv = $request->input("txt_manv");
        $maphongban = $request->input("txt_mapb");
        $macv = $request->input("txt_macv");
        $ngayhieuluc = $request->input("txt_ngayhl");
        $ghichu = $request->input("txt_ghichu");

        // Ensure the date format is correct
        $ngayhieuluc = date('Y-m-d', strtotime($ngayhieuluc));

        QtCongTacModel::create([
            'MaNV' => $manv,
            'MaPhongBan' => $maphongban,
            'MaChucVu' => $macv,
            'NgayHieuLuc' => $ngayhieuluc,
            'GhiChu' => $ghichu
        ]);

        return redirect()->to('danh-sach-cong-tac');
    }
}
