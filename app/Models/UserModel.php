<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'MaNV',
        'taikhoan',
        'matkhau',
        'role',
    ];
    public $timestamps = false;
    // use HasFactory;
    public function nhanvien()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaNV');
    }
}
