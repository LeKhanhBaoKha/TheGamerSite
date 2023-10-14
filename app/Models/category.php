<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded =[];
    public function products(){
        return $this->hasMany(Product::class);
    }
    //vì catagory cos thể thuộc nhiều loại sp khác nhau nên sử dụng hasMany và tên hàm là số nhiều
}
