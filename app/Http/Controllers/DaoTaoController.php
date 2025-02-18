<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DaoTaoController extends Controller
{
    // Hiển thị danh sách các chương trình đào tạo
    public function list(Request $request)
    {
        $daotaos = DB::table('daotao')
            ->join('nhanvien', 'daotao.MaNV', '=', 'nhanvien.MaNV')
            ->select('daotao.*', 'nhanvien.HoTenNV')
            ->get();
        return view('list_dt', ['daotaos' => $daotaos]);
    }
    // Xóa một chương trình đào tạo
    public function delete($MaChuongTrinhDaoTao)
    {
        DB::table('daotao')->where('MaChuongTrinhDaoTao', $MaChuongTrinhDaoTao)->delete();
        return redirect()->to('/danh-sach-dao-tao')->with('success', 'Xóa thành công!');
    }

    // Hiển thị form thêm chương trình đào tạo
    public function add()
    {
        $nhanviens = DB::table('nhanvien')->select('MaNV', 'HoTenNV')->get();
        return view('add_dt', ['nhanviens' => $nhanviens]);
    }

    // Lưu thông tin chương trình đào tạo mới
    public function save(Request $request)
    {
        $validated = $request->validate([
            'MaNV' => 'required|string|max:50',
            'TenChuongTrinhDaoTao' => 'required|string|max:255',
            'TuNgay' => 'required|date',
            'DenNgay' => 'required|date|after_or_equal:TuNgay',
        ]);

        DB::table('daotao')->insert([
            'MaNV' => $request->input('MaNV'),
            'TenChuongTrinhDaoTao' => $request->input('TenChuongTrinhDaoTao'),
            'TuNgay' => $request->input('TuNgay'),
            'DenNgay' => $request->input('DenNgay'),
        ]);

        return redirect()->to('/danh-sach-dao-tao')->with('success', 'Thêm thành công!');
    }
    
    // Hiển thị thông tin chi tiết một chương trình đào tạo
    public function show($MaChuongTrinhDaoTao)
    {
        $daotao = DB::table('daotao')->where('MaChuongTrinhDaoTao', $MaChuongTrinhDaoTao)->first();
        if (!$daotao) {
            return redirect()->back()->with('error', 'Chương trình đào tạo không tồn tại!');
        }
        return view('info_dt', ['daotao' => $daotao]);
    }

    // Cập nhật thông tin chương trình đào tạo
    public function update(Request $request)
    {
        $validated = $request->validate([
            'MaChuongTrinhDaoTao' => 'required|integer',
            'MaNV' => 'required|string|max:50',
            'TenChuongTrinhDaoTao' => 'required|string|max:255',
            'TuNgay' => 'required|date',
            'DenNgay' => 'required|date|after_or_equal:TuNgay',
        ]);

        $daotao = DB::table('daotao')->where('MaChuongTrinhDaoTao', $request->input('MaChuongTrinhDaoTao'))->first();
        if (!$daotao) {
            return redirect()->back()->with('error', 'Chương trình đào tạo không tồn tại!');
        }

        DB::table('daotao')->where('MaChuongTrinhDaoTao', $request->input('MaChuongTrinhDaoTao'))->update([
            'MaNV' => $request->input('MaNV'),
            'TenChuongTrinhDaoTao' => $request->input('TenChuongTrinhDaoTao'),
            'TuNgay' => $request->input('TuNgay'),
            'DenNgay' => $request->input('DenNgay'),
        ]);

        return redirect()->to('/danh-sach-dao-tao')->with('success', 'Cập nhật thành công!');
    }
}
