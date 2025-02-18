<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamUng extends Model
{
    use HasFactory;

    protected $table = 'tam_ung';
    protected $primaryKey = 'id';
    public $timestamps = false; // Disable automatic timestamps

    protected $fillable = [
        'MaNV',
        'NgayTamUng',
        'SoTien',
        'LyDo',
    ];

    public function nhanvien()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaNV');
    }
}