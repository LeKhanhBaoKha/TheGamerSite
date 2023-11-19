<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
