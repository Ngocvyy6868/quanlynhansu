<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChamCongModel extends Model
{
    protected $table = 'chamcong';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaCC'; // Khóa chính của bảng
    public $timestamps = false;    // Laravel sẽ tự động quản lý timestamps (created_at, updated_at)
    // protected $fillable = ['username', 'fullname', 'password'];  // Các trường có thể điền vào cơ sở dữ liệu
    protected $fillable = [	'Ngay','Thang'	,'Nam'	,'MaNV',	'SoNgayNghi',	'SoNgayLamViec'	,'SoGioTangCa1_5'	,'SoGioTangCa3_0'	,'XepLoai',	'GhiChu'	];
    public function nhanvien()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaNV', 'MaNV');
    }
}
