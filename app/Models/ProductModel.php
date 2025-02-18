<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='product';
    protected $primaryKey = 'product_ID';
    public $timestamps=false;
}
