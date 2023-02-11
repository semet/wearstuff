<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ro_province';

    protected $primaryKey = 'province_id';

    protected $fillable = [];

    protected $hidden = [];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'province_id', 'province_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
