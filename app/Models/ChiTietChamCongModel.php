<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietChamCongModel extends Model
{
    protected $table = 'chitietchamcong';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaCTCC';      // Khóa chính của bảng
    public $timestamps = false;            // Disable timestamps
    // Các thuộc tính có thể gán (fillable) để bảo vệ chống Mass Assignment
    protected $fillable = [
        'MaCC',
        'Ngay',
        'GioVao',
        'GioRa',
        'SoGioLam',
        'GioTangCa1_5',
        'GioTangCa3_0',
        'TrangThai',
        'GhiChu'
    ];

    // Định nghĩa quan hệ với bảng chamcong
    public function chamcong()
    {
        return $this->belongsTo(Chamcong::class, 'MaCC', 'MaCC');
    }
}
