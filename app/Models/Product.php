<?php

namespace App\Models;

use Carbon\Carbon;
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
        'price',
        'overview',
        'description',
        'additional_info',
        'weight',
        'size',
        'gender',
        'quantity',
        'is_ready'
    ];

    protected $hidden = [];

    public function isNew()
    {
        return $this->created_at->diffInDays(Carbon::today()) <= 7;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function discountAmount(): int
    {
        //because we save the amount in percent
        return (int)$this->discount->amount / 100 * (int)$this->price;
    }

    public function finalPrice()
    {
        return $this->discount ? $this->price - $this->discountAmount() : $this->price;
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

    public function views(): HasMany
    {
        return $this->hasMany(ProductView::class);
    }
}
