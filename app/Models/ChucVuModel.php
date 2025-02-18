<?php

// Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVuModel extends Model
{
    use HasFactory;

    protected $table = 'chucvu';
    public $timestamps = false;
    protected $primaryKey = 'MaCV';
    protected $fillable = ['MaCV', 'TenCV', 'PhuCapCV'];
}
