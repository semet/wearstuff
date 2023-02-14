<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Artisan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSoldSeeder::class,
            ProductViewSeeder::class,
            VoucherItemSeeder::class,
            CourierSeeder::class
        ]);

        Artisan::call('raja-ongkir:cache all');
    }
}
