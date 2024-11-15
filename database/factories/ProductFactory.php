<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'category_id' => Category::factory(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
