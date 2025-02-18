<?php

// Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBanModel extends Model
{
    use HasFactory;

    protected $table = 'phongban';
    public $timestamps = false;

    protected $fillable = ['MaPB', 'TenPB', 'ViTri', 'TenTruongPhong'];
}