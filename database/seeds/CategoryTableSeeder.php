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
                'image' => 'uploads/italiano.jpg'
            ],
            [
                'name' => 'Hamburgeria',
                'image' => 'uploads/hamburger.jpg'
            ],
            [
                'name' => 'Pizzeria',
                'image' => 'uploads/pizza.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' => 'uploads/cinese.jpg'
            ],
            [
                'name' => 'Giapponese',
                'image' => 'uploads/sushi.jpg'
            ],
            [
                'name' => 'Indiano',
                'image' => 'uploads/indiano.jpg'
            ],
            [
                'name' => 'Messicano',
                'image' => 'uploads/messicano.jpg'
            ],
            [
                'name' => 'Kebab',
                'image' => 'uploads/kebab.jpg'
            ],
            [
                'name' => 'Fast Food',
                'image' => 'uploads/mc.jpg'
            ],
            [
                'name' => 'Piadineria',
                'image' => 'uploads/piadina.jpg'
            ],
            [
                'name' => 'Gelateria',
                'image' => 'uploads/gelato.jpg'
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
