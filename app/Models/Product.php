<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function cart(): BelongsToMany{
        return $this->belongsToMany(Cart::class);
    }
    //vì product thuộc nhiều 1 loại sp nên sử dụng belongsTo và tên hàm là số ít
}
