<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TamUng;
use App\Models\NhanVienModel; // Add this line

class TamUngController extends Controller
{
    public function list()
    {
        $records = TamUng::with('nhanvien')->get();
        return view('tamung_list', compact('records'));
    }

    public function add()
    {
        $nhanviens = NhanVienModel::all();
        return view('add_tamung', compact('nhanviens'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'MaNV' => 'required|exists:nhanvien,MaNV', // Update validation rule
            'NgayTamUng' => 'required|date',
            'SoTien' => 'required|numeric|min:0',
            'LyDo' => 'nullable|string', // Thêm điều kiện cho LyDo
        
        ]);
            $manv= $request->input('MaNV');
            $ngayung= $request->input('NgayTamUng');   
            $sotien= $request->input('SoTien');
            $lydo= $request->input('LyDo');
        TamUng::insert([
            'MaNV' => $manv,
            'NgayTamUng' => $ngayung,
            'SoTien' => $sotien,
            'LyDo' => $lydo,
        ]);

        return redirect()->to('danh-sach-tam-ung')->with('success', 'Thêm tạm ứng thành công!');
    }

    public function delete($id)
    {
        $record = TamUng::find($id);
        if ($record) {
            $record->delete();
            return redirect()->route('danh-sach-tam-ung')->with('success', 'Xóa thành công!');
        }
        return redirect()->route('danh-sach-tam-ung')->with('error', 'Bản ghi không tồn tại!');
    }

    public function edit($id)
    {
        $tamung = TamUng::find($id);
        $nhanviens = NhanVienModel::all();
        if (!$tamung) {
            return redirect()->route('danh-sach-tam-ung')->with('error', 'Bản ghi không tồn tại!');
        }
        return view('info_tamung', compact('tamung', 'nhanviens'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'NgayTamUng' => 'required|date',
            'SoTien' => 'required|numeric|min:0',
            'LyDo' => 'nullable|string',
        ]);
    
        $tamung = TamUng::where('id',$request->input('id'));
        if (!$tamung) {
            return redirect()->to('danh-sach-tam-ung')->with('error', 'Bản ghi không tồn tại!');
        }
    
        $tamung->update([
            'NgayTamUng' => $request->input('NgayTamUng'),
            'SoTien' => $request->input('SoTien'),
            'LyDo' => $request->input('LyDo'),
        ]);
    
        return redirect()->to('danh-sach-tam-ung')->with('success', 'Cập nhật thành công!');
    }
    

    public function show($id)
    {
        $tamung = TamUng::with('nhanvien')->find($id);
        if (!$tamung) {
            return redirect()->route('danh-sach-tam-ung')->with('error', 'Bản ghi không tồn tại!');
        }
        return view('info_tamung', compact('tamung'));
    }
}
