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
            [
                'name' => 'Italiano',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ], 
            [
                'name' => 'Hamburgeria',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Pizzeria',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Giapponese',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Indiano',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Messicano',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Kebab',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Fast food',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Piadineria',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ],
            [
                'name' => 'Gelateria',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg'
            ]
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->slug = Str::of($newCategory->name)->slug("-");
            $newCategory->image = $category['image'];
            $newCategory->save();
        }
    }
}
