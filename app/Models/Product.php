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
    /**
     * calculate amount of discount
     *
     * @return integer
     */
    public function discountAmount(): int
    {
        //because we save the amount in percent
        return (int)$this->discount->amount / 100 * (int)$this->price;
    }
    /**
     * the final price after being subtracted by the discountAmount
     *
     * @return integer
     */
    public function finalPrice(): int
    {
        return $this->discount ? $this->price - $this->discountAmount() : $this->price;
    }
    /**
     * this is for use in Cart
     * multiply the final price and the product quantity in cart
     *
     * @param integer $quantity
     * @return integer
     */
    public function priceWithQuantity(int $quantity): int
    {
        return $this->finalPrice() * $quantity;
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class)->latest();
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

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
