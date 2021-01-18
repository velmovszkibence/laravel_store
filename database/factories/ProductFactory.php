<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(8, 100),
            'stock' => $this->faker->randomDigit,
            'description' => $this->faker->paragraph(1)
        ];
    }
}
