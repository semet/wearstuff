<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordRequest extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['email', 'token'];

    protected $hidden = [];

    protected $timeStamps = false;
}
