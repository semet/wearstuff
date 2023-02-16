<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'number', 'total_price', 'payment_status', 'snap_token'];

    protected $hidden = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveryService(): HasOne
    {
        return $this->hasOne(DeliveryService::class);
    }

    public function getTax()
    {
        $totalPrice =  $this->items->map(function ($item) {
            return $item->product->finalPrice() * $item->quantity;
        })->sum();

        return ceil(10 / 100 * $totalPrice);
    }
}
