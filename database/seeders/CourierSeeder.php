<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => Str::uuid(), 'code' => 'jlp', 'title' => 'Jelap Express'],
            ['id' => Str::uuid(), 'code' => 'pos', 'title' => 'POS Indonesia (POS)'],
            ['id' => Str::uuid(), 'code' => 'jne', 'title' => 'Jalur Nugraha Ekakurir (JNE)'],
            ['id' => Str::uuid(), 'code' => 'tiki', 'title' => 'Citra Van Titipan Kilat (TIKI)'],
        ];

        Courier::insert($data);
    }
}
