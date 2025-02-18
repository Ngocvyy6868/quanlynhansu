<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBanModel;
use DB;

class PhongBanController extends Controller
{
    public function danhsach(Request $request)
    {
        $phongbans = PhongBanModel::all();
        return view('danhsach_phongban', ['phongbans' => $phongbans]);
    }

    public function show($id)
    {
        $phongban = PhongBanModel::where('MaPB', $id)->first();
        return view('thongtinphongban', ['phongban' => $phongban]);
    }

    public function update(Request $request)
    {
        $maphong = $request->input("txt_maphongban");
        $tenphong = $request->input("txt_tenphong");
        $vitri = $request->input("txt_vitri");
        $truongphong = $request->input("txt_tentruongphong");

        PhongBanModel::where('MaPB', $maphong)->update([
            'TenPB' => $tenphong,
            'ViTri' => $vitri,
            'TenTruongPhong' => $truongphong
        ]);

        return redirect()->to('danh-sach-phong-ban');
    }

    public function delete($id)
    {
        PhongBanModel::where('MaPB', $id)->delete();
        return redirect()->to('danh-sach-phong-ban');
    }

    public function add()
    {
        return view('add_phongban');
    }

    public function save(Request $request)
    {
        $tenphong = $request->input("txt_tenphong");
        $vitri = $request->input("txt_vitri");
        $truongphong = $request->input("txt_tentruongphong");

        PhongBanModel::create([
            'TenPB' => $tenphong,
            'ViTri' => $vitri,
            'TenTruongPhong' => $truongphong
        ]);

        return redirect()->to('danh-sach-phong-ban');
    }
}