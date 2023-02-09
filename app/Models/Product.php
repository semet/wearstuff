<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'overview',
        'description',
        'additional_info',
        'size',
        'quantity',
        'is_ready'
    ];

    protected $hidden = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function solds(): HasMany
    {
        return $this->hasMany(ProductSold::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(ProductRating::class);
    }
}
