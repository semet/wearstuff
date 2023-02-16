<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ro_city';

    protected $primaryKey = 'city_id';

    protected $fillable = [];

    protected $hidden = [];

    public function prov()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }
}
