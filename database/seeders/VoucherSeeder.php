<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::factory()->createMany([
            'code' => Str::of(Str::random(5))->upper(),
            'valid_until' => now()->addDays(5),
            ''
        ]);
    }
}
