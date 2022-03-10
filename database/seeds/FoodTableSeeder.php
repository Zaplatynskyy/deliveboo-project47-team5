<?php

use App\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                "name" => "Margherita",
                "user_id" => 1,
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpg",
                "price" => 5,
                "types" => 1,
                "ingredients" => "Pomodoro, Mozzarella, Basilico",
                "visible" => true
            ],
            [
                "name" => "Marinara",
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpg",
                "user_id" => 1,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Pomodoro, Aglio, Origano",
                "visible" => true
            ],
            [
                "name" => "Diavola",
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpg",
                "user_id" => 1,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Mozzarella, Salame",
                "visible" => true
            ],
        ];

        foreach ($foods as $food) {
            $newFood = new Food();
            $newFood->name = $food['name'];
            $newFood->type_id = $food['types'];
            $newFood->user_id = $food['user_id'];
            $newFood->image = $food['image'];
            $newFood->price = $food['price'];
            $newFood->ingredients = $food['ingredients'];
            $newFood->visible = $food['visible'];
            $newFood->save();
        }
    }
}
