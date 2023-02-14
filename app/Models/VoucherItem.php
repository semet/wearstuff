<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoucherItem extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'product_id'
    ];

    protected $hidden = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function voucher()
    {
        return $this->hasMany(Voucher::class);
    }
}
