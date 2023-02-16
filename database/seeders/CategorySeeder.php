<?php

namespace Database\Seeders;

use App\Enums\SizeEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @var Product $data
     * @return void
     */
    public function run()
    {
        Category::factory()->createMany([
            [
                'name' => 'Fashion Tradisional',
                'slug' => 'fashion-traditional',
                'thumbnail' => fake()->imageUrl(600, 300, true)
            ],
            [
                'name' => 'Beauty',
                'slug' => 'beauty',
                'thumbnail' => fake()->imageUrl(600, 300, true)
            ],
            [
                'name' => 'Food & Drink',
                'slug' => 'food-and-drink',
                'thumbnail' => fake()->imageUrl(600, 300, true)
            ]
        ])->each(function (Category $category) {
            $products = [];
            for ($i = 0; $i < 10; $i++) {
                $data = [
                    'category_id' => $category->id,
                    'sku' => Str::of(Str::random(10))->upper(),
                    'name' => fake()->word() . ' ' . fake()->word(),
                    'price' => rand(50000, 500000),
                    'overview' => fake()->paragraph(),
                    'description' => fake()->paragraph(4),
                    'additional_info' => fake()->paragraph(),
                    'weight' => rand(10, 100),
                    'size' => fake()->randomElement(SizeEnum::cases()),
                    'quantity' => fake()->randomDigitNotNull(),
                    'is_ready' => true
                ];

                array_push($products, $data);
            }

            $category->products()->createMany($products)
                ->each(function (Product $product) {
                    $images = [];
                    for ($i = 0; $i < 5; $i++) {
                        $data = [
                            'product_id' => $product->id,
                            'url' => fake()->imageUrl(600, 750, 'clothes', true)
                        ];
                        array_push($images, $data);
                    }

                    $reviews = [];
                    for ($i = 0; $i < 5; $i++) {
                        $data = [
                            'user_id' => User::all()->random()->id,
                            'product_id' => $product->id,
                            'body' => fake()->paragraph()
                        ];

                        array_push($reviews, $data);
                    }

                    $product->reviews()->createMany($reviews);
                    $product->images()->createMany($images);
                });
        });
    }
}
