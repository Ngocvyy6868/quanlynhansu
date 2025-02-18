<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NhanVienModel;
use DB; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NhanVienController extends Controller
{
    // public function dashboard(){
    //     return view('dashboard');
    // }
    public function list(Request $request){
        $nhanviens = NhanVienModel::all();
        return view('list_nv',['nhanviens'=>$nhanviens]);
    }
    public function show($MaNV){
        $nhanvien = NhanVienModel::where('MaNV',$MaNV)->get();
        return view('info_nv',['nhanvien'=>$nhanvien, 'MaNV' => $MaNV ]);
    }
    public function delete($MaNV){
        $rs = NhanVienModel::where('MaNV',$MaNV)->delete();
        return redirect()->to('/danh-sach-nhan-vien');
    }
    public function update(Request $request)
    {
        // Lấy dữ liệu từ form
        $MaNV = $request->input("txt_MaNV");

        // Kiểm tra nếu nhân viên tồn tại
        $nhanvien = NhanVienModel::find($MaNV);
        if (!$nhanvien) {
            return redirect()->back()->with('error', 'Nhân viên không tồn tại!');
        }

        // Lấy dữ liệu từ form
        $name = $request->input("txt_hoten");
        $ngaysinh = $request->input("txt_ngaysinh");
        $gioitinh = $request->input("txt_gioitinh");
        $quoctich = $request->input("txt_quoctich");
        $dantoc = $request->input("txt_dantoc");
        $tongiao = $request->input("txt_tongiao");
        $socccd = $request->input("txt_socccd");
        $diachithuongtru = $request->input("txt_diachithuongtru");
        $diachitamtru = $request->input("txt_diachitamtru");
        $sdt = $request->input("txt_sdt");
        $email = $request->input("txt_email");
        $ngayvaolam = $request->input("txt_ngayvaolam");
        $trinhdohocvan = $request->input("txt_trinhdohocvan");

        // Xử lý ảnh
        $img = $nhanvien->Img; // Giữ nguyên ảnh cũ nếu không có ảnh mới
        if ($request->hasFile('txt_img')) {
            try {
                // Upload ảnh mới
                $image = $request->file('txt_img');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
        
                // Cập nhật ảnh trong cơ sở dữ liệu
                $img = 'images/' . $imageName;
                $nhanvien->Img = $img;
        
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Lỗi khi tải ảnh: ' . $e->getMessage());
            }
        } elseif (!$nhanvien->Img) {
            // Nếu không có ảnh cũ và không có ảnh mới
            return redirect()->back()->with('error', 'Vui lòng thêm ảnh!');
        }
        

        // Cập nhật dữ liệu vào cơ sở dữ liệu
        try {
            $nhanvien->update([
                'HoTenNV' => $name,
                'NgaySinh' => $ngaysinh,
                'GioiTinh' => $gioitinh,
                'QuocTich' => $quoctich,
                'DanToc' => $dantoc,
                'TonGiao' => $tongiao,
                'SoCCCD' => $socccd,
                'DiaChiThuongTru' => $diachithuongtru,
                'DiaChiTamTru' => $diachitamtru,
                'SoDienThoai' => $sdt,
                'Email' => $email,
                'NgayVaoLam' => $ngayvaolam,
                'TrinhDoHocVan' => $trinhdohocvan,
                'Img' => $img // Cập nhật đường dẫn ảnh mới (nếu có)
            ]);

            return redirect()->to('/danh-sach-nhan-vien')->with('status', 'Cập nhật thành công!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật dữ liệu: ' . $e->getMessage());
        }
    }

    public function add(){
        return view("add_nv");
    }
    public function save(Request $request){
        // Validate the request
        $request->validate([
            'txt_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = $request->input("txt_hoten");
        $ngaysinh = $request->input("txt_ngaysinh");
        $gioitinh = $request->input("txt_gioitinh");
        $quoctich = $request->input("txt_quoctich");
        $dantoc = $request->input("txt_dantoc");
        $tongiao = $request->input("txt_tongiao");
        $socccd = $request->input("txt_socccd");
        $diachithuongtru = $request->input("txt_diachithuongtru");
        $diachitamtru = $request->input("txt_diachitamtru");
        $sdt = $request->input("txt_sdt");
        $email = $request->input("txt_email");
        $ngayvaolam = $request->input("txt_ngayvaolam");
        $trinhdohocvan = $request->input("txt_trinhdohocvan");
        if(!$request->hasFile('txt_img')){
            return "vui lòng thêm ảnh";
        }else{
            $image = $request->file('txt_img');
            $storedPath = $image->move('images', $image->getClientOriginalName());
            $imgPath = 'images/' . $image->getClientOriginalName();
        }
        NhanVienModel::insert([
            'HoTenNV' => $name,
            'NgaySinh' => $ngaysinh,
            'GioiTinh' => $gioitinh,
            'QuocTich' => $quoctich,
            'DanToc' => $dantoc,
            'TonGiao' => $tongiao,
            'SoCCCD' => $socccd,
            'DiaChiThuongTru' => $diachithuongtru,
            'DiaChiTamTru' => $diachitamtru,
            'SoDienThoai' => $sdt,
            'Email' => $email,
            'NgayVaoLam' => $ngayvaolam,
            'TrinhDoHocVan' => $trinhdohocvan,
            'Img' => $imgPath
        ]);

        return redirect()->to('danh-sach-nhan-vien');
    }

    public function getImage($MaNV) {
        $nhanvien = NhanVienModel::where('MaNV', $MaNV)->first();
        if ($nhanvien && $nhanvien->Img) {
            return response()->file(public_path($nhanvien->Img));
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }
}

