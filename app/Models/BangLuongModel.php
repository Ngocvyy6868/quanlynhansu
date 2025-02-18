<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BangLuongModel extends Model
{
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'bangluong';

    // Khóa chính của bảng
    protected $primaryKey = 'ID';

    // Laravel sẽ không tự động quản lý created_at, updated_at vì chúng không có trong bảng
    public $timestamps = false;

    // Định nghĩa các thuộc tính có thể gán giá trị
    protected $fillable = [
        'MaNV', 'Thang', 'Nam', 'NgayCong', 'LuongCoBan', 'LuongTangCa', 'ThuongPhat',
        'PhuCapXepLoai', 'PhuCapCV', 'TongLuong', 'LuongTamUng', 'KhauTruBH',
        'KhauTruCongDoan', 'ThucLanh', 'GhiChu'
    ];

    // Mối quan hệ giữa BangLuongModel và NhanVienModel (1 nhân viên có nhiều bảng lương)
    public function nhanvien()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaNV', 'MaNV');
    }
    public function chamcong()
    {
        return $this->belongsTo(NhanVienModel::class, 'MaCC', 'MaCC');
    }
}
