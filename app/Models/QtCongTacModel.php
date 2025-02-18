<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QtCongTacModel extends Model
{
    // use HasFactory;

    protected $table = 'quatrinhcongtac'; // Đổi tên bảng ở đây
    public $timestamps = false;
    protected $fillable = ['MaNV', 'MaPhongBan', 'MaChucVu', 'NgayHieuLuc', 'GhiChu'];
}
