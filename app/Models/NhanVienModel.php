<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    protected $table = 'nhanvien';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaNV'; // Khóa chính của bảng
    public $timestamps = false;    // Laravel sẽ tự động quản lý timestamps (created_at, updated_at)
    // protected $fillable = ['username', 'fullname', 'password'];  // Các trường có thể điền vào cơ sở dữ liệu
    protected $fillable = [
        'HoTenNV',
        'NgaySinh',
        'GioiTinh',
        'QuocTich',
        'DanToc',
        'TonGiao',
        'SoCCCD',
        'DiaChiThuongTru',
        'DiaChiTamTru',
        'SoDienThoai',
        'Email',
        'NgayVaoLam',
        'TrinhDoHocVan',
    ];
    public function quatrinhcongtac()
    {
        return $this->hasMany(QuaTrinhCongTacModel::class, 'MaNV', 'MaNV');
    }

    public function chucvus()
    {
        return $this->hasManyThrough(ChucVuModel::class, QuaTrinhCongTacModel::class, 'MaNV', 'MaCV', 'MaNV', 'MaChucVu');
    }

}
