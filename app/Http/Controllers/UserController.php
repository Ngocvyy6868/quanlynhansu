<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use DB;

class UserController extends Controller
{


    public function danhsach(Request $request)
    {
        $users = DB::table('users')
            ->join('nhanvien', 'users.MANV', '=', 'nhanvien.MaNV')
            ->select('users.*', 'nhanvien.HoTenNV')
            ->get();
        return view('taikhoan_nv', ['users' => $users]);
    }

    public function show($id)
    {
        $users = DB::table('users')
        ->join('nhanvien', 'users.MANV', '=', 'nhanvien.MaNV')
        ->where('users.user_id', $id)
        ->select('users.*', 'nhanvien.HoTenNV')
        ->get();
        return view('thongtinuser', ['users' => $users]);
    }

    public function update(Request $request)
    {
        $id = $request->input("txt_user_id");
        $nhanvien = $request->input("txt_manv");
        $taikhoan = $request->input("txt_taikhoan");
        $matkhau =($request->input("txt_matkhau"));
        $role =($request->input("txt_role"));
        UserModel::where('user_id', $id)->update(['taikhoan' => $taikhoan, 'matkhau' => $matkhau, 'role' => $role, 'MANV' => $nhanvien]);
        return redirect()->to('danh-sach-tai-khoan');
    }

    public function delete($id)
    {
        UserModel::where('user_id', $id)->delete();
        return redirect()->to('danh-sach-tai-khoan');
    }


    public function add()
    {
        $nhanviens = DB::table('nhanvien')->select('MaNV', 'HoTenNV')->get();
        return view('add_user', ['nhanviens' => $nhanviens]);
    }
    // Thêm người dùng
    public function save(Request $request)
    {
        $nhanvien = $request->input("txt_manv"); // Correct field name

        $taikhoan = $request->input("txt_taikhoan");
        $matkhau = $request->input("txt_matkhau");
        $role = $request->input("txt_role");
        UserModel::insert(['taikhoan' => $taikhoan, 'matkhau' => $matkhau, 'role' => $role, 'MANV' => $nhanvien]);
        return redirect()->to('danh-sach-tai-khoan');
    }

    public function dangky()
    {
        return view('sign_up');
    }

    public function SignUp(Request $request)
    {
        $name = $request->input("txtusername");
        $password = $request->input("txtpassword");
        $fullname = $request->input("txtfullname");
        UserModel::insert(['username' => $name, 'fullname' => $fullname, 'password' => $password]);
        return view('Login');
    }

    public function logins(Request $request)
    {
        // Lấy tên người dùng và mật khẩu từ form
        $username = $request->input('username');
        $password = $request->input('password');

        // Tìm người dùng trong cơ sở dữ liệu theo username
        $user = UserModel::where('taikhoan', $username)->first();

        // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp không (so sánh trực tiếp)
        if ($user && $user->matkhau == $password) {
            // Lưu thông tin người dùng vào session sau khi đăng nhập thành công
            session(['taikhoan' => $user->taikhoan]);
            session(['user_id' => $user->user_id]);
            session(['role' => $user->role]);
          
            return redirect()->to('/');  // Dùng route name thay vì URL trực tiếp
        } else {
            // Nếu đăng nhập thất bại, trả về lỗi
            return back()->withErrors(['username' => 'Thông tin đăng nhập không đúng.']);
        }
    }




    public function showLoginForm()
    {
        return view('Login');
    }

    public function list()
    {
        return view('stud_view');
    }

    public function logout()
    {
        // Xóa session khi người dùng đăng xuất
        session()->flush();

        return redirect()->to('/'); // Redirect về trang đăng nhập
    }
}
