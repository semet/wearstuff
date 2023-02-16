<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Hamdani Ash-Sidiq',
            'phone' => '087736690307',
            'email' => 'hamdanilombok@gmail.com',
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => bcrypt('danis3m3t'),
            'gender' => GenderEnum::MALE->value,
            'active' => true
        ];
    }
}
