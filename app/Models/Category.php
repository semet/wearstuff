<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Category extends Model
{
    use HasFactory, HasUuids, MediaAlly;

    protected $fillable = ['name', 'slug', 'thumbnail'];

    protected $hidden = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
