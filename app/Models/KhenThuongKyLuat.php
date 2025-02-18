<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuongKyLuat extends Model
{
    use HasFactory;

    protected $table = 'khenthuongvakyluat';

    protected $fillable = [
        'MaNV', 'NgayQD', 'HinhThuc', 'GhiChu', 'sotien', 'NguoiKy', 'mucktkl'
    ];

    public $timestamps = false;

    public function nhanvien()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaNV', 'MaNV');
    }
}
