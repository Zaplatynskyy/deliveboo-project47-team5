<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Italiano', 'Pizzeria', 'Hamburgeria', 'Cinese', 'Giapponese', 'Indiano', 'Messicano', 'Kebab', 'Fast food', 'Piadineria', 'Gelateria'
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug("-");
            $newCategory->save();
        }
    }
}
