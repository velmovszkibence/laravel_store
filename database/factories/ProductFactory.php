<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(10000, 100000),
            'stock' => $this->faker->randomDigit,
            'description' => $this->faker->paragraph(1),
            'image' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
