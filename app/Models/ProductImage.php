<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'url', 'urutan'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
