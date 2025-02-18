<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaoTaoModel extends Model
{
    protected $table = 'daotao';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaChuongTrinhDaoTao'; // Khóa chính của bảng
    public $timestamps = false;    // Laravel sẽ tự động quản lý timestamps (created_at, updated_at)
    // protected $fillable = ['username', 'fullname', 'password'];  // Các trường có thể điền vào cơ sở dữ liệu
    protected $fillable = ['MaNV','TenChuongTrinhDaoTao','TuNgay','DenNgay'];
}
