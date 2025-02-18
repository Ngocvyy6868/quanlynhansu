<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model

class StudInsertController extends Controller
{
    public function list() {
        try {
            $user = User::where('username', 'user1')->first();
            if ($user) {
                // Nếu tìm thấy người dùng
                return view('stud_view', ['user' => $user]);
            } else {
                return redirect()->back()->with('error', 'User not found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
