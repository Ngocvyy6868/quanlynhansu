<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use DB;

class StudViewController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login'); // Trả về view đăng nhập (login.blade.php)
    }

    // Đăng nhập
    public function login(Request $request)
    {
        // Lấy thông tin từ form
        $username = $request->input('username');
        $password = $request->input('password');

        // Kiểm tra thông tin đăng nhập
        $user = UserModel::where('username', $username)->first();

        if ($user && $user->password === $password) {
            // Nếu đăng nhập đúng, lưu thông tin người dùng vào session
            $request->session()->put('username', $username);
            $request->session()->put('user_id', $user->id);

            // Chuyển hướng đến trang "hien-thi-san-pham"
            return redirect()->to('/hien-thi-san-pham'); // Chuyển hướng tới route hien-thi-san-pham
        } else {
            // Nếu sai thông tin đăng nhập, quay lại trang đăng nhập và hiển thị thông báo lỗi
            return redirect()->back()->withErrors(['login_error' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
        }
    }


    // // Lưu người dùng mới
    // public function save(Request $request)
    // {
    //     $name = $request->input("txt_username");
    //     $password = $request->input("txt_password"); // Lấy mật khẩu người dùng nhập vào
    //     $fullname = $request->input("txt_fullname");

    //     // Lưu thông tin người dùng vào cơ sở dữ liệu mà không mã hóa mật khẩu
    //     UserModel::insert([
    //         'username' => $name,
    //         'fullname' => $fullname,
    //         'password' => $password // Lưu mật khẩu dưới dạng văn bản thô
    //     ]);

    //     return redirect()->to('danh-sach');
    // }

    // // Cập nhật thông tin người dùng
    // public function update(Request $request)
    // {
    //     $id = $request->input("txt_id");
    //     $name = $request->input("txt_username");
    //     $fullname = $request->input("txt_fullname");

    //     // Kiểm tra nếu người dùng thay đổi mật khẩu
    //     $password = $request->input("txt_password");
    //     $data = [
    //         'username' => $name, 
    //         'fullname' => $fullname
    //     ];

    //     if ($password) {
    //         // Cập nhật mật khẩu mới nếu người dùng thay đổi mật khẩu
    //         $data['password'] = $password; // Lưu mật khẩu dưới dạng văn bản thô
    //     }

    //     UserModel::where('id', $id)->update($data);

    //     return redirect()->to('danh-sach');
    // }    
}
