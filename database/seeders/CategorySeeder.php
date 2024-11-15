<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $rootCategories = [
            ['name' => 'Электроника', 'slug' => 'elektronika'],
            ['name' => 'Одежда', 'slug' => 'odezhda'],
            ['name' => 'Дом и сад', 'slug' => 'dom-i-sad'],
        ];

        foreach ($rootCategories as $rootCategory) {
            $parent = Category::create($rootCategory);

            $childCategories = [
                ['name' => $rootCategory['name'] . ' Подкатегория 1', 'slug' => $rootCategory['slug'] . '-sub1', 'parent_id' => $parent->id],
                ['name' => $rootCategory['name'] . ' Подкатегория 2', 'slug' => $rootCategory['slug'] . '-sub2', 'parent_id' => $parent->id],
            ];

            foreach ($childCategories as $childCategory) {
                $subParent = Category::create($childCategory);

                Category::create([
                    'name' => $childCategory['name'] . ' Третьего уровня',
                    'slug' => $childCategory['slug'] . '-sub3',
                    'parent_id' => $subParent->id,
                ]);
            }
        }
    }
}
