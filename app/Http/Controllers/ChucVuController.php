<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVuModel;
use DB;

class ChucVuController extends Controller
{
    public function danhsach(Request $request)
    {
        $chucvus = ChucVuModel::all();
        return view('danhsach_chucvu', ['chucvus' => $chucvus]);
    }

    public function show($id)
    {
        $chucvu = ChucVuModel::where('MaCV', $id)->first();
        return view('thongtinchucvu', ['chucvu' => $chucvu]);
    }

    public function update(Request $request)
    {
        $macv = $request->input("txt_machucvu");
        $name = $request->input("txt_tencv");
        $phucap = $request->input("txt_phucapcv");

        ChucVuModel::where('MaCV', $macv)->update([
            'TenCV' => $name,
            'PhuCapCV' => $phucap
        ]);

        return redirect()->to('danh-sach-chuc-vu');
    }

    public function delete($id)
    {
        ChucVuModel::where('MaCV', $id)->delete();
        return redirect()->to('danh-sach-chuc-vu');
    }

    public function add()
    {
        return view('add_chucvu');
    }

    public function save(Request $request)
    {
        $name = $request->input("txt_tencv");
        $phucapcv = $request->input("txt_phucapcv");

        ChucVuModel::insert([
            'TenCV' => $name,
            'PhuCapCV' => $phucapcv
        ]);

        return redirect()->to('danh-sach-chuc-vu');
    }
    
}