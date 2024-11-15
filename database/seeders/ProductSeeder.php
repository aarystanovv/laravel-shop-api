<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::whereNotNull('parent_id')->get();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 10; $i++) {
                Product::create([
                    'name' => 'Товар ' . $i . ' в категории ' . $category->name,
                    'description' => 'Описание товара ' . $i,
                    'slug' => 'tovar-' . $i . '-' . $category->slug,
                    'category_id' => $category->id,
                    'price' => rand(100, 1000),
                ]);
            }
        }
    }
}
